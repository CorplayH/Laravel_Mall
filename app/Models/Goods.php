<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    
    protected $guarded = ['attrs', 'file', 'editormd-html-code'];
    
    protected $casts
        = [
            'images'      => 'array',
            'category_id' => 'array',
        ];
    
    public function getCategory($goods)
    {
        $newArr = '';
        foreach ($goods as $good) {
            $newArr .= Category::where('id', $good)->value('cname').' => ';
        }
        $arr = rtrim($newArr, '=> ');
        
        return $arr;
    }
    
    public function thirdName()
    {
        return $this->belongsTo(Category::class,'thirdCategory','id');
    }
}
