@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <div class="container-fluid">


        <div class="col-lg-12">
            <table class="table table-bordered container-fluid" style="text-align: center" id="jsx">
                <tr>
                    <td><a href="" class="btn btn-info">添加</a></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>订单流水号</td>
                    <td>下单时间</td>
                    <td>订单状态</td>
                    <td>店铺名称</td>
                    <td>收货地址</td>
                    <td>收货人</td>
                    <td>电话号码</td>
                    <td>下单用户</td>
                    <td>购买商品</td>
                    <td>总价格</td>
                    <td>操作</td>
                </tr>
                @foreach($orders as $order)
                    <tr data-id="{{ $order->id }}">
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_code}}</td>
                        <td>{{date('Y-m-d,H:i:s',$order->order_birth_time)}}</td>
                        <td>
                            @if($order->order_status==-1)
                                已取消
                            @elseif($order->order_status==0)
                                待支付
                            @elseif($order->order_status==1)
                                待发货
                            @elseif($order->order_status==2)
                                待确认
                            @elseif($order->order_status==3)
                                完成
                            @endif
                        </td>
                        <td>{{$order->shop_name}}</td>
                        <td>{{$order->provence.'省'}}{{$order->city.'市'}}{{$order->area.'区'}}-详细地址:{{$order->detail_address}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->tel}}</td>
                        <td>{{$order->user->username}}</td>
                        <td>@foreach($order->food as $food)
                                {{$food->goods_name}}X{{$food->amount}}
                            @endforeach</td>
                        <td>{{$order->price}}元</td>
                        <td>
                            @if($order->order_status==0)
                                <a href="{{route('order.edit',['order'=>$order])}}" class="btn btn-success">确认订单</a>
                            @elseif($order->order_status==1)
                                <a href="{{route('order.edit',['order'=>$order])}}" class="btn btn-success">取消订单</a>
                                <a href="{{route('fahuo',['order'=>$order])}}" class="btn btn-primary">发货</a>
                            @elseif($order->order_status==-1)
                                <a href="{{route('order.edit',['order'=>$order])}}" class="btn btn-success">确认订单</a>
                            @elseif($order->order_status==2)
                                <a href="{{route('order.edit',['order'=>$order])}}" class="btn btn-success">取消订单</a>
                            @endif
                            <a href="{{route('order.show',['order'=>$order->id])}}" class="btn btn-primary">查看订单</a>
                            {{--<a href="{{route('delete',['category'=>$category])}}" class="btn btn-danger">删除</a>--}}
                            {{--<button class="btn btn-danger" >删除</button>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$orders->appends($fenye)->links()}}
        </div>

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

