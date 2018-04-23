@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <table class="table table-bordered container-fluid" style="text-align: center" id="jsx">
        <tr>
            <td><a href="{{route('food_category.create')}}" class="btn btn-info">添加</a></td>
        </tr>
        <tr>
            <td>ID</td>
            <td>菜品分类名称</td>
            <td>菜品分类描述</td>
            <td>是否默认</td>
            <td>等级排名</td>
            <td>操作
        </tr>
        @foreach($FoodCategorys as $FoodCategory)
        <tr data-id="{{ $FoodCategory->id }}">
            <td>{{$FoodCategory->id}}</td>
            <td>{{$FoodCategory->name}}</td>
            <td>{{$FoodCategory->description}}</td>
            <td>{{$FoodCategory->is_selected==0?'×':'√'}}</td>
            <td>{{$FoodCategory->type_accumulation}}</td>
            <td>
                <a href="{{route('food_category.edit',['FoodCategory'=>$FoodCategory])}}" class="btn btn-warning">修改</a>
                <a href="{{route('is_selected',['FoodCategory'=>$FoodCategory])}}" class="btn btn-success">{{$FoodCategory->is_selected==0?'默认选中':'取消默认'}}</a>
                {{--<a href="{{route('delete',['category'=>$category])}}" class="btn btn-danger">删除</a>--}}
                {{--<button class="btn btn-danger" >删除</button>--}}
            </td>
        </tr>
        @endforeach
    </table>
    {{$FoodCategorys->appends($fenye)->links()}}
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

