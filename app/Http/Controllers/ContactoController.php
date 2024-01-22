<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormulario(){
        return view('contacto.formulario');
    }

    public function guardarFormulario(Request $request){
        $request->validate([
            'nombre'=>['required', 'string', 'min:3'],
            'email'=>['required', 'email'],
            'contenido'=>['required', 'string', 'min:10']
        ]);

        try {
            Mail::to("admin@victor.es")
            ->send(new ContactoMailable(ucwords($request->nombre), $request->email, ucfirst($request->contenido)));
            return redirect()->route('home')->with('info', 'Comentario enviado correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('info', 'Comentario no enviado correctamente, hagalo más tarde');
        }
    }
}
