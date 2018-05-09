@extends('layouts.default')
@section('title','菜品管理')
@section('content')
    <div class="container-fluid">
        <h1>菜品管理</h1><br>
        <table class="table table-bordered container-fluid" style="text-align: center" id="jsx">
            <tr>
                <td><a href="{{route('food_menu.create')}}" class="btn btn-info">添加</a></td>
            </tr>
            <tr>
                <td>ID</td>
                <td>菜品图片</td>
                <td>菜品名称</td>
                <td>评分</td>
                <td>菜品价格</td>
                <td>月销售量</td>
                <td>评分级</td>
                <td>菜品提示</td>
                <td>操作</td>
            </tr>
            @foreach($FoodMenus as $FoodMenu)
                <tr data-id="{{ $FoodMenu->id }}">
                    <td>{{$FoodMenu->id}}</td>
                    <td><img src="{{$FoodMenu->goods_img}}" alt="未设置" class="img-thumbnail" width="70px;"></td>
                    <td>{{$FoodMenu->goods_name}}</td>
                    <td>{{$FoodMenu->rating}}</td>
                    <td>{{$FoodMenu->goods_price}}</td>
                    <td>{{$FoodMenu->month_sales}}</td>
                    <td>{{$FoodMenu->rating_count}}</td>
                    <td>{{$FoodMenu->tips}}</td>
                    <td>
                        <a href="{{route('food_menu.show',['FoodMenu'=>$FoodMenu->id])}}" class="btn btn-primary">查看</a>
                        <a href="{{route('food_menu.edit',['FoodMenu'=>$FoodMenu->id])}}" class="btn btn-warning">修改</a>
                        {{--<a href="{{route('delete',['category'=>$category])}}" class="btn btn-danger">删除</a>--}}
                        <button class="btn btn-danger" >删除</button>
                    </td>
                </tr>
            @endforeach
        </table>
        {{--{{$FoodMenus->appends($fenye)->links()}}--}}
        {{$FoodMenus->links()}}

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
                    url: 'food_menu/'+id,
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

