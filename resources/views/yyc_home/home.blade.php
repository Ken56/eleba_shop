@extends('layouts.default')
@section('title','商家首页')
@section('content')
    <div class="container">
        <div class="col-lg-12"><img src="{{\Illuminate\Support\Facades\URL::asset('/admin_zhuche.jpg')}}" style="width: 100%" alt="xx"></div>
        <a href="{{route('login')}}" class="btn btn-info btn-lg col-lg-3" style="bottom:140px;left:430px;position:relative">我要开店</a>
    </div>
@stop()

@section('js')
@stop()
