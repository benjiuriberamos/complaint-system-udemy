<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $user_id = $user->id;

        if ($user->isAdmin())
            $num_complaints = Complaints::where('status', '!=', 'Resuelto')
                                        ->count();
        
        if ($user->isSupervisor())
            $num_complaints = Complaints::where('status', '!=', 'Resuelto')
                                        ->where('user_id', $user_id)
                                        ->count();

        return view('admin.dashboard', ['num_complaints' => $num_complaints]);
        // return view('home');
    }
}
