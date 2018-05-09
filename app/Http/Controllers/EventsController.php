<?php

namespace App\Http\Controllers;

use App\Models\Event_Members;
use App\Models\Events;
use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    //>>商户活动列表主页
    public function index(){

        $events=Events::paginate(4);

        return view('events.index',compact('events'));
    }

    //查看抽奖详情
    public function show(Events $event){
        $user_id=Auth::user()->id;
        //找到所有报名人数---判断限制人数
        $man_count=DB::table('event_members')->where(['events_id'=>$event->id])->count();
        //判断是否报名
        $user_count=DB::table('event_members')->where(['events_id'=>$event->id],['member_id'=>$user_id])->count();
        //中奖名单
        $zhongjiangs=Prize::where('events_id',$event->id)->get();
        return view('events.show',compact('event','user_count','man_count','zhongjiangs'));
    }

    //商家报名
    public function baoming(Events $event){
        $user_id=Auth::user()->id;
        Event_Members::create([
            'events_id'=>$event->id,
            'member_id'=>$user_id,
        ]);
        session()->flash('success','报名成功');
        return redirect()->route('events.index');
    }




}
