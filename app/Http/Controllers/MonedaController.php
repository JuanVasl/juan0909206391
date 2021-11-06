<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    //Formulario Create Criptomoneda
    public function createForm(){

        $lenguaje = Lenguaje::all();
        return view('moneda.createMoneda', compact('lenguaje'));
    }

    //Guardar datos Criptomoneda
    public function save(Request $request)
    {
        $validation = $this->validate($request, [
            'logotipo' => 'required',
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion'=>'required|string|max:200',
            'lenguaje' => 'required'
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
            'lenguaje_id' => $validation['lenguaje']
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }
}
