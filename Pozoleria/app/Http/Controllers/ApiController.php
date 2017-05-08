<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mesa;
use App\Cuenta;
use App\Producto;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return json_encode(
                array(
                    'state' => 404,
                    'status_msg' => 'USER NOT FOUND',
                    'data' => array()
                )
            );


        $password = sha1($request->password);
        if ($password == $user->key)
            return json_encode(
                array(
                    'state' => 200,
                    'status_msg' => 'OK',
                    'data'  => array(
                        'id'   => $user->id,
                        'name'      => $user->name,
                        'email'     => $user->email
                    )
                )
            );
        else
            return json_encode(
                array(
                    'state'         => 401,
                    'status_msg'    => 'WRONG PASSWORD',
                    'data'          => array()
                )
            );
    }

    public function getMesas()
    {
        $mesas = Mesa::select('id', 'nombre', 'disponible')->where('disponible', '1')->get();
        if ($mesas->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                    'status_msg' => 'NO MESAS',
                    'data' => array()
                )
            );

        return json_encode(
            array(
                'data' => $mesas
            )
        );
    }

    public function mesaInactiva(Request $request)
    {
        $mesa = Mesa::find($request->id);
        if ($mesa->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                )
            );
        
        $mesa->disponible = 0;
        $mesa->save();
        return json_encode(
            array(
                'state' => 200
            )
        );
    }

    public function mesaActiva(Request $request)
    {
        $mesa = Mesa::find($request->id);
        if ($mesa->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                )
            );
        
        $mesa->disponible = 1;
        $mesa->save();
        return json_encode(
            array(
                'state' => 200
            )
        );
    }

    public function makeCuenta(Request $request)
    {
        $cuenta = new Cuenta;
        $cuenta->mesa = $request->mesa;
        $cuenta->save();
        return json_encode(
            array(
                'state' => 200
            )
        );
    }

    public function getCuentas()
    {
        $cuentas = Cuenta::select('id', 'mesa', 'activa')->where('activa', '1')->get();
        foreach ($cuentas as $cuenta) {
            $mesa = Cuenta::find($cuenta->id)->mesas()->select('nombre')->first();
            $mesaid = Cuenta::find($cuenta->id)->mesas()->select('id')->first();
            $cuenta->mesa = $mesa->nombre;
            $cuenta->mesaId = $mesaid->id;
        }
        if ($cuentas->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                    'status_msg' => 'NO CUENTAS',
                    'data' => array()
                )
            );

        return json_encode(
            array(
                'data' => $cuentas
            )
        );
    }

    public function cuentaInactiva(Request $request)
    {
        $cuenta = Cuenta::find($request->id);
        if ($cuenta->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                )
            );
        
        $cuenta->activa = 0;
        $cuenta->save();
        return json_encode(
            array(
                'state' => 200
            )
        );
    }

    public function getProductos()
    {
        $productos = Producto::select('id','nombre','precio')->get();
        if ($productos->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                )
            );
        
        return json_encode(
            array(
                'data' => $productos
            )
        );
    }

    public function getProductosCuentas(Request $request)
    {
        $productos = Cuenta::find($request->id)->productos()->select('nombre','precio')->get();
        if ($productos->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                )
            );
        
        return json_encode(
            array(
                'data' => $productos
            )
        );
    }

    public function makeProductoCuenta(Request $request)
    {
        $cuenta = Cuenta::find($request->cuenta);
        $cuenta->productos()->attach($request->producto);
        
        return json_encode(
            array(
                'status' => 200
            )
        );
    }

    public function setTotales(Request $request)
    {
        $productos = Cuenta::find($request->id)->productos()->select('precio')->get();
        $cuenta = Cuenta::find($request->id);
        $suma = 0;
        foreach ($productos as $productos) {
            $suma += $productos->precio;
        }

        $cuenta->total = $suma;
        $cuenta->save();

        return json_encode(
            array(
                'status' => 200
            )
        );
    }

    public function getCuentasInactivas()
    {
        $cuentas = Cuenta::select('id', 'total', 'activa')->where('activa', '0')->get();
        
        if ($cuentas->count() <= 0)
            return json_encode(
                array(
                    'state' => 404,
                    'status_msg' => 'NO CUENTAS',
                    'data' => array()
                )
            );

        return json_encode(
            array(
                'data' => $cuentas
            )
        );
    }
}
