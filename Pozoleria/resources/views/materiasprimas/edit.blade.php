@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Editar Materia Prima
    </div>

@endsection

@section('description', 'En esta secci&oacute;n podr&aacute;s editar una materia prima')

@section('content')

<div>
{!! Form::model($materiaprima,
    [
    'method' => 'PUT',
    'route' =>['materiasprimas.update', $materiaprima->id], 
    ]) !!}
@include('materiasprimas.form', ['submit_text' => 'Editar'])
</div>
@endsection