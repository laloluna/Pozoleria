<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mesa;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mesas.index', ['mesas' => Mesa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesas.create');
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
            "nombre" => "required|string",
        ]);

        $mesa = $request->all();

        $alreadyExist = Mesa::where('nombre', $request->nombre)->count();

        if($alreadyExist == 0)
            Mesa::create($mesa);
        else
        {
            $request->session()->flash("error", "Esa mesa ya existe");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("mesas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesa = Mesa::where('id', $id)->firstOrFail();
        return view('mesas.edit', ['mesa' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mesa = Mesa::where('id', $id)->firstOrFail();
        return view('mesas.edit', ['mesa' => $mesa]);
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
        $mesa = Mesa::where('id', $id)->firstOrFail();

        $this->validate($request,[
            "nombre" => "required|string",
        ]);

        $updating = $request->all();
        
        $alreadyExists = Mesa::where('nombre', $request->nombre)->where('id', '<>', $id)->count();
        if($alreadyExists == 0){
            $mesa->update($updating);
        }else{
            $request->session()->flash('error', "Esta mesa ya existe");
            return back()->withInput();
        }

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("mesas.index");  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesa = Mesa::where('id', $id)->firstOrFail();
        $deleted = $mesa->delete();

        if($deleted)
            $request->session()->flash('message', 'Eliminado con &eacute;xito');
        else
            $request->session()->flash('error', 'Algo sali&oacute mal. Contacte a desarrollo');

        return redirect()->route('mesas.index');
    }
}
