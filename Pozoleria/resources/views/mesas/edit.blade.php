@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Editar Mesa
    </div>

@endsection

@section('description', 'En esta secci&oacute;n podr&aacute;s editar una mesa')

@section('content')

<div>
{!! Form::model($mesa,
    [
    'method' => 'PUT',
    'route' =>['mesas.update', $mesa->id], 
    ]) !!}
@include('mesas.form', ['submit_text' => 'Editar'])
</div>
@endsection