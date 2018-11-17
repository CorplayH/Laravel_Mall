<?php

namespace App\Exceptions;

use Exception;

class ValidException extends Exception
{
    
    public function render()
    {
        return response()->json(['code' => $this->code, 'message' => $this->getMessage()], 401);
    }
    
}
