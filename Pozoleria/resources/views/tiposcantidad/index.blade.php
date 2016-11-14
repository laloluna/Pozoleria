@extends('layouts.sideBar')

@section('title')
    <div>
        <i class= "fa fa-balance-scale"></i> Unidades
    </div>

@endsection

@section('description', 'Esta es la pagina de unidades')

@section('content')
    <div>
        <section>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tiposcantidad as $tipocantidad)
                        <tr>
                            <td class="center" width="5%">{{ $tipocantidad->id }} </td>
                            <td class="center">{{ $tipocantidad->nombre }}</td>
                            <td width="15%">
                                <div class="col-xs-2 col-xs-offset-2">
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                </div>
                                <div class="col-xs-2">
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
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
        {!! Form::submit('Agregar una unidad', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection