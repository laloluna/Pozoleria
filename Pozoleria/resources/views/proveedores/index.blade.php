@extends('layouts.sideBar')

@section('title')
    <div>
        <i class= "fa fa-truck"></i> Proveedores
    </div>

@endsection

@section('description', 'Esta es la pagina de proveedores')

@section('content')
    <div>
        <section>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="center" width="5%">{{ $proveedor->id }} </td>
                            <td class="center">{{ $proveedor->nombre }}</td>
                            <td class="center">{{ $proveedor->telefono }}</td>
                            <td width="7%">
                                <div>
                                    <button class="btn btn-primary btn-xs btn-block"><i class="fa fa-pencil"></i></button>
                                </div>
                            </td>
                            <td width="7%">
                                <div>
                                    <button class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash-o "></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div align="right">
        {!! Form::open( [ 'method' => 'GET', 'route' =>['proveedores.create']]) !!}
        {!! Form::submit('Agregar un proveedor', ['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection