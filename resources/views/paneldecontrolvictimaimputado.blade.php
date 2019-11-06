<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="/css/styles.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <title>App Víctimas</title>
      <style>
   .btn{margin-left: -3%}
  
      </style>
       <a name="Ancla" id="Ancla"></a>
   </head>
  <header>
      <section class="container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 150px" >
     @include('navbar')

                <a type="button"  href="/home" target="_self" style="width:100%; color:white;background-color:rgb(52, 144, 220);margin-bottom: -5%;margin-top: -12%;margin-left: 0.1%" class="btn col-XL" class="btn btn-danger">IR A INICIO</button> </a><br><br>
      </section>        
  
         <section class="container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 120px" >
    
<br><br>
              <strong> <a type="button"  href="/paneldecontrolcaso/{{$caso->id}}" target="_self" style="width:100%; color:white;background-color:rgb(137, 210, 14);margin-bottom: -5%;margin-top: -8%;margin-left: 0.1%;color: black" class="btn col-XL" class="btn btn-danger">IR A CASO</button> </a></strong>
              <br><br>

                
      </section> 

   </header>








   <body>

  <a href="#Ancla"><img src="{{ URL::to('/assets/img/ancla.png') }}" style="margin-left: 74%;margin-top: 18%;position: fixed;z-index: 100"></a>



<section class="container jumbotron shadow p-3 mb-5 bg-white rounded">



         


 

<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="max-width: 80%;margin-top: 5%;text-align: center">
  <strong><h4 class="text-center" style="height: 1%;color:white;background-color: black;
        max-width: 100%">VICTIMA/S</h4></strong><br>


        <strong><h4 class="text-center" style="height: 1%;color:white;background-color: black;
        max-width: 100%">Editar o Agregar Víctima/s</h4></strong><br>



<div class="container jumbotron shadow p-3 mb-5 bg-green rounded " style="max-width: 60%;margin-top: 1%;">

 
<p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 

      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong> 
         
         </p>
          

<p style="text-align: center"><strong><span style="text-decoration: underline"> Víctima Seleccionada: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong><br>
                   <strong style="text-align: center;color:red">Edad:{{$victima->victima_edad}}</strong><br>
 <strong style="text-align: center;color:red">Delito:{{$delitoActual->nombre}}</strong><br>
  <strong style="text-align: center;color:red">Genero:</strong><br>
 @if($victima->genero == 1) Mujer Cis
    @elseif ($victima->genero == 2) Mujer Trans
    @elseif ($victima->genero == 3) Varon Cis
    @elseif ($victima->genero == 4) Varon Trans
    @elseif ($victima->genero == 5) Otro
    @endif
            
             @endif
           @endforeach</p>

</div>
<p style="text-align: center"><strong><span style="text-decoration: underline"> Agregar una Víctima: </span><strong><br><br>

          <a type="button"  href="/detalleagregarVictima" target="_self" style="width:93%;
  color:black;border: solid black 1px;background-color:grey;margin-left: 3%" class="btn btn-danger"></button> Agregar una Víctima</a><br><br>



<h4 class="text-center" style="padding: 15px; text-decoration: underline;">Selecciona una Víctima</h4>
          <ul  style="list-style:none">
            @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso"))
                   <li>
          

  <a type="button"  onclick="mostrarvictima();" href="/victimaagregarintervenciontres/{{$victima->id}}/{{$victima->idCaso}}" target="_self" style="width:102%;
  color:black;border: solid black 1px;background-color:grey;margin-left: -3%" class="btn btn-danger">{{$victima->victima_nombre_y_apellido}}</button> </a><br><br>  
    
          
       
                     </li>


               @endif
                 @endforeach

               </ul>





           </div>


 
         


  <a name="Ancla" id="v4"></a>
  @foreach($victimas as $victima)
  @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))

<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="max-width: 80%;margin-top: 5%;text-align: center"><br><br><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach
<br><br>
        <strong><h4 class="text-center" style="height: 1%;margin-bottom:-5%;color:white;background-color: black;max-width: 100%">Datos del imputado</h4></strong><br><br><br>
   


<ul style="list-style:none">
<a type="button" href="/detalleagregarimputado" target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:grey;" class="btn btn-danger">Agregar</button> </a><br><br>



   


  @foreach($imputados_nuevos as $imputado_nuevo)
@if($imputado_nuevo->idVictim==session("idVictim"))

 <li>
          @foreach($imputados as $imputado)
          @if($imputado->id==$imputado_nuevo->idImputado)
                  {{$imputado->nombre_y_apellido}}

<br>

<a type="button" href="/detalleimputado/{{$imputado->id}}" target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:#ffffcc;" class="btn btn-danger">Editar</button> </a><br><br>


<a type="button" onclick="return confirm('Deseas eliminar a {{$imputado->nombre_y_apellido}}?')" href="/eliminarimputado/{{$imputado->id}}" target="_self" style="width:100%;
  color:black;border: solid black 1px" class="btn btn-danger">Eliminar</button> </a><br><br>






                  @endif
                  @endforeach
                 

          </li>
                @endif

            @endforeach
</ul>




    </div>

  @endif
          @endforeach
           </div>

</section>
  
  

   </body>
</html>
