<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comments;
use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\DataTables\ComplaintsDataTable;
use App\Http\Requests\ComplaintsRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;
use Egulias\EmailValidator\Parser\Comment;

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
        $complaints = Complaints::query()
            ->orderBy('id', 'desc')
            ->get();

        confirmDelete('Eliminar reclamo/queja!', '¿Estás seguro qué deseas eliminar este reclamo?');

        return view('admin.complaints.index', ['collection' => $complaints]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')
                    ->where('role_id', '2')
                    ->get();

        $data['users'] = $users;
        $data['complaint'] = new Complaints();
        $data['comments'] = [];
        return view('admin.complaints.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintsRequest $request)
    {

        $validated = $request->validated();
        $complaint = Complaints::create(array_merge($validated, ['status' => Complaints::STATUS_INIT]));
        
        alert()->success('Registro exitoso', `Se agrego el reclamo  $complaint->id.`);

        return redirect()
            ->route('complaints.index');
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
        $users = DB::table('users')
                    ->where('role_id', '2')
                    ->get();

        $comments = DB::table('comments')
                    ->join('complaints', 'comments.id_complaint', '=', 'complaints.id')
                    ->join('users', 'comments.id_user', '=', 'users.id')
                    ->select('comments.*', 'comments.created_at as fecha', 'complaints.*', 'users.*')
                    ->where('comments.id_complaint', $id)
                    ->orderBy('comments.id', 'DESC')
                    ->get();

        $complaint = Complaints::where('id', $id)->first();

        $data = [
            'users' => $users, 
            'complaint' => $complaint,
            'comments' => $comments,
        ];
        return view('admin.complaints.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComplaintsRequest $request, string $id)
    {
        $validated = $request->validated();
        $complaint = Complaints::find($id);
        $complaint->update($validated);

        if ( $request->input('comment') ) {
            Comments::create([
                'comment' => $validated['comment'],
                'id_user' => Auth::user()->id,
                'id_complaint' => $complaint->id,
            ]);
        }

        alert()->success('Reclamo actualizado', `Se actualizo el reclamo  $id.`);

        return redirect()
            ->route('complaints.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Complaints::deleted($id);
        alert()->success('Reclamo eliminado', `Se elimino el reclamo  $id.`);

        return redirect()
            ->route('complaints.index');
    }
}
