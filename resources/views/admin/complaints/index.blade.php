@extends('layouts.adminlte-dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.css" />
@endsection

@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">Listado de quejas</div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection

@section('javascript')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection