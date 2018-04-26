@extends('layouts.default')
@section('title','菜品添加')
@section('content')
    <!--引入CSS-->
    <div class="container">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" style="background-color: rgba(29,238,138,0.17);padding-bottom: 20px;">
            <div><h1>菜品分类添加</h1></div>
            <form enctype="multipart/form-data" method="POST" action="{{route('food_menu.store')}}" >
                <div class="form-group">
                    <label for="xxx">菜品名称</label>
                    <input type="text" name="goods_name" value="{{old('goods_name')}}" class="form-control" id="xxx" placeholder="菜品名称">
                </div>
                <div class="form-group">
                    <label for="xxx">评分</label>
                    <input type="text" name="rating" value="{{old('rating')}}" class="form-control" id="xxx" placeholder="评分">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品价格</label>
                    <input type="number" name="goods_price" value="{{old('goods_price')}}" class="form-control" id="xxx" placeholder="菜品价格">
                </div>
                <div class="form-group">
                    <label for="xxx">月销售量</label>
                    <input type="number" name="month_sales" value="{{old('month_sales')}}" class="form-control" id="xxx" placeholder="月销售量">
                </div>
                <div class="form-group">
                    <label for="xxx">评级数</label>
                    <input type="number" name="rating_count" value="{{old('rating_count')}}" class="form-control" id="xxx" placeholder="评级数">
                </div>
                <div class="form-group">
                    <label for="xxx">菜品提示</label>
                    <input type="text" name="tips" value="{{old('tips')}}" class="form-control" id="xxx" placeholder="菜品提示">
                </div>
                <div class="form-group">
                    <label for="xxx">满足计数</label>
                    <input type="number" name="satisfy_count" value="{{old('satisfy_count')}}" class="form-control" id="xxx" placeholder="满足计数">
                </div>
                <div class="form-group">
                    <label for="xxx">满足率</label>
                    <input type="text" name="satisfy_rate" value="{{old('satisfy_rate')}}" class="form-control" id="xxx" placeholder="满足率">
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
                    <div id="uploader-demo" class="container-fluid">
                        <!--用来存放item-->
                        <div id="fileList" class="uploader-list"></div>
                        <div id="filePicker">选择图片</div>
                        <img src="" alt="" id="imgx" width="150px;" >
                        <input type="hidden" name="shop_img" value="" id="tj">
                    </div>
                    <br/>



                    {{--<div class="form-group col-lg-12">
                        <label for="xx">上传图片</label>
                        <input type="file" id="xx" name="goods_img" class="btn btn-success">
                        <p class="help-block">需要上传文件</p>
                    </div>--}}
                </div>

                {{--<div class="form-group">
                    <label for="xxx">菜品分类描述</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="菜品分类描述"></textarea>
                </div>--}}

                <button type="submit" class="btn btn-primary">提交</button>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
@stop()

@section('js')
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf: '/webuploader/Uploader.swf',

            // 文件接收服务端。
            server: '/upload',
            formData:{_token:'{{csrf_token()}}','file_dir':'public/foodmenu'},

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        // 监听上传成功实践
        uploader.on( 'uploadSuccess', function( file,response ) {
            var imgUrl=response.url;
            $("#imgx").attr('src',imgUrl);//回显图片
            $("#tj").val(imgUrl)//提交图片连接到隐藏框
        });

    </script>
@stop()
