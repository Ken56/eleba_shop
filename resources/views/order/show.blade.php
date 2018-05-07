@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <tr class="info">
                <td>订单名称</td>
                <td>详细说明</td>
            </tr>
            <tr>
                <td>订单ID</td>
                <td>{{$order->id}}</td>
            </tr>
            <tr>
                <td >订单流水号</td>
                <td>{{$order->order_code}}</td>
            </tr>
            <tr>
                <td >下单时间</td>
                <td>{{date('Y-m-d,H:i:s',$order->order_birth_time)}}</td>
            </tr>
            <tr>
                <td>店铺名称</td>
                <td>{{$order->shop_name}}</td>
            </tr>
            <tr>
                <td>收货地址</td>
                <td>{{$order->provence.'省'}}{{$order->city.'市'}}{{$order->area.'区'}}-详细地址:{{$order->detail_address}}</td>
            </tr>
            <tr>
                <td >收货人</td>
                <td>{{$order->name}}</td>
            </tr>
            <tr>
                <td>联系方式</td>
                <td>{{$order->tel}}</td>
            </tr>
        </table>
        <a href="{{route('order.index')}}" type="button" class="btn btn-primary">返回订单列表</a>
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
                    url: 'category/'+id,
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

