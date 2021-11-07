<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use Illuminate\Http\Request;

class LenguajeController extends Controller
{
    //Formulario Create Lenguaje
    public function createForm(){

        return view('lenguaje.createLenguaje');
    }

    //Guardar Lenguaje
    public function save(Request $request){

        $validator = $this->validate($request, [
            'descripcion'=> 'required|string|max:45',
        ]);

        Lenguaje::create([
            'descripcion_lenguaje'=>$validator['descripcion']
        ]);

        return redirect('/')->with('guardar', 'ok');
    }

    //Read Listado de lenguajes
    public function read(){
        $language['lenguajes'] = Lenguaje::paginate(7);

        return view('lenguaje.readLenguaje', $language);
    }
}
