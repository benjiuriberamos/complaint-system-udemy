<?php

namespace App\Facades;

use Google\Client;
use Google\Auth\OAuth2;
use App\Services\GoogleLoginService;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;

class GoogleLoginFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GoogleLoginService::class;
    }
}
