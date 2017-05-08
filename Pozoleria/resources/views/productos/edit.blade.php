@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Editar Producto
    </div>

@endsection

@section('description', 'En esta secci&oacute;n podr&aacute;s editar un producto')

@section('content')

<div>
{!! Form::model($producto,
    [
    'method' => 'PUT',
    'route' =>['productos.update', $producto->id], 
    ]) !!}
@include('productos.form', ['submit_text' => 'Editar'])
</div>
@endsection