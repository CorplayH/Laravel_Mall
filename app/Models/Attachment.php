<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $guarded =[];
    
    public function goodsImage()
    {
        return $this->belongsTo(Admin::class,'user_id','id');
    }
}
