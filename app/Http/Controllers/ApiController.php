<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Victim;

class ApiController extends Controller
{
    
    public function getdatos(){
     
        $datos=DB::table('casos') ->join('victims', 'casos.id', '=', 'victims.idCaso') ->select('victims.victima_nombre_y_apellido','victims.tipodocumento','victims.victima_numero_documento','victims.victima_fecha_nacimiento','casos.cavaj','casos.fecha_ingreso')
       ->get();
        return response()->json($datos);
}
}

