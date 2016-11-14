@extends('layouts.sidebar')

@section('description', 'En esta secci&oacute;n podr&aacute;s agregar una compra')

@section('title')


    <div>
        <i class= "fa fa-list-alt"></i> Informaci&oacute;n de compra
    </div>

@endsection

@section('content')

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

<div class="col-sm-12"> 
    {!! Form::model(new App\Compra, ['route' =>'compras.store', 'files' => true ]) !!}
    @include('compras.form', ['submit_text' => 'Crear'])
</div>

@endsection