@extends('layouts.sidebar')

@section('description', 'En esta secci&oacute;n podr&aacute;s agregar a un producto')

@section('title')
    <div>
        <i class= "fa fa-list-alt"></i> Informaci&oacute;n del producto
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

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')

<div>
    {!! Form::model(new App\Producto, ['route' =>'productos.store']) !!}
    @include('productos.form', ['submit_text' => 'Crear'])
</div>

@endsection