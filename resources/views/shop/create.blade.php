@extends('layouts.default')
@section('title','商家分类管理')
@section('content')

    <form enctype="multipart/form-data" method="POST" action="{{route('shop.store')}}" >
        <div class="row container-fluid" style="background-color: rgba(0,255,173,0.08);margin: 30px;">
            <div class="row container-fluid" style="margin-left: 15%; margin-top: 10px;">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">商家名称</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="kk" placeholder="填写商家名称">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">手机号码</label>
                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="kk" placeholder="填写商家名称">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">密码</label>
                            <input type="text" name="password" value="{{old('password')}}" class="form-control" id="kk" placeholder="填写商家名称">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">店铺名称</label>
                            <input type="text" name="shop_name" value="{{old('shop_name')}}" class="form-control" id="kk" placeholder="填写商家名称">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">店铺分类</label>
                            <select class="form-control" name="category_id">
                                @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">起送金额</label>
                            <input type="text" name="start_send" value="{{old('start_send')}}" class="form-control" id="kk" placeholder="填写商家名称">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">配送金额</label>
                            <input type="text" name="send_cost" value="{{old('send_cost')}}" class="form-control" id="kk" placeholder="填写商家名称">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">准时送达</label>
                            <label class="radio-inline">
                                <input type="radio" name="on_time" id="inlineRadio1" value="0"> 使用
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="on_time" id="inlineRadio2" value="1" checked> 不使用
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">蜂鸟配送</label>
                            <label class="radio-inline">
                                <input type="radio" name="fengniao" id="inlineRadio1" value="0"> 使用
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="fengniao" id="inlineRadio2" value="1" checked> 不使用
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="xx">上传图片</label>
                            <input type="file" id="xx" name="shop_img" class="btn btn-success">
                            <p class="help-block">需要上传文件</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">店铺公告</label>
                            <textarea class="form-control" rows="3" name="notice">{{old('notice')}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="kk">优惠信息</label>
                            <textarea class="form-control" rows="3" name="discount">{{old('discount')}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="提交">
                    </div>


                </div>
            </div>
        </div>
        {{csrf_field()}}
    </form>
@stop()

@section('js')
@stop()
