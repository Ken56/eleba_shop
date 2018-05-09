@extends('layouts.default')
@section('title','菜品分类管理')
@section('content')
    <div class="container-fluid">
        <h1>菜品分类管理</h1><br>
        <table class="table table-bordered container-fluid" style="text-align: center" id="jsx">

            <tr>
                <td><a href="{{route('food_category.create')}}" class="btn btn-info">添加</a></td>
            </tr>
            <tr>
                <td>ID</td>
                <td>菜品分类名称</td>
                <td>菜品分类描述</td>
                <td>是否默认</td>
                <td>操作
            </tr>
            @foreach($FoodCategorys as $FoodCategory)
                <tr data-id="{{ $FoodCategory->id }}">
                    <td>{{$FoodCategory->id}}</td>
                    <td>{{$FoodCategory->name}}</td>
                    <td>{{$FoodCategory->description}}</td>
                    <td>{{$FoodCategory->is_selected==0?'×':'√'}}</td>
                    <td>
                        <a href="{{route('food_category.edit',['FoodCategory'=>$FoodCategory])}}" class="btn btn-warning">修改</a>
                        <a href="{{route('is_selected',['FoodCategory'=>$FoodCategory])}}" class="btn btn-success">{{$FoodCategory->is_selected==0?'默认选中':'取消默认'}}</a>
                        <button class="btn btn-danger" >删除</button>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$FoodCategorys->links()}}
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
                    url: 'food_category/'+id,
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

