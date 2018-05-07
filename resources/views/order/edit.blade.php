@extends('layouts.default')
@section('title','菜品添加')
@section('content')
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>菜品分类添加</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('food_menu.update',['FoodMenu'=>$FoodMenu])}}" >
                <div class="form-group">
                    <label for="xxx">菜品名称</label>
                    <input type="text" name="goods_name" value="{{$FoodMenu->goods_name}}" class="form-control" id="xxx" placeholder="菜品名称">
                </div>
                <div class="form-group">
                    <label for="xxx">评分</label>
                    <input type="text" name="rating" value="{{$FoodMenu->rating}}" class="form-control" id="xxx" placeholder="评分">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品价格</label>
                    <input type="number" name="goods_price" value="{{$FoodMenu->goods_price}}" class="form-control" id="xxx" placeholder="菜品价格">
                </div>
                <div class="form-group">
                    <label for="xxx">月销售量</label>
                    <input type="number" name="month_sales" value="{{$FoodMenu->month_sales}}" class="form-control" id="xxx" placeholder="月销售量">
                </div>
                <div class="form-group">
                    <label for="xxx">评级数</label>
                    <input type="number" name="rating_count" value="{{$FoodMenu->rating_count}}" class="form-control" id="xxx" placeholder="评级数">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品提示</label>
                    <input type="text" name="tips" value="{{$FoodMenu->tips}}" class="form-control" id="xxx" placeholder="菜品提示">
                </div>
                <div class="form-group">
                    <label for="xxx">满足计数</label>
                    <input type="number" name="satisfy_count" value="{{$FoodMenu->satisfy_count}}" class="form-control" id="xxx" placeholder="满足计数">
                </div>
                <div class="form-group">
                    <label for="xxx">满足率</label>
                    <input type="text" name="satisfy_rate" value="{{$FoodMenu->satisfy_rate}}" class="form-control" id="xxx" placeholder="满足率">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品分类</label>
                    <select class="form-control" name="category_id">
                        @foreach($FoodCategorys as $FoodCategory)
                        <option value="{{$FoodCategory->id}}">{{$FoodCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="xx">上传图片</label>
                        <input type="file" id="xx" name="goods_img" class="btn btn-success">
                        <p class="help-block">需要上传文件</p>
                    </div>
                </div>

                {{--<div class="form-group">
                    <label for="xxx">菜品分类描述</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="菜品分类描述"></textarea>
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
