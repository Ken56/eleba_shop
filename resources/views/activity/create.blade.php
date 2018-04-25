@extends('layouts.default')
@section('title','商家分类管理')
@section('content')
    <div class="container">
        <div class="col-lg-2"></div>

        <div class="col-lg-8">

            <form enctype="multipart/form-data" method="POST" action="{{route('activity.store')}}" >
                <div class="form-group">
                    <label for="kk">活动标题</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="kk" placeholder="填写商家名称">
                </div>
                <div class="form-group">
                    <label for="kk">活动开始时间</label>
                    <input type="date" name="start" value="{{old('start')}}" class="form-control" id="kk" placeholder="填写商家名称">
                </div>
                <div class="form-group">
                    <label for="kk">活动结束时间</label>
                    <input type="date" name="end" value="{{old('end')}}" class="form-control" id="kk" placeholder="填写商家名称">
                </div>
                <div class="form-group">
                    <label for="xx">活动内容</label>
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="contentx" type="text/plain">
                    {!! old('contentx') !!}
                    </script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                    </script>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
                {{csrf_field()}}
            </form>

        </div>


        <div class="col-lg-2"></div>
    </div>
@stop()

@section('js')
@stop()
