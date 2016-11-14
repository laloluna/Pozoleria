@extends('layouts.sideBar')

@section('title')
    <div>
        <i class= "fa fa-balance-scale"></i> Unidades
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

@section('description', 'Esta es la pagina de unidades')

@section('content')
    <div>
        <section>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tiposcantidad as $tipocantidad)
                        <tr>
                            <td class="center" width="5%">{{ $tipocantidad->id }} </td>
                            <td class="center">{{ $tipocantidad->nombre }}</td>
                            <td width="7%">
                                <div>
                                {!!Form::open( ['method' => 'GET', 'route' => ['tiposcantidad.edit', $tipocantidad->id]] ) !!}
                                    <button class="btn btn-primary btn-xs btn-block"><i class="fa fa-pencil"></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td width="7%">
                                <div>
                                {!!Form::open(['method' => 'DELETE', 'route' =>['tiposcantidad.destroy', $tipocantidad->id]] ) !!}
                                    <button class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash-o "></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div align="right">
        {!! Form::open( [ 'method' => 'GET', 'route' =>['tiposcantidad.create']]) !!}
        {!! Form::submit('Agregar una unidad', ['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection