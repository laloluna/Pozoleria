<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MateriaPrima;
use App\Proveedor;
use App\TipoCantidad;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materiasprimas.index', ['materiasprimas' => MateriaPrima::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedoresQuery = Proveedor::select('nombre')->orderBy('id')->get();
        foreach ($proveedoresQuery as $proveedor) {
            $proveedores[] = $proveedor->nombre;
        }
        $unidadesQuery = TipoCantidad::select('nombre')->orderBy('id')->get();
        foreach ($unidadesQuery as $unidad) {
            $unidades[] = $unidad->nombre;
        }
        return view('materiasprimas.create', ['firstP' => 0, 'firstU' => 0, 'proveedores' => $proveedores, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre"=>"required|string",
            "tipoCantidad"=>"required|string",
            "precio"=>"required|integer",
            "proveedor"=>"required|string",
        ]);

        $indexProveedor = $request->proveedor;
        $indexUnidad = $request->tipoCantidad;

        $proveedoresQuery = Proveedor::select('nombre')->get();
        $unidadesQuery = TipoCantidad::select('nombre')->get();

        foreach ($proveedoresQuery as $proveedor) {
            $proveedores[] = $proveedor->nombre;
        }
        foreach ($unidadesQuery as $unidad) {
            $unidades[] = $unidad->nombre;
        }

        $proveedorFinal = Proveedor::where('nombre', $proveedores[$indexProveedor])->first()->id;
        $unidadFinal = TipoCantidad::where('nombre', $unidades[$indexUnidad])->first()->id;

        MateriaPrima::create(["nombre"=>$request->nombre, "tipoCantidad"=>$unidadFinal, "precio"=>$request->precio, "proveedor"=>$proveedorFinal]);

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("materiasprimas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiaprima = MateriaPrima::where('id', $id)->firstOrFail();

        $unidadesQuery = TipoCantidad::select('nombre')->get();
        foreach ($unidadesQuery as $unidad) {
            $unidades[] = $unidad->nombre;
        }
        $unidadNombre = MateriaPrima::find($id)->tiposCantidad()->first()->nombre;
        $keyUnidad = array_search($unidadNombre, $unidades);

        $proveedoresQuery = Proveedor::select('nombre')->get();
        foreach ($proveedoresQuery as $proveedor) {
            $proveedores[] = $proveedor->nombre;
        }
        $proveedorNombre = MateriaPrima::find($id)->proveedores()->first()->nombre;
        $keyProveedor = array_search($proveedorNombre, $proveedores);

        return view('materiasprimas.edit', ['materiaprima' => $materiaprima, 'firstU' => $keyUnidad, 'firstP' => $keyProveedor, 'unidades' => $unidades, 'proveedores' => $proveedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "nombre" => "required|string",
            "tipoCantidad" => "required|string",
            "precio" => "required|integer",
            "proveedor" => "required|string",
        ]);

        $materiaPrima = MateriaPrima::where('id', $id)->firstOrFail();

        $indexUnidad = $request->tipoCantidad;
        $unidadesQuery = TipoCantidad::select('nombre')->get();
        foreach ($unidadesQuery as $unidad) {
            $unidades[] = $unidad->nombre;
        }
        $unidadFinal = TipoCantidad::where('nombre', $unidades[$indexUnidad])->first()->id;

        $indexProveedor = $request->proveedor;
        $proveedoresQuery = Proveedor::select('nombre')->get();
        foreach ($proveedoresQuery as $proveedor) {
            $proveedores[] = $proveedor->nombre;
        }
        $proveedorFinal = Proveedor::where('nombre', $proveedores[$indexProveedor])->first()->id;

        $updating = $request->all();
        $updating['tipoCantidad'] = $unidadFinal;
        $updating['proveedor'] = $proveedorFinal;

        $materiaPrima->update($updating);

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("materiasprimas.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
