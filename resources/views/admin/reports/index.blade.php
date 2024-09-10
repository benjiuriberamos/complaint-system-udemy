@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h6>Reportes</h6>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('reports.index') }}" method="GET" id="form-export">
                        @csrf
                        <input type="hidden" name="status" id="export_status" value="{{ $status}}">
                        <input type="hidden" name="category" id="export_category" value="{{ $category}}">
                        <input type="hidden" name="date_start" id="export_date_start" value="{{ $date_start}}">
                        <input type="hidden" name="date_end" id="export_date_end" value="{{ $date_end}}">
                        <input type="submit" name="download_report" class="btn btn-success" value="Imprimir reporte">
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex mb-3">
                <form action="{{ route('reports.index') }}" method="get" class="form-group d-flex justify-content-between mb-3" id="form-reports">
                    @csrf
                    <div class="col-md-2 mx-1">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-select">
                            <option value="" @selected($status == '')>Todos</option>
                            @foreach (App\Models\Complaints::STATUS_TYPES as $item)
                                <option value="{{ $item }}" @selected($status == $item)>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mx-1">
                        <label for="category">Categoría</label>
                        <select name="category" id="category" class="form-select">
                            <option value="" @selected($category == '')>Todos</option>
                            @foreach (App\Models\Complaints::CATEGORY_TYPES as $item)
                                <option value="{{ $item }}" @selected($category == $item)>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mx-1">
                        <label for="date_start">Del</label>
                        <input type="date" class="form-control" id="date_start" name="date_start" value="{{ $date_start}}">
                    </div>
                    <div class="col-md-2 mx-1">
                        <label for="date_end">al</label>
                        <input type="date" class="form-control" id="date_end" name="date_end" value="{{ $date_end}}">
                    </div>
                </form>
            </div>
            <div class="row">
                <table id="table-items" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->priority }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M. Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Categoria</th>
                            <th>Fecha</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script >
        const form = document.querySelector('#form-reports');
        const statusInput = document.querySelector('#status');
        const categoryInput = document.querySelector('#category');
        const dateStartInput = document.querySelector('#date_start');
        const dateEndInput = document.querySelector('#date_end');
        
        statusInput.addEventListener('change', (e) => {
            form.submit();
        })

        categoryInput.addEventListener('change', (e) => {
            form.submit();
        })

        dateStartInput.addEventListener('change', (e) => {
            form.submit();
        })

        dateEndInput.addEventListener('change', (e) => {
            form.submit();
        })

    </script>
    <script  type="module">
        new DataTable('#table-items',{
            dom: 'lrtip',
        });



    </script>
@endsection