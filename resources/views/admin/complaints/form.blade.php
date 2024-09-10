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
                        @if ($complaint->exists)
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
                        @endif
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
                        <label for="status" class="form-label">Estado:</label>
                            <select class="form-select" aria-label="Seleccione" id="status" name="status" aria-describedby="status_help">
                                <option @if(old('status') == '') selected @endif>Seleccione</option>
                                @foreach (App\Models\Complaints::STATUS_TYPES as $value)
                                    <option value="{{ $value }}" @if( old('status', $complaint->status) == $value) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div id="status_help" class="form-text @error('status') text-danger @enderror">
                                Selecciona el estado el reclamo/queja.
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
                    @if (Auth::user()->isAdmin())
                    <div class="mb-3">
                        @php
                            $num_comments = count($comments);
                        @endphp
                        <strong>Comentarios</strong><br>
                        @if ($num_comments > 0)
                            @foreach ($comments as $comment)
                                <div class="m-3">
                                    <strong>{{ $comment->name }}</strong><br>
                                    <label for="">{{ $comment->fecha }}</label>
                                    <p>{{ $comment->comment}}</p>
                                </div>
                            @endforeach
                        @else
                            <p>No hay comentarios.</p>
                        @endif
                        <hr>
                        <div class="mb-3">
                            {{-- <label for="comment" class="mb-2">Ingresa un comentario:</label> --}}
                            <textarea class="form-control" 
                                placeholder="Ingresa un comentario" 
                                id="comment" 
                                name="comment" 
                                aria-describedby="comment_help" 
                                style="height: 120px">{{ old('comment') }}</textarea>
                            <div id="comment_help" class="form-text @error('comment') text-danger @enderror">
                                Ingresa un comentario
                            </div>
                        </div>
                    </div>
                    @else
                        <strong>Solo los administradores pueden insertar comentarios</strong>
                    @endif
                </div>
                <div class="card-footer"> 
                    <button type="submit" class="btn btn-primary">{{ $complaint->exists ? 'Actualizar' : 'Guardar' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection