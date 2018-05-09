<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //登录权限
    public function __construct(){
        //未登录的用户只能做什么
        $this->middleware('auth',['except'=>['']]);
        //让只能是未登录的用户访问的页面
//        $this->middleware('guest',['only' => ['create']]);
    }

    //>>活动列表主页
    public function index(Request $request){
            //查询数据

            $activitys=Activity::paginate(4);
        return view('activity.index',compact('activitys'));
    }

    //活动详情页
    public function show(Activity $activity){
        $id=$activity->id;
//        var_dump($id);die;
        $activity=Activity::find($id);
//        var_dump($activity);die;
        return view('activity.show',compact('activity'));
    }

    //添加商品分类-显示
    public function create(){
        return view('activity.create');
    }

    public function store(Request $request){
        //验证信息啊
        $this->validate($request,[
            'title'=>'required',
            'start'=>'required|after:yesterday',
            'end'=>'required|after:start',
            'contentx'=>'required',
        ],[
            'title.required'=>'标题不能为空',
            'start.required'=>'开始时间不能为空',
            'start.after'=>'开始时间错误',
            'end.required'=>'结束时间不能为空',
            'end.after'=>'结束时间错误',
            'contentx.required'=>'活动内容不能为空',
        ]);
        //保存到数据库
        Activity::create([
            'title'=>$request->title,
            'start'=>strtotime($request->start),
            'end'=>strtotime($request->end),
            'content'=>$request->contentx,
            'fabu'=>time(),
        ]);

        //返回数据
        session()->flash('success','活动添加成功');
        return redirect()->route('activity.index');
    }

    //>>修改显示
    public function edit(Activity $activity){
        return view('activity.edit',compact('activity'));
    }

    //>>修改保存
    public function update(Request $request,Activity $activity){
        //验证信息啊
        $this->validate($request,[
            'title'=>'required',
            'start'=>'required|after:yesterday',
            'end'=>'required|after:start',
            'contentx'=>'required',
        ],[
            'title.required'=>'标题不能为空',
            'start.required'=>'开始时间不能为空',
            'start.after'=>'开始时间错误',
            'end.required'=>'结束时间不能为空',
            'end.after'=>'结束时间错误',
            'contentx.required'=>'活动内容不能为空',
        ]);
        //保存到数据库
        $activity->update([
            'title'=>$request->title,
            'start'=>strtotime($request->start),
            'end'=>strtotime($request->end),
            'content'=>$request->contentx,
            'fabu'=>time(),
        ]);

        //返回数据
        session()->flash('success','活动修改成功');
        return redirect()->route('activity.index');
    }

    //>>删除数据
    public function destroy (Activity $activity){
        $activity->delete();
    }

}
