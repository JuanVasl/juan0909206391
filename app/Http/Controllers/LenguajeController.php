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

    //Formulario para Update lenguajes
    public function updateForm($id){
        $lenguajes = Lenguaje::findOrFail($id);

        return view('lenguaje.updateLenguaje', compact( 'lenguajes'));
    }

    //Edicion de Criptomoneda
    public function edit(Request $request, $id){
        $dataLeng = request()->except((['_token','_method']));
        Lenguaje::where('id', '=', $id)->update($dataLeng);

        return redirect('/lenguaje/read')->with('editar', 'ok');
    }
}
