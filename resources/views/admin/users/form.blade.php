@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
    <div class="col-md-12">
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <div class="card-title">{{ $user->exists ? 'Editar usuario' : 'Crear usuario' }}</div>
            </div>
            <div class="card-body">
                <form action="{{ $user->exists ? route('users.update', $user) : route('users.store') }}" method="POST">
                    @csrf
                    @if ($user->exists)
                        @method('PUT')
                    @endif
                        <div class="mb-3"> 
                            <label for="role_id" class="form-label">Roles:</label>
                            <select class="form-select" aria-label="Seleccione" id="role_id" name="role_id" aria-describedby="role_id_help">
                                <option @if(old('role_id') == '') selected @endif >Seleccione</option>
                                @foreach ($roles as $value)
                                    <option value="{{ $value->id }}" @if(old('role_id', $user->role_id) == $value->id) selected @endif>{{ $value->type_user }}</option>
                                @endforeach
                            </select>
                            <div id="role_id_help" class="form-text @error('role_id') text-danger @enderror">
                                Selecciona un rol para el usuario.
                            </div>
                        </div>
                        <div class="mb-3"> 
                            <label for="name" class="form-label">Nombre completo:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" aria-describedby="name_help">
                            <div id="name_help" class="form-text @error('name') text-danger @enderror">
                                Ingresa el nombre de usuario.
                            </div>
                        </div>
                        <div class="mb-3"> 
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" aria-describedby="email_help">
                            <div id="email_help" class="form-text @error('email') text-danger @enderror">
                                Ingresa correo electrónico de la persona que hace el reclamo/queja.
                            </div>
                        </div>
                        <div class="mb-3"> 
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $user->password) }}" aria-describedby="password_help">
                            <div id="password_help" class="form-text @error('password') text-danger @enderror">
                                Ingresa la contraseña del usuario.
                            </div>
                        </div>
                    <div class="row"> 
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Actualizar' : 'Guardar' }}</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection