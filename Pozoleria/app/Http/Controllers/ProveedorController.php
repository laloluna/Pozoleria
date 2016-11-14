<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('proveedores.index', ['proveedores' => Proveedor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
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
            "telefono" => "required|string",
        ]);

        $proveedor = $request->all();

        $alreadyExist = Proveedor::where('nombre', $request->nombre)->count();

        if($alreadyExist == 0)
            Proveedor::create($proveedor);
        else
        {
            $request->session()->flash("error", "Ese proveedor ya existe");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("proveedores.index");
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
        $proveedor = Proveedor::where('id', $id)->firstOrFail();
        return view('proveedores.edit', ['proveedor' => $proveedor]);
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
        $proveedor = Proveedor::where('id', $id)->firstOrFail();

        $this->validate($request,[
            "nombre" => "required|string",
            "telefono" => "required|string",
        ]);

        $updating = $request->all();
        
        $alreadyExists = Proveedor::where('nombre', $request->nombre)->where('id', '<>', $id)->count();
        if($alreadyExists == 0){
            $proveedor->update($updating);
        }else{
            $request->session()->flash('error', "Este proveedor ya existe");
            return back()->withInput();
        }

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("proveedores.index");    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $proveedor = Proveedor::where('id', $id)->firstOrFail();
        $deleted = $proveedor->delete();

        if($deleted)
            $request->session()->flash('message', 'Eliminado con &eacute;xito');
        else
            $request->session()->flash('error', 'Algo sali&oacute mal. Contacte a desarrollo');

        return redirect()->route('proveedores.index');
    }
}
