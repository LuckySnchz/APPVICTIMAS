<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Persona;
use App\Persona_nueva;
use App\Victim;
use App\Caso;
use App\Institucion;
use Validator;

class PersonaPanelController extends Controller
{
  public function detallepersona($id) {

$persona = Persona::find($id);
$personas = Persona::all();
session(["idPersona" => $id]);
$nombre_persona_asistida=$persona->nombre_persona_asistida;
$vinculo_victima=$persona->vinculo_victima;
$vinculo_otro=$persona->vinculo_otro;
$vinculo_otro_familiar=$persona->vinculo_otro_familiar;
$telefono_persona_asistida=$persona->telefono_persona_asistida;
$otro_telefono_persona_asistida=$persona->otro_telefono_persona_asistida;
$domicilio_persona_asistida=$persona->domicilio_persona_asistida;
$localidad_persona_asistida=$persona->localidad_persona_asistida;
$victim_pa=Persona_nueva::all();
if(Persona_nueva::where("idVictim",session("idVictim"))->where("idPersona",$id)->count()==0){
   
   return view("detallePersonaVinculo", compact("persona","personas","nombre_persona_asistida","vinculo_victima","vinculo_otro","telefono_persona_asistida","domicilio_persona_asistida","localidad_persona_asistida","otro_telefono_persona_asistida","vinculo_otro_familiar","victim_pa"));
    }
else{
          $duplicado=Persona::find($id)->nombre_persona_asistida;
         return view("duplicarreferente",compact("duplicado"));


/*$personas = Persona::all();
  $personas_nuevas = Persona_nueva::all();
    $casoActual = Caso::find(session("idCaso"));
    $victimActual = Victim::find(session("idVictim"));
  $casoActualenPersona =Persona::where("idCaso",session("idCaso"))->count();
  $cantVictimas = Victim::where("idCaso",session("idCaso"))->count();
  $cantdePersonas = Persona::where("idCaso",session("idCaso"))->count();

  $instituciones = Institucion::all();
  $institucionnav= Institucion::where("idCaso",session("idCaso"))->count();
  $clave=0;
return view("agregarPersona",compact("casoActual","cantVictimas","casoActualenPersona","victimActual","personas","instituciones","institucionnav","cantdePersonas","personas_nuevas","clave"))->with('message','Selecciona Caso, Incicencias, Derivaciones o BUSQUEDA GENERAL!');
*/



        }
}
public function agregar(Request $form){

 
  $reglas = [
  

    ];

  $validator = Validator::make($form->all(), $reglas);

  $validator->sometimes('agregar_persona', 'required', function ($input) {
    return $input->cantVictimas > "1";
          });

  $validator->sometimes('nombre_persona_asistida', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('vinculo_victima', 'required', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

 $validator->sometimes('telefono_persona_asistida', 'required|regex:/^([0-9-])+$/', function ($input)
 {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
         });


  $validator->sometimes('otro_telefono_persona_asistida', 'required|regex:/^([0-9-])+$/', function ($input)
 {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
         });

  $validator->sometimes('domicilio_persona_asistida', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑ.\s*-])+$/', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('localidad_persona_asistida', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑ.\s*-])+$/', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('vinculo_otro_familiar', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {        return $input->vinculo_victima == 1;
          });
  $validator->sometimes('vinculo_otro', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {        return $input->vinculo_victima == 4;
          });

  if ($validator->fails()) {
      return back()
                  ->withErrors($validator)
                  ->withInput();
  }

  if ($form["agregar_persona"] == 2) {
    return redirect("agregarPersona");

  } else {


$persona= new Persona();

$persona->nombre_persona_asistida= $form ["nombre_persona_asistida"];
$persona->vinculo_victima= $form ["vinculo_victima"];
$persona->vinculo_otro= $form ["vinculo_otro"];
$persona->vinculo_otro_familiar= $form ["vinculo_otro_familiar"];
$persona->telefono_persona_asistida= $form ["telefono_persona_asistida"];
$persona->otro_telefono_persona_asistida= $form ["otro_telefono_persona_asistida"];
$persona->domicilio_persona_asistida= $form ["domicilio_persona_asistida"];
$persona->localidad_persona_asistida= $form ["localidad_persona_asistida"];
$persona->idCaso= session("idCaso");
$persona->userID_create= Auth::id();
$persona->idVictim= session("idVictim");


$persona->save();




$persona->victims()->attach($form ["idVictim"],array("vinculo_victima"=> $form ["vinculo_victima"],"vinculo_otro"=> $form ["vinculo_otro"],
"vinculo_otro_familiar"=> $form ["vinculo_otro_familiar"],"idCaso"=> session("idCaso")));

return redirect("paneldecontrolvictima/{$persona->idCaso}");

}}


public function vinculopersona(Request $form) {

  
    $reglas = [
    
      "vinculo_victima"=>"required",
    ];

    $validator = Validator::make($form->all(), $reglas);

       $validator->sometimes('vinculo_otro_familiar', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {
      return $input->vinculo_victima == 1;
    });

    $validator->sometimes('vinculo_otro', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {
      return $input->vinculo_victima == 4;
    });

    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

  /* $persona = Persona::find(session("idPersona"));

    
      $persona->vinculo_victima= $form["vinculo_victima"];
      $persona->vinculo_otro= $form["vinculo_otro"];
      $persona->vinculo_otro_familiar= $form["vinculo_otro_familiar"];
      $persona->idCaso= $form["idCaso"];

      $persona->userID_create= $form["userID_create"];
      $persona->userID_modify= Auth::id();


     $persona->save();*/
     


  if ($form["vinculo_victima"] == 1){
  
      $persona_nueva = new Persona_nueva();
      
      $persona_nueva->idVictim= session("idVictim");
      $persona_nueva->idPersona= $form["idPersona"];
      $persona_nueva->vinculo_victima=$form["vinculo_victima"];
      $persona_nueva->vinculo_otro= NULL;
      $persona_nueva->vinculo_otro_familiar= $form["vinculo_otro_familiar"];
      $persona_nueva->idCaso= session("idCaso");

     $persona_nueva->save();

    }



      elseif ($form["vinculo_victima"] == 4){
       $persona_nueva = new Persona_nueva();
       $persona_nueva->idVictim= session("idVictim");
      $persona_nueva->idPersona= $form["idPersona"];
      $persona_nueva->vinculo_victima=$form["vinculo_victima"];
      $persona_nueva->vinculo_otro= $form["vinculo_otro"];
      $persona_nueva->vinculo_otro_familiar= NULL;
      $persona_nueva->idCaso= session("idCaso");



     $persona_nueva->save();}
   else{


$persona_nueva = new Persona_nueva();
       $persona_nueva->idVictim= session("idVictim");
      $persona_nueva->idPersona= $form["idPersona"];
      $persona_nueva->vinculo_victima=$form["vinculo_victima"];
      $persona_nueva->idCaso= session("idCaso");
    
 $persona_nueva->save();






     }




      

      


        return redirect("agregarPersona");
       
}


public function editar(Request $form) {

 $reglas = [

 

'nombre_persona_asistida'=>'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/',

'vinculo_victima'=>'required',

'telefono_persona_asistida'=> 'required|regex:/^([0-9-])+$/', 

'domicilio_persona_asistida'=>'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑ.\s*-])+$/', 

'localidad_persona_asistida'=> 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑ.\s*-])+$/',

       

];
$validator = Validator::make($form->all(), $reglas);

$validator->sometimes('vinculo_otro_familiar', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {
      return $input->vinculo_victima == 1;
    });

    $validator->sometimes('vinculo_otro', 'required|min:3|max:255|regex:/^([a-zA-ZñÑ.\s*-])+$/', function ($input) {
      return $input->vinculo_victima == 4;
    });

    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

      $persona = Persona::find($form["idPersona"]);

      $persona->nombre_persona_asistida= $form ["nombre_persona_asistida"];
      
      $persona->telefono_persona_asistida= $form ["telefono_persona_asistida"];
      $persona->otro_telefono_persona_asistida= $form ["otro_telefono_persona_asistida"];
      $persona->domicilio_persona_asistida= $form ["domicilio_persona_asistida"];
      $persona->localidad_persona_asistida= $form ["localidad_persona_asistida"];
      $persona->idCaso= $form["idCaso"];
      $persona->userID_create= $form["userID_create"];
      $persona->userID_modify= Auth::id();
$persona->save();
    $personas_nuevas=Persona_nueva::all();
    foreach($personas_nuevas as $persona_nueva){

if($persona_nueva->idVictim==session("idVictim")&&$persona_nueva->idPersona==session("idPersona")){

$persona_nueva->delete();
    }}
 
    
$persona_nueva = new Persona_nueva();
$persona_nueva->idVictim= session("idVictim");
$persona_nueva->idPersona= $form["idPersona"];
$persona_nueva->vinculo_victima=$form["vinculo_victima"];
$persona_nueva->vinculo_otro=$form["vinculo_otro"];
$persona_nueva->vinculo_otro_familiar=$form["vinculo_otro_familiar"];
$persona_nueva->save();
   

      return redirect("paneldecontrolvictima/{$persona->idCaso}");}


public function detalle($id) {

    $persona = Persona::find($id);
    $personas = Persona::all();
  session(["idPersona" => $id]);
  $victim_pa=Persona_nueva::all();
   $cantVictimas =Victim::where("idCaso",session("idCaso"))->count();
$nombre_persona_asistida=$persona->nombre_persona_asistida;

$telefono_persona_asistida=$persona->telefono_persona_asistida;
$otro_telefono_persona_asistida=$persona->otro_telefono_persona_asistida;
$domicilio_persona_asistida=$persona->domicilio_persona_asistida;
$localidad_persona_asistida=$persona->localidad_persona_asistida;


   
   return view("detallePersona", compact("persona","personas","nombre_persona_asistida"
   ,"telefono_persona_asistida","domicilio_persona_asistida","localidad_persona_asistida","cantVictimas","otro_telefono_persona_asistida","victim_pa"));
  
}
}