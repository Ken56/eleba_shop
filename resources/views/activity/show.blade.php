@extends('layouts.default')
@section('title','店铺详情')
@section('content')

    <div class="container">
        <div class="col-lg-2"></div>

        <div class="col-lg-8">
            <div>
                <h1>{{$activity->title}}</h1>
            </div>
            <div>
                <h3>发布时间</h3>
                <h4>{{date('Y-m-d',$activity->fabu)}}</h4>
            </div>
            <div>
                <h3>活动日期</h3>
                <h4>开始日期{{date('Y-m-d',$activity->start)}}-----结束日期{{date('Y-m-d',$activity->end)}}</h4>
            </div>
            <div>
                <h3>活动内容</h3>
                <h4>{!! $activity->content !!}</h4>
            </div>


        </div>


        <div class="col-lg-2"></div>
    </div>

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
                    url: 'shop/'+id,
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

