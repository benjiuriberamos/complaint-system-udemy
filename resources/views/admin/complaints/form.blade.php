@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
    <div class="col-md-12">
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <div class="card-title">{{ $complaint->exists ? 'Editar reclamo/queja' : 'Crear reclamo/queja' }}</div>
            </div>
            <form action="{{ $complaint->exists ? route('complaints.update', $complaint) : route('complaints.store') }}" method="POST">
                @csrf
                @if ($complaint->exists)
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4"> 
                            <label for="priority" class="form-label">Prioridad:</label>
                            <select class="form-select" aria-label="Seleccione" id="priority" name="priority" aria-describedby="priority_help">
                                <option @if(old('priority') == '') selected @endif >Seleccione</option>
                                @foreach (App\Models\Complaints::PRIORITY_TYPES as $value)
                                    <option value="{{ $value }}" @if(old('priority', $complaint->priority) == $value) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div id="priority_help" class="form-text @error('priority') text-danger @enderror">
                                Selecciona la prioridad del reclamo/queja.
                            </div>
                        </div>
                        <div class="col-4"> 
                            <label for="category" class="form-label">Categoría:</label>
                            <select class="form-select" aria-label="Seleccione" id="category" name="category" aria-describedby="category_help">
                                <option @if(old('category') == '') selected @endif>Seleccione</option>
                                @foreach (App\Models\Complaints::CATEGORY_TYPES as $value)
                                    <option value="{{ $value }}" @if(old('category', $complaint->category) == $value) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div id="category_help" class="form-text @error('category') text-danger @enderror">
                                Selecciona la categoría del reclamo/queja.
                            </div>
                        </div>
                        <div class="col-4"> 
                            <label for="id_user" class="form-label">Usuario:</label>
                            <select class="form-select" aria-label="Seleccione" id="id_user" name="id_user" aria-describedby="id_user_help">
                                <option @if(old('id_user') == '') selected @endif>Seleccione</option>
                                @foreach ($users as $value)
                                    <option value="{{ $value->id }}" @if( old('id_user', $complaint->id_user) == $value->id) selected @endif>{{ $value->name }}</option>
                                @endforeach
                            </select>
                            <div id="id_user_help" class="form-text @error('id_user') text-danger @enderror">
                                Selecciona el usuario que gestionara el reclamo/queja.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"> 
                        <label for="owner_name" class="form-label">Nombre completo:</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ old('owner_name', $complaint->owner_name) }}" aria-describedby="owner_name_help">
                        <div id="owner_name_help" class="form-text @error('owner_name') text-danger @enderror">
                            Ingresa el nombre de la persona que hace el reclamo/queja.
                        </div>
                    </div>
                    <div class="mb-3"> 
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $complaint->email) }}" aria-describedby="email_help">
                        <div id="email_help" class="form-text @error('email') text-danger @enderror">
                            Ingresa correo electrónico de la persona que hace el reclamo/queja.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="context" class="mb-2">Descripción del reclamo/queja:</label>
                        <textarea class="form-control" 
                            placeholder="Descripción del reclamo/queja" 
                            id="context" 
                            name="context" 
                            aria-describedby="context_help" 
                            style="height: 120px">{{ old('context', $complaint->context) }}</textarea>
                        <div id="context_help" class="form-text @error('context') text-danger @enderror">
                            Ingresa una detallada desripción de reclamo/queja.
                        </div>
                    </div>
                </div>
                <div class="card-footer"> 
                    <button type="submit" class="btn btn-primary">{{ $complaint->exists ? 'Actualizar' : 'Guardar' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection