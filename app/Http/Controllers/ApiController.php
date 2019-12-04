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
        /*$data = new \StdClass();
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
 
        if ($validator->fails()) {
            $data->ok = false;
            $data->mensaje = $validator->messages();
            return response()->json(['error' => $data], 400);
        }
        $credentials = $request->only('email', 'password');
        */                             
        
        try {
		// setear el tiempo de expiración en minutos, por ejemplo, 10                          minutos
            JWTAuth::factory()->setTTL(10);
            $user = User::first();

            $token = JWTAuth::fromUser($user); 

            /*if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }*/
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        // all good so return the token
        //return response()->json(compact('token'));
        return $this->respondWithToken($token);
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
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function getDatos(Request $request){
        $data = new \StdClass();

        $validator = Validator::make($request->all(), [
            'nomyap' => ['min:3','max:255','regex:/^([a-zA-ZñÑ.\s*-])+$/'],
            'documento' => ['integer'],
        ]);
        if ($validator->fails()) {
            $data->ok = false;
            $data->mensaje = $validator->messages();
            return response()->json(['error' => $data], 400);
        }
        // Chequeo que se envian los parametros sino le asigna blanco
        if ($request->input('nomyap')){
            $nomyap = $request->input('nomyap');
        }else{
            $nomyap = '';
        }
        if ($request->input('documento')){
            $documento = $request->input('documento');
        }
        else{
            $documento = '';
        }
        // ------------
        var_dump($nomyap);
        $datos=DB::table('casos') 
        ->join('victims', 'casos.id', '=', 'victims.idCaso') 
        ->select('victims.victima_nombre_y_apellido','victims.tipodocumento','victims.victima_numero_documento','victims.victima_fecha_nacimiento','casos.cavaj','casos.fecha_ingreso')
        ->where('victims.victima_nombre_y_apellido', 'like', '%'.$nomyap.'%')
        ->orWhere('victims.victima_numero_documento', $documento)
        ->get();

       return response()->json([
           'datos' => $datos,
       ]);
    }

    public function consumirApi(){
        $url = "http://simpapi-pub-test.mpba.gov.ar/penal/swagger/index.html?urls.primaryName=Pub%20Docs";
        $cert_file = "/var/www/html/cert.pem";
        $cert_key_file = "/var/www/html/key.pem";
        
        $ch = curl_init();
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_URL => $url ,
        CURLOPT_SSLCERT => $cert_file ,
        CURLOPT_SSLKEY => $cert_key_file,
        CURLOPT_KEYPASSWD => 'TxCP4m'
        );

        $data = curl_setopt_array($ch , $options);
        $output = curl_exec($ch);

        if (!$output) {
        echo "Curl Error : " . curl_error($ch);
        }
        else {
        echo htmlentities($output);
        }
        
        return response()->json([
            'data' => $data,
            'output' => $output
        ]);
    }

}


