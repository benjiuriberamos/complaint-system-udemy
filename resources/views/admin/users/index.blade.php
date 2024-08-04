@extends('layouts.adminlte-dashboard')

@section('css')
@endsection

@section('content')

@endsection

@section('javascript')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection