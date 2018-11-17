<?php

namespace App\Http\Controllers\Util;

use App\Models\Attachment;
use App\Server\UploadServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    
    public function upload(Request $request, Attachment $attachment)
    {
        
        $file = $request->file('file');
        
        if ($file) {
            $fileType = $this->isImage($file) ? 'image' : 'file';
            if ($fileType == 'image') {
                $filename = uniqid('IMG_').'.'.$file->getClientOriginalExtension();
                
                if (isset(auth('admin')->user()->id)){
                    $userId = auth('admin')->user()->id.'_admin';
                }else{
                    $userId = auth()->user()->id.'_user';
                }
                $res = $file->move('images/'.date('Ymd'), $filename);
                $path = url($res);
                Attachment::create([
                    'user_id'  => $userId,
                    'filename' => $filename,
                    'filetype' => $fileType,
                    'path'     => $path,
                ]);
                return ['path' => $path, 'code' => 0];
            }
        }
    }
    
    protected function isImage($file)
    {
        //strtolower 扩展名不区分大小写
        $ext = strtolower($file->getClientOriginalExtension());
        
        //检测上传文件是否为图片
        return in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
        
    }
}
