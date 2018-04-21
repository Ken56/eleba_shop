@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>商家登录</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('login')}}" >
                <div class="form-group">
                    <label for="xxx">商家名称</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="xxx" placeholder="商家名称">
                </div>
                <div class="form-group">
                    <label for="xxx">填写密码</label>
                    <input type="password" name="password" class="form-control" id="xxx" placeholder="填写密码">
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="remember"> 记住我</label>
                </div>
                <div class="form-group">
                    <label for="xxx">验证码</label>
                    <input id="captcha" class="form-control" name="captcha" placeholder="填写验证码">
                    <br/>
                    <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                </div>


                <button type="submit" class="btn btn-primary">登录</button>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
@stop()

@section('js')
@stop()
