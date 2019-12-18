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
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\PayloadFactory;
use JWTFactory;
use Tymon\JWTAuth\Providers\JWT;

class ApiController extends Controller
{
    public function loginApi(Request $request){
        //se crea objeto para devolver valores
        $data = new \StdClass();
        $validator = Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'min:2'],
            'dni' => ['required', 'integer', 'min:6'],
        ]);
 
        if ($validator->fails()) {
            $data->codigo = 5;
            $data->mensaje = $validator->messages();
            return response()->json([
                'error' => $data                
        ], 400);
        }

        try {
            // setear el tiempo de expiración en minutos, por ejemplo, 10  minutos
            JWTAuth::factory()->setTTL(10);
            $nombre = $request->input('nombre');
            $dni = $request->input('dni');
            $factory = JWTFactory::customClaims([            
                'sub' => ['nombre'=>$nombre, 'dni' => $dni]                
            ]);
            
            $payload = JWTFactory::make($factory);
            $token = JWTAuth::encode($payload);
            
            session(['token_api' => $token->get()]);
                        
            return $this->respondWithToken($token);

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([
                'excepcion' => 'No se pudo obtener el token',
                'codigo' => -1
            ], 500);
        }
            
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
            'token' => "$token",            
            'expira_en' => JWTAuth::factory()->getTTL() * 60,
            'codigo' => 0
        ]);
    }

    public function getDatos(Request $request){
        try {            
            // abajo se decodifica el token            
            $compara_token = false;           
            if($request->header('Authorization'))   {
                $token_sesion = $request->session()->all()['token_api'];  
                $authorization_request = $request->header('Authorization');
                $token_request = \str_replace('Bearer ','',$authorization_request);
                $compara_token = $token_request == $token_sesion;
                if($compara_token){
                    JWTAuth::getToken()->get();   
                    $token_sesion = JWTAuth::getPayload()->toArray();
                    $exp = $token_sesion['exp'];
                }
                                                                                                         
            }                     
            
            if($compara_token){

                $data = new \StdClass();
                
                if ($request->input('dni') && $request->input('nombreApellido')){
                    $documento = $request->input('dni');
                    $nomyap = '%'.$request->input('nombreApellido').'%';
                    $validator = Validator::make($request->all(), [
                        'nombreApellido' => ['min:3','max:255','regex:/^([a-zA-ZñÑ.\s*-])+$/'],
                        'dni' => ['integer'],
                    ]);
                }

                else{
                    $documento = '';
                    $nomyap = '';
                    if ($request->input('nombreApellido')){
                        $nomyap = '%'.$request->input('nombreApellido').'%';
                        $validator = Validator::make($request->all(), [
                            'nombreApellido' => ['min:3','max:255','regex:/^([a-zA-ZñÑ.\s*-])+$/'],
                            
                        ]);
                    }else{
                        if ($request->input('dni')){
                            $documento = $request->input('dni');
                            $validator = Validator::make($request->all(), [
                                
                                'dni' => ['integer'],
                            ]);
                        }else{
                            $validator = Validator::make($request->all(), [
                                'nombreApellido' => ['min:3','max:255','regex:/^([a-zA-ZñÑ.\s*-])+$/'],
                                'dni' => ['integer'],
                            ]);
                        }
                    }
                                        
                }


     
                if ($validator->fails()) {
                    $data->ok = false;
                    $data->mensaje = $validator->messages();
                    return response()->json(['error' => $data], 400);
                }
                
                if ($nomyap == '' and $documento == ''){
                    return response()->json([
                        'datos' => 'Al menos un parametro de búsqueda debe estar completo',
                        'codigo' => 5
                    ]);
                }
                else{   

                    $datos=DB::table('casos')                     
                    ->select('victims.victima_nombre_y_apellido as nombreapellido',
                    \DB::raw(
                        '(CASE 
                        WHEN victims.tipodocumento = "1" THEN "D.N.I." 
                        WHEN victims.tipodocumento = "2" THEN "Documento Extranjero" 
                        WHEN victims.tipodocumento = "3" THEN "Libreta Civica" 
                        WHEN victims.tipodocumento = "4" THEN "Libreta de Enrolamiento" 
                        WHEN victims.tipodocumento = "5" THEN "Pasaporte" 
                        WHEN victims.tipodocumento = "6" THEN "Residencia Precaria" 
                        WHEN victims.tipodocumento = "7" THEN "Se Desconoce" 
                        WHEN victims.tipodocumento = "8" THEN "No posee" 
                        WHEN victims.tipodocumento = "9" THEN "Otro" 
                        END) AS tipodocumento'),
                    'victims.victima_numero_documento as documento',
                    'cavajs.nombre as cavaj','casos.fecha_ingreso as fechaVisita','departamentos.nombre as departamento',
                    'delitos.nombre as delito','modalidades.nombre as modalidad')
                    ->join('victims', 'casos.id', '=', 'victims.idCaso') 
                    ->join('delitos', 'casos.delito', '=', 'delitos.id')
                    ->join('cavajs', 'casos.cavaj', '=', 'cavajs.id')
                    ->join('departamentos', 'casos.departamento_judicial', '=', 'departamentos.id')
                    ->join('modalidades', 'casos.modalidad_ingreso', '=', 'modalidades.id')                    
                    ->where('victims.victima_nombre_y_apellido', 'like', $nomyap)
                    ->orWhere('victims.victima_numero_documento','=', $documento)
                    ->get();                    
                    return response()->json([
                        'datos' => $datos,
                        'codigo' => 0
                    ]);
                    
                }
                
            }
            else{
                return response()->json([
                    'error' => 'token incorrecto',
                    'codigo' => 5
                ], 400);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            
            return response()->json([
                'excepcion' => 'expiro el token',
                'codigo' => -1
            ], 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            
            return response()->json([
                'excepcion' => 'token invalido',
                'codigo' => -1
            ], 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e) {
            
            return response()->json([
                'excepcion' => 'token en lista negra',
                'codigo' => -1
            ], 500);
        } catch (JWTException $e) {            
            return response()->json([
                'excepcion' => 'No se pudo obtener el token',
                'codigo' => -1
            ], 500);
        }
       
    }

    public function consumirApi(){
	$url =  "https://simpapi-pub-test.mpba.gov.ar/api/Visita/ConsultaVisita";
        $cert_file = "/var/www/html/cert.pem";
        $cert_key_file = "/var/www/html/key.pem";

        $ch = curl_init();
        $options = array(
	        CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_URL => $url ,
//		CURLOPT_CAPATH, '/etc/ssl/private',
	        CURLOPT_SSLCERT => $cert_file,
		CURLOPT_SSLKEY => $cert_key_file,
		CURLOPT_KEYPASSWD => 'TxCP4m',
	        CURLOPT_SSL_VERIFYPEER => false,
	        CURLOPT_POSTFIELDS => "numeroDocumento=37907969"
        );

        $data = curl_setopt_array($ch , $options);
        $output = curl_exec($ch);

        if (!$output) {
	echo "Curl Error N° : " . curl_errno($ch);
        echo "Curl Error Msg : " . curl_error($ch);
        }
        else {
        echo $output;
	echo "exitoso";
        }
        return response()->json([
//	    'data'  => $data,
//            'output' => $output
        ]);
	curl_close($ch);
    }

}


