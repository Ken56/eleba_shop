@extends('layouts.default')
@section('title','修改商家密码')
@section('content')
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>修改商家密码</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('updatepwd_save')}}" >
                <div class="form-group">
                    <label for="xxx">商家名称</label>
                    <input type="text" disabled class="form-control" id="xxx" placeholder="商家名称" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <label for="xxx">请填写旧密码</label>
                    <input type="password" name="old_pwd" class="form-control" id="xxx" placeholder="请填写旧密码">
                </div>
                <div class="form-group">
                    <label for="xxx">请填写新密码</label>
                    <input type="password" name="password" class="form-control" id="xxx" placeholder="请填写新密码">
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
