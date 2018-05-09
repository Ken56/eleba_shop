@extends('layouts.default')
@section('title','修改菜品分类')
@section('content')
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>修改菜品分类</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('food_category.update',['FoodCategory'=>$FoodCategory->id])}}" >
                <div class="form-group">
                    <label for="xxx">菜品分类名称</label>
                    <input type="text" name="name" value="{{$FoodCategory->name}}" class="form-control" id="xxx" placeholder="菜品分类名称">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品分类描述</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="菜品分类描述">{{$FoodCategory->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">提交</button>
                {{csrf_field()}}
                {{method_field('PUT')}}
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
@stop()

@section('js')
@stop()
