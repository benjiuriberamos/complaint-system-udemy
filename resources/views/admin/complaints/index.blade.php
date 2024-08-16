@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">Listado de quejas</div>
        <div class="card-body">
            <table id="table-items" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->owner_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M. Y') }}</td>
                        <td>
                            <a href="{{ route('complaints.update', ['complaint'=>$item->id]) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('complaints.destroy', ['complaint'=>$item->id]) }}" class="btn btn-danger" data-confirm-delete="true">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script  type="module">
        new DataTable('#table-items',{
            search: {
                return: true
            },
            ordering:  true
        });


    </script>
@endsection