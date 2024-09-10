<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /** @var App\Models\User */
        $user = Auth::user();

        $status = $request->query->get('status', '');
        $category = $request->query->get('category', '');
        $date_start = $request->query->get('date_start', '');
        $date_end = $request->query->get('date_end', '');

        if ($user->isAdmin()) {
            $query = Complaints::orderBy('id', 'DESC');
        } else {
            $query = Complaints::orderBy('id', 'DESC')->where('id_user', $user->id);
        }

        if ($status) {
            $query = $query->where('status', '=', $status);
        }
        if ($category) {
            $query = $query->where('category', '=', $category);
        }
        if ($date_start) {
            $query = $query->where('created_at', '>=',  $date_start);
        }
        if ($date_end) {
            $query = $query->where('created_at', '<=', $date_end);
        }

        $complaints = $query->get();

        $data['complaints'] = $complaints;
        $data['status'] = $status;
        $data['category'] = $category;
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;

        return view('admin.reports.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
