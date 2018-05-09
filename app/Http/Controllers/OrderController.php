<?php
//商户端- 订单管理
namespace App\Http\Controllers;

use App\Models\FoodMenu;
use App\Models\Member;
use App\Models\Order;
use App\Models\Order_Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //商家管理订单
    public function index(Request $request){
        $user_id=Auth::user()->shop_id;
        $orders=Order::where('shop_id',$user_id)->paginate(4);
        foreach ($orders as $order){
            $order_goods=Order_Goods::where('order_id',$order->id)->get();
            $order->food=$order_goods;
            foreach ($order_goods as $goods_price){
                $order->price+=$goods_price['goods_price']*$goods_price['amount'];
            }
        }
        return view('order.index',compact('orders'));
    }

    //查看订单
    public function show(Request $request,Order $order){

        $order=Order::where('id',$order->id)->first();

        //加载页面
        return view('order.show',compact('order'));
    }

    //修改订单状态
    public function edit(Order $order){
//        var_dump($order);die;
        if($order->order_status==0){
            $res=$order->order_status=1;
        }elseif ($order->order_status==1){
            $res=$order->order_status=-1;
        } elseif ($order->order_status==-1){
            $res=$order->order_status=1;
        } elseif ($order->order_status==3){
            $res=$order->order_status=-1;
        } elseif ($order->order_status==2){
            $res=$order->order_status=-1;
        }
        $order->where('id',$order->member_id)->update([
            'order_status'=>$res
        ]);
//        if($order->order_status==1){
//            $member=Member::where('id',$order->member_id)->first();
//            //发送邮件
//            Mail::send(
//                'mail',//需要一个邮箱模板地址
//                ['name'=>$member->username],//名字
//                function ($message) use ($member){//subject是邮箱标题
//                    $message->to($member->email)->subject('订单支付成功');
//                }
//            );
//        }
        //用户下单成功时


        return redirect()->route('order.index');

    }

    //发货修改
    public function fahuo(Order $order){
        if($order->order_status==1){
            $res=$order->order_status=2;
        }
        $order->where('id',$order->id)->update([
            'order_status'=>$res
        ]);
        return redirect()->route('order.index');
    }

    //订单统计显示
    public function dingdan(Request $request){
        $fenye=$request->query();
        $keyword=$request->query();
        $user_id=Auth::user()->shop_id;//保存当前账号的数据

        //区间查询相关代码

//        var_dump($start_time);die;
        if($request->start_time && $request->start_time){//查不到旧设置一个0
            $start_time=$request->start_time;
            $end_time=$request->end_time;
            $wheres=[
                ['created_at','>',date('Y-m-d',strtotime($start_time)),],
                ['created_at','<',date('Y-m-d',strtotime($end_time)),],
                ['shop_id','=',$user_id],
            ];
            $search=DB::table('order_list')->where($wheres)->get();
        }else{
            $search=[];
        }
//        $search_count=DB::table('order_list')->where($wheres)->count();


//        if($keyword){
//            $wheres[]=['name','like',"%{$keyword}%"];
//        }

        //当天 当月 总计 的查询条件
        $dayx=[
            ['created_at','>',date('Y-m-d',time()),],
            ['created_at','<',date('Y-m-d',strtotime('+1 day'))],
            ['shop_id','=',$user_id],
        ];
        $monthx=[
            ['created_at','>',date('Y-m-01',strtotime(date('Y-m-d')))],
            ['created_at','<',date('Y-m-d',strtotime('+1 month'))],
            ['shop_id','=',$user_id],
        ];
        $countx=[
            ['shop_id','=',$user_id],
        ];

        //当天 当月 总计 数量显示
        $day=DB::table('order_list')->where($dayx)->count();
        $month=DB::table('order_list')->where($monthx)->count();
        $count=DB::table('order_list')->where($countx)->count();
        return view('order.order_statistics',compact('count','day','month','search'));

    }

    //菜品统计管理
    public function caipin(Request $request){
        $fenye=$request->query();
        $keyword=$request->query();
        $user_id=Auth::user()->shop_id;//保存当前账号的数据

        //区间查询相关代码
        if($request->start_time && $request->start_time){//查不到旧设置一个0
            $start_time=$request->start_time;
            $end_time=$request->end_time;
            $wheres=[
                ['order_goods.created_at','>',date('Y-m-d',strtotime($start_time)),],
                ['order_goods.created_at','<',date('Y-m-d',strtotime($end_time)),],
                ['order_list.shop_id','=',$user_id],
            ];

            //使用高级查询
            $foods=DB::table('order_goods')
                ->join('order_list','order_goods.order_id','=','order_list.id')
                ->join('shops','order_list.shop_id','=','shops.id')
                ->select('shops.shop_name','order_goods.goods_name',DB::raw('sum(order_goods.amount) as amount'))
                ->where($wheres)
                ->groupBy('order_goods.goods_name','shops.shop_name')
                ->orderBy('amount','desc')
                ->get();
            ;

        }else{
            $foods=[];
        }


//        if($keyword){
//            $wheres[]=['name','like',"%{$keyword}%"];
//        }

        //当天 当月 总计 的查询条件
        $countx=[
            ['shop_id','=',$user_id],
        ];

        //当天 当月 总计 数量显示
        $dd=DB::table('order_list')->where($countx)->get();
        $day=0;
        foreach ($dd as $d){
            $day=DB::table('order_goods')->where([
                ['order_id',$d->id],
                ['created_at','>',date('Y-m-d',time()),],
                ['created_at','<',date('Y-m-d',strtotime('+1 day'))],
            ])->sum('amount');
        }

        $mm=DB::table('order_list')->where($countx)->get();
        $month=0;
        foreach ($mm as $m){
            $month+=DB::table('order_goods')->where([
                ['order_id',$m->id],
                ['created_at','>',date('Y-m-01',strtotime(date('Y-m-d')))],
                ['created_at','<',date('Y-m-d',strtotime('+1 month'))],
            ])->sum('amount');
        }

        $cc=DB::table('order_list')->where($countx)->get();
        $count=0;
        foreach ($cc as $c){
            $count+=DB::table('order_goods')->where('order_id',$c->id)->sum('amount');
        }

        return view('order.goods_statistics',compact('count','day','month','foods'));
    }
}
