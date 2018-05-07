@extends('layouts.default')
@section('title','菜品统计')
@section('content')
    <div class="container-fluid">

        <h1>菜品量统计</h1>
        <div class="row">
            <div class="col-lg-4">
                <form method="get" action="{{route('caipin')}}">
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
        <h4>菜品查询显示</h4>
        <div class="row container-fluid">
            <table class="table table-striped">
                <tr>
                    <th>#所属店铺\</th>
                    <th>#菜品名称\</th>
                    <th>#销售量\</th>
                </tr>
                @foreach($foods as $food)
                <tr>
                    <td>{{$food->shop_name}}</td>
                    <td>{{$food->goods_name}}</td>
                    <td>{{$food->amount}}</td>
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

