<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->isAdmin()){
            return view('dashboard');
       }
       else{
           return redirect(route('home.index'));
       }
        
    }

    
}
