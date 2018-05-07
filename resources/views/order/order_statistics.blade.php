@extends('layouts.default')
@section('title','订单量统计')
@section('content')
    <div class="container-fluid">

        <h1>订单量统计</h1>
        <div class="row">
            <div class="col-lg-4">
                <form method="get" action="{{route('dingdan')}}">
                    <h4>请选择开始日期</h4>
                    <div class="form-group">
                        <input type="date" name='start_time' class="form-control" id="yycdate" placeholder="Email">
                    </div>
                    <h4>请选择结束日期</h4>
                    <div class="form-group">
                        <input type="date" name='end_time' class="form-control" id="yycdate" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div>
            <div class="col-lg-8">
                <h4>统计详情</h4>
                <table class="table table-striped">
                    <tr>
                        <th>#当日\</th>
                        <th>#当月\</th>
                        <th>#总计\</th>
                    </tr>
                    <tr>
                        <td>{{$day}}</td>
                        <td>{{$month}}</td>
                        <td>{{$count}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <h4>订单查询显示</h4>
        <div class="row container-fluid">
            <table class="table table-striped">
                <tr>
                    <th>#订单ID\</th>
                    <th>#下单时间\</th>
                    <th>#下单用户\</th>
                </tr>
                @foreach($search as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->created_at}}</td>
                    <td>{{$s->name}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop()

@section('js')
    <script>
//       $('#yycdate').click(function () {
//
//               $.get("dingdan", function(result){
//
//               });
//
//       })
    </script>
@stop()

