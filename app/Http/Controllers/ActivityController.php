<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
//    //登录权限
//    public function __construct(){
//        //未登录的用户只能做什么
//        $this->middleware('auth',['except'=>['']]);
//        //让只能是未登录的用户访问的页面
////        $this->middleware('guest',['only' => ['create']]);
//    }

    //>>活动列表主页
    public function index(Request $request){
        $fenye=$request->query();
        $keyword=$request->query();
        if($keyword){
            $activitys=Activity::where('title','like',"%{$keyword}%")->paginate(4);
        }else{
            //查询数据
            $activitys=Activity::paginate(4);
        }
        return view('activity.index',compact('activitys','fenye'));
    }

    //活动详情页
    public function show(Activity $activity){
        $id=$activity->id;
//        var_dump($id);die;
        $activity=Activity::find($id);
//        var_dump($activity);die;
        return view('activity.show',compact('activity'));
    }

}
