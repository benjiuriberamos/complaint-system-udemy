@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-7">
                    <h6>Listado de quejas</h6>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <a href="{{ route('complaints.create')}}" class="btn btn-primary r-0">Crear</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="table-items" class="table" style="width:100%">
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
                            <a href="{{ route('complaints.edit', ['complaint' => $item->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{ route('complaints.destroy', ['complaint' => $item->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Eliminar</a>
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
            dom: 'lrtip',
            search: false,
            ordering: false,
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        let column = this;
                        let title = column.header().textContent;

                        if (['Id', 'Nombre', 'Email', 'Fecha'].includes(title)) {
                            // Create input element
                            let input = document.createElement('input');
                            input.style = 'width:100%';
                            input.classList.add('form-control');
                            input.classList.add('form-control-sm');
                            input.placeholder = title;
                            
                            column.header().replaceChildren(input);
            
                            // Event listener for user input
                            input.addEventListener('keyup', () => {
                                if (column.search() !== this.value) {
                                    column.search(input.value).draw();
                                }
                            });
                        }
                        if (['Prioridad', 'Estado', 'Categoria'].includes(title)) {
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

        // new DataTable('#table-items', {
        //     dom: 'lrtip',
        //     searching: false,
        //     initComplete: function () {
        //         this.api()
        //             .columns()
        //             .every(function () {
        //                 let column = this;
        
        //                 // Create select element
        //                 let select = document.createElement('select');
        //                 select.add(new Option(''));
        //                 column.footer().replaceChildren(select);
        
        //                 // Apply listener for user change in value
        //                 select.addEventListener('change', function () {
        //                     column
        //                         .search(select.value, {exact: true})
        //                         .draw();
        //                 });
        
        //                 // Add list of options
        //                 column
        //                     .data()
        //                     .unique()
        //                     .sort()
        //                     .each(function (d, j) {
        //                         select.add(new Option(d));
        //                     });
        //             });
        //     }
        // });


    </script>
@endsection