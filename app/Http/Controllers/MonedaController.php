<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    //Formulario Create Criptomoneda
    public function createForm(){

        return view('moneda.createMoneda');
    }

    //Guardar datos Criptomoneda
    public function save(Request $request)
    {
        $validation = $this->validate($request, [
            'logotipo' => 'required',
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion'=>'required|string|max:200',
        ]);

        //Recoleccion de Logotipo
        if($request->hasFile('logotipo')){
            $validation['logotipo'] = $request-> file('logotipo')->store('logos','public');
        }

        //Guardado en tabla
        Moneda::create([
            'logotipo'=>$validation['logotipo'],
            'nombre'=>$validation['nombre'],
            'precio'=>$validation['precio'],
            'descripcion'=> $validation['descripcion'],
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }
}
