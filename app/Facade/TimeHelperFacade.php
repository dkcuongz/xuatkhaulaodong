<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class TimeHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TimeHelperFacade';
    }
}
