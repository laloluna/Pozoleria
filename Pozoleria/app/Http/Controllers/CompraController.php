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
        return view('compras.create', ['firstM'=> 0, 'materiasPrimas'=>$idMat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "materiaPrima" => "required|string",
            "cantidad" => "required|integer",
        ]);

        $indexMat = $request->materiaPrima;

        $materiaPrimaId = MateriaPrima::select('nombre')->get();
        foreach ($materiaPrimaId as $materiaPrima) {
            $idMat[] = $materiaPrima->nombre;
        }

        $materiaFinal = MateriaPrima::where('nombre', $idMat[$indexMat])->first()->id;

        Compra::create(["materiaPrima"=>$materiaFinal, "cantidad"=>$request->cantidad]);

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
        $materiaPrimaId = MateriaPrima::select('nombre')->get();
        foreach ($materiaPrimaId as $materiaPrima) {
            $idMat[] = $materiaPrima->nombre;
        }

        $compra = Compra::where('id', $id)->firstOrFail();

        $nombreMateriaPrima = Compra::find($id)->materiasPrimas()->first()->nombre;

        $keyMat = array_search($nombreMateriaPrima, $idMat);

        return view('compras.edit', ['firstM'=> $keyMat, 'compra'=>$compra, 'materiasPrimas'=>$idMat]);
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
        $compra = Compra::where('id' , $id)->firstOrFail();

        $this->validate($request,[
            "materiaPrima" => "required|string",
            "cantidad" => "required|integer",
        ]);

        $indexMat = $request->materiaPrima;

        $materiaPrimaId = MateriaPrima::select('nombre')->get();
        foreach ($materiaPrimaId as $materiaPrima) {
            $idMat[] = $materiaPrima->nombre;
        }

        $materiaFinal = MateriaPrima::where('nombre', $idMat[$indexMat])->first()->id;
        
        $compra->materiaPrima = $materiaFinal;
        $compra->cantidad = $request->cantidad;
        $compra->save();

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("compras.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $compra = Compra::where('id', $id)->firstOrFail();
        $deleted = $compra->delete();

        if($deleted)
            $request->session()->flash('message', 'Eliminado con &eacute;xito');
        else
            $request->session()->flash('error', 'Algo sali&oacute mal. Contacte a desarrollo');

        return redirect()->route("compras.index");
    }
}
