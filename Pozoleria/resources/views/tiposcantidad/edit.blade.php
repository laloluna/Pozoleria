@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Editar Unidad
    </div>

@endsection

@if (session('message'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

@section('description', 'En esta secci&oacute;n podr&aacute;s editar una unidad')

@section('content')

<div> 
{!! Form::model($tipocantidad,
    [
    'method' => 'PUT',
    'route' =>['tiposcantidad.update', $tipocantidad->id], 
    ]) !!}
@include('tiposcantidad.form', ['submit_text' => 'Editar'])
</div>
@endsection