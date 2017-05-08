<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index', ['productos' => Producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
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
            "alias" => "required|string",
            "precio" => "required|integer",
        ]);

        $producto = $request->all();

        $alreadyExist = Producto::where('nombre', $request->nombre)->count();

        if($alreadyExist == 0)
            Producto::create($producto);
        else
        {
            $request->session()->flash("error", "Ese producto ya existe");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("productos.index");
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
        $producto = Producto::where('id', $id)->firstOrFail();
        return view('productos.edit', ['producto' => $producto]);
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
        $producto = Producto::where('id', $id)->firstOrFail();

        $this->validate($request,[
            "nombre" => "required|string",
            "alias" => "required|string",
            "precio" => "required|integer",
        ]);

        $updating = $request->all();
        
        $alreadyExists = Producto::where('nombre', $request->nombre)->where('id', '<>', $id)->count();
        if($alreadyExists == 0){
            $producto->update($updating);
        }else{
            $request->session()->flash('error', "Este producto ya existe");
            return back()->withInput();
        }

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("productos.index");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $producto = Producto::where('id', $id)->firstOrFail();
        $deleted = $producto->delete();

        if($deleted)
            $request->session()->flash('message', 'Eliminado con &eacute;xito');
        else
            $request->session()->flash('error', 'Algo sali&oacute mal. Contacte a desarrollo');

        return redirect()->route('productos.index');
    }
}
