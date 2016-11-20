@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Editar Proveedor
    </div>

@endsection

@section('description', 'En esta secci&oacute;n podr&aacute;s editar un proveedor')

@section('content')

<div>
{!! Form::model($proveedor,
    [
    'method' => 'PUT',
    'route' =>['proveedores.update', $proveedor->id], 
    ]) !!}
@include('proveedores.form', ['submit_text' => 'Editar'])
</div>
@endsection