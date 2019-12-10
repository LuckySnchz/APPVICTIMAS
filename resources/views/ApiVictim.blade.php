<?php

session_start();

$victimas='';
 $buscar = '';
  if ($_GET) {
 
    $buscar=$_GET['buscar'];
    $victimas=$_GET['victimas'];
  }


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
            
             @foreach ($datos as $dato)
             @if($victimas == $dato->victima_nombre_y_apellido)<br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Víctima: </label><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Nombre y Apellido: </label>
            
             {{$dato->victima_nombre_y_apellido}}<br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Tipo de Documento: </label>
                      
            @if($dato->tipodocumento ==1) D.N.I.
    @elseif($dato->tipodocumento ==2)Documento Extranjero
    @elseif($dato->tipodocumento ==3)Libreta Cívica
    @elseif($dato->tipodocumento ==4)Libreta de Enrolamiento
    @elseif($dato->tipodocumento ==5)Pasaporte
    @elseif($dato->tipodocumento ==6)Residencia Precaria
    @elseif($dato->tipodocumento ==7)Se Desconoce
    @elseif($dato->tipodocumento ==8)No posee
    @elseif($dato->tipodocumento ==9)Otro
    @endif<br>                    


              <label class="font-weight-bold" style="text-decoration:underline;"> Número de Documento: </label>
             
             {{$dato->victima_numero_documento}}<br>

               <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Nacimiento: </label>
             
             {{$dato->victima_fecha_nacimiento}}<br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Caso: </label><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Cavaj: </label>
              <br>
            @if($dato->cavaj ==1) Sede Central (La Plata)
    @elseif($dato->cavaj ==2)Morón
    @elseif($dato->cavaj ==3)Azul
    @elseif($dato->cavaj ==4)Pergamino
    @elseif($dato->cavaj ==5)Bahía Blanca
    @elseif($dato->cavaj ==6)Pilar
    @elseif($dato->cavaj ==7)Ezeiza
    @elseif($dato->cavaj ==8)Pinamar
    @elseif($dato->cavaj ==9)Lanús
    @elseif($dato->cavaj ==10)Quilmes
    @elseif($dato->cavaj ==11)Lomas de Zamora
    @elseif($dato->cavaj ==12)San Fernando
    @elseif($dato->cavaj ==13)Los Toldos
    @elseif($dato->cavaj ==14)San Martín
    @elseif($dato->cavaj ==15)Mar del Plata
    @elseif($dato->cavaj ==16)Tandil
    @elseif($dato->cavaj ==17)Mercedes
    @elseif($dato->cavaj ==18)Vicente López
    @elseif($dato->cavaj ==19)Moreno
    @elseif($dato->cavaj =20)Zárate
    @elseif($dato->cavaj ==21)José C.Paz
    @elseif($dato->cavaj ==22)Almirante Brown
    @elseif($dato->cavaj ==23)La Matanza
    @endif<br>   <br>

             <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Ingreso: </label>
             <br>
             {{$dato->fecha_ingreso}}<br>

            <p>__________________________________________________</p>
             @endif
             @endforeach
           
   @endif


   @if($buscar==2)
      
             @foreach ($datos as $dato)
             @if($victimas == $dato->victima_numero_documento)<br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Víctima: </label><br>
              <label class="font-weight-bold" style="text-decoration:underline;"> Nombre y Apellido: </label>
            
             {{$dato->victima_nombre_y_apellido}}<br>
             <label class="font-weight-bold" style="text-decoration:underline;"> Tipo de Documento: </label>
             
    @if($dato->tipodocumento ==1) D.N.I.
    @elseif($dato->tipodocumento ==2)Documento Extranjero
    @elseif($dato->tipodocumento ==3)Libreta Cívica
    @elseif($dato->tipodocumento ==4)Libreta de Enrolamiento
    @elseif($dato->tipodocumento ==5)Pasaporte
    @elseif($dato->tipodocumento ==6)Residencia Precaria
    @elseif($dato->tipodocumento ==7)Se Desconoce
    @elseif($dato->tipodocumento ==8)No posee
    @elseif($dato->tipodocumento ==9)Otro
    @endif
             <br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Número de Documento: </label>
             
             {{$dato->victima_numero_documento}}<br>
              <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Nacimiento: </label>
             
             {{$dato->victima_fecha_nacimiento}}<br>
              <label class="font-weight-bold" style="text-decoration:underline;"> Caso: </label><br>

              <label class="font-weight-bold" style="text-decoration:underline;"> Cavaj: </label>
            
             

         @if($dato->cavaj ==1) Sede Central (La Plata)
    @elseif($dato->cavaj ==2)Morón
    @elseif($dato->cavaj ==3)Azul
    @elseif($dato->cavaj ==4)Pergamino
    @elseif($dato->cavaj ==5)Bahía Blanca
    @elseif($dato->cavaj ==6)Pilar
    @elseif($dato->cavaj ==7)Ezeiza
    @elseif($dato->cavaj ==8)Pinamar
    @elseif($dato->cavaj ==9)Lanús
    @elseif($dato->cavaj ==10)Quilmes
    @elseif($dato->cavaj ==11)Lomas de Zamora
    @elseif($dato->cavaj ==12)San Fernando
    @elseif($dato->cavaj ==13)Los Toldos
    @elseif($dato->cavaj ==14)San Martín
    @elseif($dato->cavaj ==15)Mar del Plata
    @elseif($dato->cavaj ==16)Tandil
    @elseif($dato->cavaj ==17)Mercedes
    @elseif($dato->cavaj ==18)Vicente López
    @elseif($dato->cavaj ==19)Moreno
    @elseif($dato->cavaj =20)Zárate
    @elseif($dato->cavaj ==21)José C.Paz
    @elseif($dato->cavaj ==22)Almirante Brown
    @elseif($dato->cavaj ==23)La Matanza
    @endif<br>   <br>

        

             <label class="font-weight-bold" style="text-decoration:underline;"> Fecha de Ingreso: </label>
        
             {{$dato->fecha_ingreso}}<br>
            <p>___________________________________________________</p>
             @endif
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

