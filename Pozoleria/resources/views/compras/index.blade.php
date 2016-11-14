@extends('layouts.sideBar')

@section('title')
    <div>
        <i class= "fa fa-credit-card"></i> Compras
    </div>

@endsection

@section('description', 'Esta es la pagina de compras')

@section('content')
    <div>
        <section>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Materia Prima</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td class="center" width="5%">{{ $compra->id }} </td>
                            <td class="center">{{ App\MateriaPrima::find($compra->materiaPrima)->nombre }}</td>
                            <td class="center">{{ $compra->cantidad }}</td>
                            <td class="center">{{ App\TipoCantidad::find($compra->tipoCantidad)->nombre }}</td>
                            <td width="7%">
                                <div>
                                    {!! Form::open( [ 'method' => 'GET', 'route' =>['compras.edit', $compra->id]]) !!}
                                    <button class="btn btn-primary btn-xs btn-block"><i class="fa fa-pencil"></i></button>
                                    {!! Form::close()!!}
                                </div>
                            </td>
                            <td width="7%">
                                <div>
                                    {!! Form::open( [ 'method' => 'delete', 'route' =>['compras.destroy', $compra->id]]) !!}
                                    <button class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash-o "></i></button>
                                    {!! Form::close()!!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div>
        {!! Form::open( [ 'method' => 'GET', 'route' =>['compras.create']]) !!}
        {!! Form::submit('Agregar una compra', ['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>

@endsection