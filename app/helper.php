<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 25/10/18
 * Time: 14:41
 */
function rand_code($len = 6 )
{
    $code = '';
    for ($i = 0; $i < $len; $i++){
        $code .= substr(mt_rand(0,10),0,1);
    }
    return $code;
}

function getTimeR($data){

    $date = explode(' ',$data);
    return $date[0];
    
}
