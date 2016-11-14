@extends('layouts.sideBar')

@section('title')
    <div>
        <i class= "fa fa-cutlery"></i> Materias Primas
    </div>

@endsection

@section('description', 'Esta es la pagina de materias primas')

@section('content')
    <div>
        <section>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Proveedor</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materiasprimas as $materiaprima)
                        <tr>
                            <td class="center" width="5%">{{ $materiaprima->id }} </td>
                            <td class="center">{{ $materiaprima->nombre }}</td>
                            <td class="center">{{ $materiaprima->precio }}</td>
                            <td class="center">{{ App\Proveedor::find($materiaprima->proveedor)->nombre }}</td>
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
        {!! Form::open( [ 'method' => 'GET', 'route' =>['materiasprimas.create']]) !!}
        {!! Form::submit('Agregar una materia prima', ['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection