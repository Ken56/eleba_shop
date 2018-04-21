<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadeHandler;
use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
    //登录权限
    public function __construct(){
        //游客权限--黑名单
        $this->middleware('auth',['except'=>['create','store']]);
        //用户权限-白名单
        $this->middleware('guest',['only'=>'create']);
    }

    //商家个人中心
    public function index(){
        //这里判断审核状态 session()的状态值
        return view('shop.index');
    }


    //商家注册首页
    public function create(){
        $categorys=DB::table('categories')->get();
        return view('shop.create',compact('categorys'));
    }
    //商家注册首页
    public function store(Request $request){
        //验证
        $this->validate($request,[
            'name'=>'required',
        ]);

        //保存到两个数据库
        DB::transaction(function ()use ($request) {
            //上传图片
            $uploder = new ImageUploadeHandler();
            $result  = $uploder->save($request->shop_img,'shop_img',0);
            if($result){
                $fileName = $result['path'];
            }else{
                $fileName = '';
            }

            //添加到详细表
            $keyx=Shop::create([
                'shop_name'=>$request->shop_name,
                'category_id'=>$request->category_id,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'on_time'=>$request->on_time,
                'fengniao'=>$request->fengniao,
                'shop_img'=>$fileName,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
            ]);

            //添加数据商家账户表
            User::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'password'=>bcrypt($request->password),
                'status'=>$request->status,
                'shop_id'=>$keyx->id,
            ]);


        });
        session()->flash('success','注册成功请等审核');
        return redirect()->route('login');
    }
    //修改密码表单
    public function updatepwd(){
        return view('shop.edit');
    }

    //>>修改密码
    public function update_pwd(Request $request){
//        var_dump($request->password);die;
//        var_dump($request->input('password'));die;
//        $user_id=Auth::user()->id;//保存用户密码
        //验证新旧密码

        $id = Auth::user()->id;
        $oldpassword = $request->input('old_pwd');
        $newpassword = $request->input('password');
        $res = DB::table('users')->where('id',$id)->select('password')->first();
        if(!Hash::check($oldpassword, $res->password)){
            session()->flash('success','旧密码不正确');
            return redirect()->route('updatepwd');
        }
        $update = array(
            'password'  =>bcrypt($newpassword),
        );
        $result = DB::table('users')->where('id',$id)->update($update);
        if($result){
            session()->flash('success','密码修改成功');
            return redirect()->route('shop.index');
        }else{
            session()->flash('success','密码修改失败');
            return redirect()->route('updatepwd');
        }


    }

    /**
     * 重置密码方法
     * @param Request $request
     */
    /*public function set_password(Request $request){
        $id = Auth::user()->id;
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('newpassword');
        $res = DB::table('admins')->where('id',$id)->select('password')->first();
        if(!Hash::check($oldpassword, $res->password)){
            echo 2;
            exit;//原密码不对
        }
        $update = array(
            'password'  =>bcrypt($newpassword),
        );
        $result = DB::table('admins')->where('id',$id)->update($update);
        if($result){
            echo 1;exit;
        }else{
            echo 3;exit;
        }

    }*/


}
