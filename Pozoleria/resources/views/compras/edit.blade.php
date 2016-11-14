@extends('layouts.sidebar')

@section('description', 'En esta secci&oacute;n podr&aacute;s editar una compra')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Edicion de Compras
    </div>

@endsection

@section('content')

<div class="col-sm-12"> 
{!! Form::model($compra,
    [
    'method' => 'PUT',
    'route' =>['compras.update', $compra->id], 
    'files' => 'true' 
    ]) !!}
@include('compras.form', ['submit_text' => 'Editar'])
</div>
@endsection