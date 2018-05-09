@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <table class="table table-bordered container-fluid" style="text-align: center" id="jsx">
        {{--<tr>--}}
            {{--<td><a href="{{route('activity.create')}}" class="btn btn-info">添加</a></td>--}}
        {{--</tr>--}}
        <tr>
            <td>ID</td>
            <td>活动标题</td>
            <td>发布日期</td>
            <td>开始时间</td>
            <td>活动时间</td>
            <td>操作</td>
        </tr>
        @foreach($activitys as $activity)
        <tr data-id="{{ $activity->id }}">
            <td>{{$activity->id}}</td>
            <td>{{$activity->title}}</td>
            <td>{{date('Y-m-d',$activity->fabu)}}</td>
            <td>{{date('Y-m-d',$activity->start)}}</td>
            <td>{{date('Y-m-d',$activity->end)}}</td>
            <td>
                <a href="{{route('activity.show',['activity'=>$activity])}}" class="btn btn-primary">查看</a>
                {{--<a href="{{route('activity.edit',['activity'=>$activity])}}" class="btn btn-warning">修改</a>--}}
                {{--<button class="btn btn-danger" >删除</button>--}}
            </td>
        </tr>
        @endforeach
    </table>
    {{$activitys->links()}}
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
                    url: 'activity/'+id,
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

