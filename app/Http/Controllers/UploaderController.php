<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use OSS\Core\OssException;

//上传图片和文件专用
class UploaderController extends Controller
{
    //上传图片
    public function upload(Request $request){

        $fileName=$request->file('file')->store($request->file_dir);
        $client = App::make('aliyun-oss');
        try{
            $client->uploadFile(getenv('OSS_BUCKET'), $fileName,storage_path('app/'.$fileName));
        } catch(OssException $e) {
            session()->flash('danger','上传文件失败');
            return back()->withInput();
        }
//保存绝对路径
        $fileName = 'https://yyc-shop-file.oss-cn-beijing.aliyuncs.com/'.$fileName;
        return ['url'=>$fileName];
    }
}
