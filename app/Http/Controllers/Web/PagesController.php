<?php

namespace App\Http\Controllers\Web;


class PagesController extends AbstractController
{



  
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route("loans.index");
        }else{
            return view('auth.login');
        }
       
    }

   
}
