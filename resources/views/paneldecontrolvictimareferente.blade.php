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






 <a name="Ancla" id="v3"></a>
 @foreach($victimas as $victima)
 @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="max-width: 80%;margin-top: 5%;text-align: center">
  <br><br><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach
<br><br>
        <strong><h4 class="text-center" style="height: 1%;margin-bottom:-5%;color:white;background-color: black;max-width: 100%"> Referentes Afectivos</h4></strong><br><br><br>
     
<ul style="list-style:none">
          <a type="button" href="/detalleagregarconviviente" target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:grey;" class="btn btn-danger">Agregar</button> </a><br><br>


      

  
  @foreach($convivientes_nuevos as $conviviente_nuevo)
@if($conviviente_nuevo->idVictim==session("idVictim"))

 <li>
          @foreach($convivientes as $conviviente)
          @if($conviviente->id==$conviviente_nuevo->idConviviente)
                  {{$conviviente->nombre_y_apellido}}

<br>


         <a type="button" href="/detalleconviviente/{{$conviviente->id}}" target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:#ffffcc;" class="btn btn-danger">Editar</button> </a><br><br>
     

         <a type="button" onclick="return confirm('Deseas eliminar a {{$conviviente->nombre_y_apellido}}?')" href="/eliminarconviviente/{{$conviviente->id}}" target="_self" style="width:100%;color:black;border: solid black 1px;" class="btn btn-danger">Eliminar</button> </a><br><br>


                 

                  
                  @endif
                  @endforeach

          </li>
                @endif

            @endforeach
</ul>

  @endif
          @endforeach
           </div>




 
         


  

</section>
  
  

   </body>
</html>
