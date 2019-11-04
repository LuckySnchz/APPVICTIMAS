<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Victim;

class ApiController extends Controller
{
    
    public function getdatos(){
        $datos=Victim::all();
        return response()->json($datos);
}
}