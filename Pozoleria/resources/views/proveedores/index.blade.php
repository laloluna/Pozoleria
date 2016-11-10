@extends('layouts.sideBar')

@section('title', 'Proveedores')

@section('description', 'Esta es la pagina de proveedores')

@section('content')
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
            <tr>
                <td class="center">{{ $proveedor->id }} </td>
                <td class="center">{{ $proveedor->nombre }}</td>
                <td class="center">{{ $proveedor->telefono }}</td>
                <td>

                </td>
            </tr>
        @endforeach
    </tbody>
@endsection