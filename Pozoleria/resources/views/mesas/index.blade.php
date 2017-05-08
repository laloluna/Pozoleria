@extends('layouts.sideBar')

@section('title')
    <div>
        <i class= "fa fa-square"></i> Mesas
    </div>

@endsection

@section('description', 'Esta es la pagina de mesas')

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

@section('content')
    <div>
        <section>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Accion</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mesas as $mesa)
                        <tr>
                            <td class="center" width="5%">{{ $mesa->id }} </td>
                            <td class="center">{{ $mesa->nombre }}</td>
                            <td class="center">{{ $mesa->disponible == 1 ? 'Disponible' : 'No disponible' }}</td>
                            <td width="7%">
                                <div>
                                    {!! Form::open( ['method' => 'GET', 'route' => ['mesas.edit', $mesa->id]] ) !!}
                                        <button class="btn btn-primary btn-xs btn-block"><i class="fa fa-pencil"></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td width="7%"> 
                                <div>
                                    {!! Form::open( ['method' => 'DELETE', 'route' => ['mesas.destroy', $mesa->id]] ) !!}
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
        {!! Form::open( [ 'method' => 'GET', 'route' =>['mesas.create']]) !!}
            {!! Form::submit('Agregar una mesa', ['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection