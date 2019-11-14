<?php

session_start();
  $apiCall = curl_init("http://whatsfarma.com.ar/api/v1/ApiVictim.json");
  curl_setopt($apiCall, CURLOPT_RETURNTRANSFER, 1);
  $apiOutput = curl_exec($apiCall);
  curl_close($apiCall);
  $victimas = json_decode($apiOutput, true); 

 $victimaInPost = '';
 $buscar = '';
  if ($_GET) {
    $victimaInPost = $_GET['victimas'];
    $buscar=$_GET['buscar'];

  }

 


    $apiCall = curl_init("http://whatsfarma.com.ar/api/v1/ApiCaso.json");
  curl_setopt($apiCall, CURLOPT_RETURNTRANSFER, 1);
  $apiOutput = curl_exec($apiCall);
  curl_close($apiCall);
  $casos = json_decode($apiOutput, true); 



?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
   
      <title>Api Víctimas</title>
      <style>
   .btn{margin-left: -3%}


      </style>
       <a name="Ancla" id="Ancla"></a>
   </head>
  <header>
     <section class=" container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 20000px" >
     
     @include('navbar')
<br>
 <section class=" container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 20000px;width: 50%" >
     <form method="_GET" style=";margin-left:35%;margin-top: 10%">


<input type="radio" name="buscar"  value="1" checked class="font-weight-bold" style="text-decoration:underline;margin-left: -30%" > <strong>Nombre y apellido</strong>


<input type="radio" name="buscar"  value="2" class="font-weight-bold" style="text-decoration:underline;margin-left: 10%" > <strong>Documento de Identidad</strong><br><br>



    <input type="text" class="form-control" style="width: 100%;margin-left: -30%" name="victimas" value="" required>


<div style="margin-left: -30%">
@if($buscar==1)
             @foreach ($casos as $caso)
             @foreach ($victimas as $victima)
             @if(($victimaInPost == $victima['victima_nombre_y_apellido'])&&($victima['idCaso']==$caso['id']))<br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Víctima: </label><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Nombre y Apellido: </label>
            
             <?=$victima['victima_nombre_y_apellido']?><br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Tipo de Documento: </label>
                      
             <?=$victima['tipodocumento']==  'NULL'? 'No Posee / Se Desconoce' : $victima['tipodocumento']== 1 ? 'D.N.I.' :$victima['tipodocumento']== 2 ? 'Documento Extranjero' : $victima['tipodocumento']== 3 ? 'Libreta Cívica' : $victima['tipodocumento']== 4 ? 'Libreta de Enrolamiento' : $victima['tipodocumento']== 5 ? 'Pasaporte' : $victima['tipodocumento']== 6 ? 'Residencia Precaria' : $victima['tipodocumento']== 7 ? 'Se Desconoce' : $victima['tipodocumento']== 7 ? 'Se Desconoce' : $victima['tipodocumento']== 8 ? 'No posee' : $victima['tipodocumento']== 9 ? 'Otro' : null ?><br>                    


              <label class="font-weight-bold" style="text-decoration:underline;"> Número de Documento: </label>
             
             <?=$victima['victima_numero_documento']?><br>

               <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Nacimiento: </label>
             
             <?=$victima['victima_fecha_nacimiento']?><br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Caso: </label><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Cavaj: </label>
              <br>
             <?=$caso['cavaj']?><br>

             <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Ingreso: </label>
             <br>
             <?=$caso['fecha_ingreso']?><br>

            <p>__________________________________________________</p>
             @endif
             @endforeach
             @endforeach
   @endif


   @if($buscar==2)
             @foreach ($casos as $caso)
             @foreach ($victimas as $victima)
             @if(($victimaInPost == $victima['victima_numero_documento'])&&($victima['idCaso']==$caso['id']))<br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Víctima: </label><br>
              <label class="font-weight-bold" style="text-decoration:underline;"> Nombre y Apellido: </label>
            
             <?=$victima['victima_nombre_y_apellido']?><br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Tipo de Documento: </label>
             <?=$victima['tipodocumento']==  'NULL'? 'No Posee / Se Desconoce' : $victima['tipodocumento']== 1 ? 'D.N.I.' :$victima['tipodocumento']== 2 ? 'Documento Extranjero' : $victima['tipodocumento']== 3 ? 'Libreta Cívica' : $victima['tipodocumento']== 4 ? 'Libreta de Enrolamiento' : $victima['tipodocumento']== 5 ? 'Pasaporte' : $victima['tipodocumento']== 6 ? 'Residencia Precaria' : $victima['tipodocumento']== 7 ? 'Se Desconoce' : $victima['tipodocumento']== 7 ? 'Se Desconoce' : $victima['tipodocumento']== 8 ? 'No posee' : $victima['tipodocumento']== 9 ? 'Otro' : null ?><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Número de Documento: </label>
             
             <?=$victima['victima_numero_documento']?><br>
              <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Nacimiento: </label>
             
             <?=$victima['victima_fecha_nacimiento']?><br>
              <label class="font-weight-bold" style="text-decoration:underline;"> Caso: </label><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Cavaj: </label>
            
             

             <?=$caso['cavaj']==  1? 'Sede Central (La Plata)' : $caso['cavaj']==  2? 'Morón' : $caso['cavaj']==  3? 'Azul' : $caso['cavaj']==  4? 'Pergamino' : $caso['cavaj']==  5? 'Bahía Blanca' : $caso['cavaj']==  6? 'Pilar' :$caso['cavaj']==  7? 'Ezeiza' :$caso['cavaj']==  8? 'Pinamar' : $caso['cavaj']==  9? 'Lanús' : $caso['cavaj']==  10? 'Quilmes' : $caso['cavaj']==  11? 'Lomas de Zamora' : $caso['cavaj']==  12? 'San Fernando' : $caso['cavaj']==  13? 'Los Toldos' : $caso['cavaj']==  14? 'San Martín' : $caso['cavaj']==  15? 'Mar Del Plata' : $caso['cavaj']==  16? 'Tandil' : $caso['cavaj']==  17? 'Mercedes' : $caso['cavaj']==  18? 'Vicente López' : $caso['cavaj']==  19? 'Moreno' :$caso['cavaj']==  20? 'Zárate' : $caso['cavaj']==  21? 'José C. Paz' : $caso['cavaj']==  22? 'Almirante Brown' : $caso['cavaj']==  23? 'La Matanza' : null ?><br>

        

             <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Ingreso: </label>
        
             <?=$caso['fecha_ingreso']?><br>
            <p>___________________________________________________</p>
             @endif
             @endforeach
             @endforeach
   @endif
<br>

      <button type="submit" style="width: 20%">Enviar</button>
    </form>
  </div>
      </section>        
        
</section> 
    

          

   </header>


  <body>




        
  </body>
</html>

