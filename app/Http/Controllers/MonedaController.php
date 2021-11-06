<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    //Read Criptomoneda
    public function read(){
        $coins = DB::table('criptomoneda')
            // Relacion de Lenguaje
            ->join('lenguaje_programacion', 'criptomoneda.lenguaje_id', '=', 'lenguaje_programacion.id')
            ->select('criptomoneda.*', 'lenguaje_programacion.descripcion_lenguaje')
            ->paginate(3);


        return view('moneda.readMoneda', compact('coins'));
    }
}
