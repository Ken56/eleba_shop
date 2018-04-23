@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>菜品分类添加</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('food_category.update',['FoodCategory'=>$FoodCategory->id])}}" >
                <div class="form-group">
                    <label for="xxx">菜品分类名称</label>
                    <input type="text" name="name" value="{{$FoodCategory->name}}" class="form-control" id="xxx" placeholder="菜品分类名称">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品分类描述</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="菜品分类描述">{{$FoodCategory->description}}</textarea>
                </div>
                {{--<div class="form-group">
                    <label for="xxx">C1等级排名</label>
                    <input type="text" name="type_accumulation" value="{{old('type_accumulation')}}" class="form-control" id="xxx" placeholder="等级排名">
                </div>--}}
                {{--<div class="form-group">
                    <label for="xxx">选择店铺</label>
                    <select class="form-control" name="shop_id">
                        @foreach($shops as $shop)
                        <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                        @endforeach
                    </select>
                </div>--}}



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