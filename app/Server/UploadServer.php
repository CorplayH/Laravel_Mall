<?php

namespace App\Server;
use App\Exceptions\UploadException;
use Houdunwang\LaravelUpload\Events\UploadEvent;

class UploadServer
{
    /**
     * 上传
     * @param $file	上传文件
     * @param $type	image/file
     *
     * @return mixed
     */
    public function upload($file,$type){
        $this->check ($file,$type);
        $event = new UploadEvent($file);
        event($event);
        ##上传成功的文件
        return $event->getFile();
    }
    
    /**
     * 判断大小、类型是否满足要求
     * @param $file
     * @param $type
     */
    protected function check($file,$type){
        if($file->getSize() > cms_config ('upload.'.$type.'_size')){
            throw  new UploadException('上传文件过大');
        }
        //strtolower 扩展名不区分大小写
        $ext = strtolower ( $file->getClientOriginalExtension () );
        if(!in_array ($ext,explode (',',cms_config('upload.'.$type.'_type')))){
            throw  new UploadException('上传类型不允许');
        }
    }
}
