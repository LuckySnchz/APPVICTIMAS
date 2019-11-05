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
      <section class=" container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 150px" >
     @include('navbar')

                <a type="button"  href="/home" target="_self" style="width:100%; color:white;background-color:rgb(52, 144, 220);margin-bottom: -5%;margin-top: -12%;margin-left: 0.1%" class="btn col-XL" class="btn btn-danger">IR A INICIO</button> </a><br><br>
      </section>        
      
       <section class="container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 120px" >
    
<br><br>
                <a type="button"  href="/paneldecontrolvictima/{{$caso->id}}" target="_self" style="width:100%; color:white;background-color:rgb(137, 210, 14);margin-bottom: -5%;margin-top: -8%;margin-left: 0.1%;color: black" class="btn col-XL" class="btn btn-danger">IR A VICTIMA</button> </a><br><br>

      </section> 

   </header>








   <body>





 <div class="container" style="max-width: 86.5%">

  <a href="#Ancla"><img src="{{ URL::to('/assets/img/ancla.png') }}" style="margin-left: 74%;margin-top: 18%;position: fixed;z-index: 100"></a>

         


 

   <br><br>

  <a name="Ancla" id="c1"></a>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="max-width: 80%;margin-top: -8%">
<br><br>





<a name="Ancla" id="c2"></a>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="max-width: 80%;margin-top: 5%;text-align: center;%">

 <strong><h4 class="text-center" style="height: 1%;color:white;background-color: black;
        max-width: 100%">Profesional interviniente</h4></strong><br>
   


    <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"><br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>


<ul>
  <a type="button" href="/detalleagregarProfesional"target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:grey;" class="btn btn-danger">Agregar</button> </a><br><br> 



       
         @foreach($profesionales as $profesional)  


 @if($profesional->idCaso==session("idCaso"))
                <li >

@if($profesional->nombre_profesional_interviniente==0)

{{$profesional->nombre_profesional_interviniente_otro}}
@endif
               @foreach ($usuarios as $usuario)
            
              @if($usuario->id==$profesional->nombre_profesional_interviniente)
                            <strong style="text-align: center">{{$usuario->nombre_y_apellido}}</strong><br>
              
   
             @endif
            @endforeach
            

   <a type="button"  href="/detalleProfesional/{{$profesional->id}} target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:#ffffcc;" class="btn btn-danger">Editar</button> </a><br><br> 


 <a type="button" onclick="return confirm('Deseas eliminar a este Profesional?')"  href="/detalleProfesional/deleteProfesional/{{$profesional->id}}" target="_self" style="width:100%;
  color:black;border: solid black 1px;" class="btn btn-danger">Eliminar</button> </a><br><br>





             </li>


       @endif

         @endforeach

       </ul>

</div>


</div>








   </body>
</html>
