<?php

namespace App\Http\Controllers\Auth;

use App\Facades\GoogleLoginFacade;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class GoogleLoginController extends Controller
{
    
    public function index()
    {
        $data = GoogleLoginFacade::generateUrlLogin();
        dd($data);
    }
}
 