@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "fa fa-wrench"></i> Edicion de Compras
    </div>

@endsection

@section('content')

<h2> Editar donante </h2>
<p> Aqu&iacute; podr&aacute;s editar cada donante. <br> </p>

<div class="col-sm-12"> 
{!! Form::model($compras,
    [
    'method' => 'PUT',
    'route' =>['compras.update', $compras->id], 
    'files' => 'true' 
    ]) !!}
@include('compras.form', ['submit_text' => 'Editar'])
</div>
@endsection