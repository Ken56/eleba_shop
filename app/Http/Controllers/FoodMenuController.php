<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadeHandler;
use App\Models\FoodCategory;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use OSS\Core\OssException;

class FoodMenuController extends Controller
{

    //登录权限
    public function __construct(){
        //未登录的用户只能做什么
        $this->middleware('auth',['except'=>['']]);
        //让只能是未登录的用户访问的页面
//        $this->middleware('guest',['only' => ['create']]);
    }


    //菜品分类主页
    public function index(Request $request){
//        $fenye=$request->query();
//        $keyword=$request->query();
//        $wheres=[
//            ['shop_id','=',Auth::user()->shop_id],
//        ];
//        if($keyword){
//            $wheres[]=['name','like',"%{$keyword}%"];
//        }
//        $FoodMenus=FoodMenu::where($wheres)->paginate(4);
//        return view('foodmenu.index',compact('FoodMenus','fenye'));

        $FoodMenus=FoodMenu::where('shop_id','=',Auth::user()->shop_id)->paginate(3);
        return view('foodmenu.index',compact('FoodMenus'));
    }

    //>>添加菜品
    public function create(){
        $FoodCategorys=FoodCategory::all();
        /*$id=Auth::user()->shop_id;//我的意思是只能查询自己的店铺
        $shops = DB::table('shops')->where('id',$id)->get();*/
        return view('foodmenu.create',compact('FoodCategorys'));
    }

    //>>添加保存菜品分类
    public function store(Request $request){
//        var_dump($request->goods_name);die;
        //基础验证
        $this->validate($request,[
            'goods_name'=>'required',
            'rating'=>'required',
            'goods_price'=>'required',
            'month_sales'=>'required',
            'rating_count'=>'required',
            'tips'=>'required',
            'satisfy_count'=>'required',
            'satisfy_rate'=>'required',
        ],[
            'goods_name.required'=>'菜品名称不能为空',
            'rating.required'=>'评分不能为空',
            'goods_price.required'=>'商品价格不能为空',
            'month_sales.required'=>'月销售额不能为空',
            'rating_count.required'=>'评级数不能为空',
            'tips.required'=>'菜品提示不能为空',
            'satisfy_count.required'=>'满足计数不能为空',
            'satisfy_rate.required'=>'满足率不能为空',
        ]);

//        //上传图片
//        $uploder = new ImageUploadeHandler();
//        $result  = $uploder->save($request->goods_img,'goods_img',0);
//        if($result){
//            $fileName = $result['path'];
//        }else{
//            $fileName = '';
//        }


        $shop_id=Auth::user()->shop_id;//获取shop_id
        //保存到数据库
        FoodMenu::create([
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'goods_price'=>$request->goods_price,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate,
            'goods_img'=>$request->shop_img,
            'category_id'=>$request->category_id,

            'shop_id'=>$shop_id,
        ]);
        session()->flash('sussecc','菜品添加成功');
        return redirect()->route('food_menu.index');
    }

    //修改页面
    public function edit(FoodMenu $FoodMenu){
        $FoodCategorys=FoodCategory::all();
        return view('foodmenu.edit',compact('FoodMenu','FoodCategorys'));
    }

    //修改保存
    public function update(Request $request,FoodMenu $FoodMenu){

        //        var_dump($request->goods_name);die;
        //基础验证
        $this->validate($request,[
            'goods_name'=>'required',
            'rating'=>'required',
            'goods_price'=>'required',
            'month_sales'=>'required',
            'rating_count'=>'required',
            'tips'=>'required',
            'satisfy_count'=>'required',
            'satisfy_rate'=>'required',
        ],[
            'goods_name.required'=>'菜品名称不能为空',
            'rating.required'=>'评分不能为空',
            'goods_price.required'=>'商品价格不能为空',
            'month_sales.required'=>'月销售额不能为空',
            'rating_count.required'=>'评级数不能为空',
            'tips.required'=>'菜品提示不能为空',
            'satisfy_count.required'=>'满足计数不能为空',
            'satisfy_rate.required'=>'满足率不能为空',
        ]);

        //上传图片
        $uploder = new ImageUploadeHandler();
        $result  = $uploder->save($request->goods_img,'goods_img',0);
        if($result){
            $fileName = $result['path'];
        }else{
            $fileName = '';
        }

        $shop_id=Auth::user()->shop_id;//获取shop_id
        //保存到数据库
        $FoodMenu->update([
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'goods_price'=>$request->goods_price,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate,
            'goods_img'=>$fileName,
            'category_id'=>$request->category_id,

            'shop_id'=>$shop_id,
        ]);
        session()->flash('sussecc','菜品修改成功');
        return redirect()->route('food_menu.index');

    }

    //菜品删除
    public function destroy (FoodMenu $FoodMenu){
        $FoodMenu->delete();
//        return redirect()->route('food_menu.index');
    }

    //菜谱详情查看
    public function show(FoodMenu $FoodMenu){
        return view('foodmenu.show',compact('FoodMenu'));
    }


}
