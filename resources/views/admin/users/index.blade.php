@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h6>Usuarios</h6>
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <a href="{{ route('users.create')}}" class="btn btn-primary r-0">Crear</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <table id="table-items" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id_u }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->type_user }}</td>
                            <td>
                                <a href="{{ route('users.edit', ['user' => $item->id_u]) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('users.destroy', ['user' => $item->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script >
        
    </script>
    <script  type="module">
        new DataTable('#table-items',{
            dom: 'lrtip',
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        let column = this;
                        let title = column.header().textContent;

                        if (['Rol'].includes(title)) {
                            // Create input element
                            let select = document.createElement('select');
                            select.add(new Option(''));
                            select.style = 'width:100%';
                            select.classList.add('form-control');
                            select.classList.add('form-control-sm');

                            column.header().replaceChildren(select);
            
                            // Apply listener for user change in value
                            select.addEventListener('change', function() {
                                column
                                    .search(select.value, {exact: true})
                                    .draw();
                            });

                            // Add list of options
                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.add(new Option(d,d));
                                });

                        }

                        
                    });
            }
        });



    </script>
@endsection