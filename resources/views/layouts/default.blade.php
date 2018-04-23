<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!--yyc自定义标题-->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('layouts._head')
@include('layouts._message')
@include('layouts._error')
<link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
<!--yyc自定义内容-->
@yield('content')

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/js/jquery-3.2.1.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/js/bootstrap.js"></script>
<!--引入JS-->
<script type="text/javascript" src="/webuploader/webuploader.js"></script>

@yield('js')
</body>
</html>