<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    public function render()
    {
        return ['data' => 'You don\'t have permission to edit this'];
    }
}
