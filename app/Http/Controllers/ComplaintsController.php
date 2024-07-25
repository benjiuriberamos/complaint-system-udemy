<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintsDataTable;
use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request, ComplaintsDataTable $dataTable)
    {
        return $dataTable->render('admin.complaints.index');
        // $status = 'Todos';
        // $priority = 'Todos';
        // $category = 'Todos';

        // $complaints = DB::table('complaints')
        //                 ->select('complaints.*')
        //                 ->orderBy('id', 'ASC')
        //                 ->get();

        // return view('admin.complaints.index', [
        //     'complaints' => $complaints,
        //     'status' => $status,
        //     'priority' => $priority,
        //     'category' => $category,
        // ]);
        //
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
