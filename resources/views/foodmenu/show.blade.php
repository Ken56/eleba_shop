@extends('layouts.default')
@section('title','菜谱详情')
@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <tr class="info">
                <td>订单名称</td>
                <td>详细说明</td>
            </tr>
            <tr>
                <td>菜品名称</td>
                <td>{{$FoodMenu->goods_name}}</td>
            </tr>
            <tr>
                <td >评分</td>
                <td>{{$FoodMenu->rating}}</td>
            </tr>
            <tr>
                <td >菜品价格</td>
                <td>{{$FoodMenu->goods_price}}</td>
            </tr>
            <tr>
                <td >月销量</td>
                <td>{{$FoodMenu->month_sales}}</td>
            </tr>
            <tr>
                <td >评级数</td>
                <td>{{$FoodMenu->rating_count}}</td>
            </tr>
            <tr>
                <td >提示</td>
                <td>{{$FoodMenu->tips}}</td>
            </tr>
            <tr>
                <td >满足计数</td>
                <td>{{$FoodMenu->satisfy_count}}</td>
            </tr>
            <tr>
                <td >满足率</td>
                <td>{{$FoodMenu->satisfy_rate}}</td>
            </tr>
            <tr>
                <td >满足率</td>
                <td>{{$FoodMenu->satisfy_rate}}</td>
            </tr>
        </table>
        <a href="{{route('food_menu.index')}}" type="button" class="btn btn-primary">返回订单列表</a>
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

