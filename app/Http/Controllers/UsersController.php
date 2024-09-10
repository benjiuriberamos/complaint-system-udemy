<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('users.*', 'users.id as id_u', 'roles.*')
                    ->get();

        $data['users'] = $users;
        return view('admin.users.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Roles::all();

        $data['roles'] = $roles;
        $data['user'] = new User();
        return view('admin.users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $complaint = User::create(array_merge($validated, ['password' => Hash::make($validated['password'])]));
        
        alert()->success('Registro exitoso', `Se agrego el reclamo  $complaint->id.`);

        return redirect()
            ->route('users.index');
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
        $roles = Roles::all();
        $user = User::find($id);

        $data['roles'] = $roles;
        $data['user'] = $user;
        return view('admin.users.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        $complaint = User::find($id);
        $complaint->update($validated);


        alert()->success('Reclamo actualizado', `Se actualizo el reclamo  $id.`);

        return redirect()
            ->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::deleted($id);
        alert()->success('Usuario eliminado', `Se elimino el usuario  $id.`);

        return redirect()
            ->route('complaints.index');
    }
}
