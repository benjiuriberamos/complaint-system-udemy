<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\ComplaintsDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class ComplaintsController extends Controller
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
        $qb = Complaints::query()
            ->orderBy('id', 'desc');

        $complaints = $qb->get();
        
        if (session('success_message')) {
            Alert::alert('Title', 'Message', 'Type');
        }

        return view('admin.complaints.index', ['collection' => $complaints]);
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
        
        redirect()
        ->route('complaints.index')
        ->withSuccessMessage('Se agrego exitosamente');
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
