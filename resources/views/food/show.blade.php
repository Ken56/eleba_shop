@extends('layouts.default')
@section('title','店铺详情')
@section('content')

   <div class="container">
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">商品名称</label>
               <input type="text" name="shop_name" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->shop_name}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">图片</label>
               <input type="text" name="shop_name" class="form-control" id="xxx" placeholder="Email">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">商品评分</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->shop_rating}}分">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">是否是品牌</label>
               <input type="text" name="brand" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->shop_rating==0?'不是品牌':'是品牌'}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">是否准时送达</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->on_time==0?'不是':'是'}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">是否蜂鸟配送</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->fengniao==0?'不是':'是'}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">是否标记</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->bao==0?'不是':'是'}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">是否票记</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->piao==0?'不是':'是'}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">是否准准标记</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->zhun==0?'不是':'是'}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">起送金额</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->start_send}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">配送费</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->send_cost}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">预计时间</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->estimate_time}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">店公告</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->notice}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">优惠信息</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->discount}}">
           </div>
       </div>
       <div class="col-xs-6">
           <div class="form-group">
               <label for="xxx">店铺分类</label>
               <input type="text" name="shop_rating" class="form-control" id="xxx" placeholder="Email" readonly value="{{$shop->category->name}}">
           </div>
       </div>


   </div>
@stop()

@section('js')
    <script>
        $("#jsx .btn-danger").click(function(){
            //二次确认
            if(confirm('确认删除该数据吗?删除后不可恢复!')){
                var tr = $(this).closest('tr');
                var id = tr.data('id');
                $.ajax({
                    type: "DELETE",
                    url: 'shop/'+id,
                    data: '_token={{ csrf_token() }}',
                    success: function(msg){
                        tr.fadeOut();
                    }
                });
                $(this).closest("tr").remove();
            }
        });
    </script>
@stop()

