<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function pluto(Request $request) {

        dd($request->name, $request->email);

        $testo = 'Ciao sono il tuo primo controller';
        return view('pluto', compact('testo'));
    }

    public function start() {
        $name = "";
        $tel = "";
        $email = "";
        $mess = "";
        return view('contatti', compact('name', 'tel', 'email', 'mess'));
    }
    public function messaggio(Request $request) {
        
        session(['name' =>  $request->name, 'tel' =>  $request->tel, 'email' =>  $request->email, 'mess' =>  $request->mess]);

        
        /*
        $name = $request->name;
        $tel = $request->tel;
        $email = $request->email;
        $mess = $request->mess;
        */

        return view('messaggio', );
    }

    public function modify(Request $request) {
        
        session(['name' =>  $request->name,
                'tel' =>  $request->tel, 
                'email' =>  $request->email, 
                'mess' =>  $request->mess]);

        /*
        $name = $request->name;
        $tel = $request->tel;
        $email = $request->email;
        $mess = $request->mess;
        */
        return view('contatti');
    }
}
