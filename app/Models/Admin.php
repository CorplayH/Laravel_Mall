<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // 设置一个属性,让退出的时候将remember_token设置为空,就可以了
    protected $rememberTokenName ='';
    protected $guarded = [];
    
    public function attachments()
    {
        return $this->hasMany(Attachment::class,'user_id' ,'id');
    }
}

