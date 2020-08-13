<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class VeterinarioController extends Controller
{
    //
    public function index()
    {
        $veterinarios = User::all();
        Auth::user()->countPage(3);
        return view('veterinarios.index',compact('veterinarios'));
        
    }
}
