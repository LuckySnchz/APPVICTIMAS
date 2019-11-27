<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Victim;
use App\Caso;
use DB;
use App\User;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    public function loginApi(Request $request){
//se crea objeto para devolver valores
        $data = new \StdClass();
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
 
        if ($validator->fails()) {
            $data->ok = false;
            $data->mensaje = $validator->messages();
            return response()->json(['error' => $data], 400);
        }
 
        $token = null;
        $credentials = $request->only('email', 'password');
 
        try {
		// setear el tiempo de expiración en minutos, por ejemplo, 10                          minutos
            JWTAuth::factory()->setTTL(10);
            
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
 
        // all good so return the token
        //return response()->json(compact('token'));
        return $this->respondWithToken($token);
    }

    public function getdatos(){
           
        $datos=DB::table('casos') ->join('victims', 'casos.id', '=', 'victims.idCaso') ->select('victims.victima_nombre_y_apellido','victims.tipodocumento','victims.victima_numero_documento','victims.victima_fecha_nacimiento','casos.cavaj','casos.fecha_ingreso')
       ->get();
        return response()->json($datos);
	}

	  /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
$datos=DB::table('casos') ->join('victims', 'casos.id', '=', 'victims.idCaso') ->select('victims.victima_nombre_y_apellido','victims.tipodocumento','victims.victima_numero_documento','victims.victima_fecha_nacimiento','casos.cavaj','casos.fecha_ingreso')
       ->get();
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'datos' => $datos,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

}