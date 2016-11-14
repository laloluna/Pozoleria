<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Compra;

use App\MateriaPrima;

use App\TipoCantidad;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compras.index', ['compras' => Compra::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiaPrimaId = MateriaPrima::select('nombre')->orderBy('id')->get();
        foreach ($materiaPrimaId as $materiaPrima) {
            $idMat[] = $materiaPrima->nombre;
        }
        $tipoCantidadId = TipoCantidad::select('nombre')->orderBy('id')->get();
        foreach ($tipoCantidadId as $tipoCantidad) {
            $idTipo[] = $tipoCantidad->nombre;
        }
        return view('compras.create', ['materiasPrimas'=>$idMat], ['tiposCantidad'=>$idTipo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = "";
        $this->validate($request,[
            "materiaPrima" => "required|string",
            "cantidad" => "required|integer",
            "tipoCantidad" => "required|string",
            ]);

        $indexMat = $request->materiaPrima;
        $indexTipo = $request->tipoCantidad;

        $materiaPrimaId = MateriaPrima::select('nombre')->orderBy('id')->get();
        foreach ($materiaPrimaId as $materiaPrima) {
            $idMat[] = $materiaPrima->nombre;
        }
        $tipoCantidadId = TipoCantidad::select('nombre')->orderBy('id')->get();
        foreach ($tipoCantidadId as $tipoCantidad) {
            $idTipo[] = $tipoCantidad->nombre;
        }

        $materiaFinal = MateriaPrima::where('nombre', $idMat[$indexMat])->first()->id;
        $tipoFinal = TipoCantidad::where('nombre', $idTipo[$indexTipo])->first()->id;

        Compra::create(["materiaPrima"=>$materiaFinal, "cantidad"=>$request->cantidad, "tipoCantidad"=>$tipoFinal]);

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("compras.index");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
