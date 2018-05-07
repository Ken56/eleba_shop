@extends('layouts.default')
@section('title','抽奖活动管理')
@section('content')
    <table class="table table-bordered container-fluid" style="text-align: center" id="jsx">
        <tr>
            <td>ID</td>
            <td>活动标题</td>
            <td>开始时间</td>
            <td>结束时间</td>
            <td>开奖日期</td>
            <td>报名人数限制</td>
            <td>是否已开奖</td>
            <td>操作</td>
        </tr>
        @foreach($events as $event)
        <tr data-id="{{ $event->id }}">
            <td>{{$event->id}}</td>
            <td>{{$event->title}}</td>
            <td>{{date('Y-m-d',$event->signup_start)}}</td>
            <td>{{date('Y-m-d',$event->signup_end)}}</td>
            <td>{{$event->prize_date}}</td>
            <td>{{$event->signup_num}}</td>
            <td>{{$event->is_prize==0?'未开奖':'已开奖'}}</td>
            <td>
                <a href="{{route('events.show',['event'=>$event])}}" class="btn btn-primary">查看详情</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{$events->links()}}
@stop()

@section('js')
    <script>
        $("#jsx .btn-danger").click(function(){
            //二次确认
            if(confirm('确认删除该数据吗?删除后不可恢复!')){
                var tr = $(this).closest('tr');
                var id = tr.data('id');
                $.ajax({
                    type: "DELETE",
                    url: 'events/'+id,
                    data: '_token={{ csrf_token() }}',
                    success: function(msg){
                        tr.fadeOut();
                    }
                });
                $(this).closest("tr").remove();
            }
        });
    </script>
@stop()

