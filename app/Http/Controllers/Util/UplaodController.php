<?php

namespace App\Http\Controllers\Util;

use App\Models\Attachment;
use App\Server\UploadServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UplaodController extends Controller
{
    //
    public function upload ( Request $request ,Attachment $attachment )
    {
        $file = $request->file('file');
        if ($file){
            $res = $this->isImage($file)?'image':'file';
            if ($res == 'image'){
                $filename =uniqid('IMG_').'.'.$file->getClientOriginalExtension();
                $userId = auth('admin')->user()->id;
                $file -> move('images',$filename);
                $path = url('images/'.$filename);
                Attachment::create([
                   'user_id' => $userId,
                   'filename'=>$filename,
                   'filetype'=>$res,
                   'path' =>$path
                ]);
                return ['path' => $path,'code' =>0];
            }
        }
    }
    
    protected function isImage ( $file )
    {
        //strtolower 扩展名不区分大小写
        $ext = strtolower ( $file->getClientOriginalExtension () );
        //检测上传文件是否为图片
        return in_array ( $ext , [ 'jpg' , 'jpeg' , 'png' , 'gif' ] );
        
    }
}
