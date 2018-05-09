@extends('layouts.default')
@section('title','菜品分类添加')
@section('content')
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>菜品分类添加</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('food_category.store')}}" >
                <div class="form-group">
                    <label for="xxx">菜品分类名称</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="xxx" placeholder="菜品分类名称">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品分类描述</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="菜品分类描述"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">提交</button>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
@stop()

@section('js')
@stop()
