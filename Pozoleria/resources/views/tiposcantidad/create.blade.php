@extends('layouts.sidebar')

@section('description', 'En esta secci&oacute;n podr&aacute;s agregar a una unidad')

@section('title')
    <div>
        <i class= "fa fa-balance scale"></i> Informaci&oacute;n de la unidad
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
    {!! Form::model(new App\TipoCantidad, ['route' =>'tiposcantidad.store']) !!}
    @include('tiposcantidad.form', ['submit_text' => 'Crear'])
</div>

@endsection