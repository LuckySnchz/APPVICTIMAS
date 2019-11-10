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
      <section class=" container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 250px" >
     @include('navbar')
<br>
                <a type="button"  href="/home" target="_self" style="width:100%; color:white;background-color:rgb(52, 144, 220);margin-bottom: -5%;margin-top: -12%;margin-left: 0.1%" class="btn col-XL" class="btn btn-danger">IR A INICIO</button> </a><br>
                 <a type="button"  href="/paneldecontrolcaso/{{session("idCaso")}}" target="_self" style="width:100%; color:white;background-color:rgb(137, 210, 14);margin-bottom: -5%;margin-top: -8%;margin-left: 0.1%;color: black" class="btn col-XL" class="btn btn-danger">IR A CASO</button> </a><br><br><br>
      </section>        
        
       <section class="container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 600px" >
    

           <h4 class="text-center" style="height: 8%;margin-bottom:2%;padding-top: 1%;padding-bottom: 1%;color:white;background-color:rgb(137, 210, 14);">EDITAR VICTIMA</h4><br>


<p style="text-align: center"><strong><span style="text-decoration: underline;font-size: 1.3em">  Deseas  Agregar una Víctima: </span><strong><br><br>

          <a type="button"  href="/detalleagregarVictima" target="_self" style="width:100%;
  color:black;border: solid black 1px;background-color:grey;margin-left: 0.1%" class="btn btn-danger"></button>Agregar una Víctima</a><br><br>


           <h4 class="text-center" style="height:12%;margin-bottom:2%;padding-top: 1%;padding-bottom: 1%;color:white;background-color:rgb(137, 210, 14);border-radius: 2%">SELECCIONA UNA VICTIMA:
            @foreach($victimas as $victima)
            @if($victima->id==session("idVictim")&& $victima->idCaso==session("idCaso"))
            <br>{{session("victimNombre")}}</h4><br>
      
              @endif
              @endforeach
          <ul style="padding: 15px;text-align: center;color: red;margin-top: 3%;margin-bottom: 5%">
            @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso"))
                   <li >
          

  <a style="padding: 15px;text-align: center;color: red" onclick="mostrar()" href="/victimaagregarintervenciontres/{{$victima->id}}/{{$victima->idCaso}}">{{$victima->victima_nombre_y_apellido}}</a> 
    
              
                     </li>


               @endif
                 @endforeach

               </ul>
           </div>
          

           <!-- <div class="alert alert-danger">
         
            <p>SELECCIONA UNA VICTIMA</p>

             </div>-->
        
     @foreach($victimas as $victima)
            @if($victima->idCaso==session("idCaso") && $victima->id==session("idVictim"))

 <a name="Ancla" id="panelvictima"></a>
           
<div id="panel">
                   <a type="button"  href="/paneldecontrolvictimavictima/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top: -5%;margin-left: 0.1%;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">
LA VICTIMA Y SU CONTEXTO:</button> </a><br>

<a type="button"  href="/paneldecontrolvictimapersona/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top:1%;margin-left: 0.1%;color: black;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">PERSONAS ASISTIDAS</button> </a><br>



   <a type="button"  href="/paneldecontrolvictimareferente/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top: 3%;margin-left: 0.1%;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">
REFERENTES AFECTIVOS</button> </a><br>


<a type="button"  href="/paneldecontrolvictimaimputado/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top: 3%;margin-left: 0.1%;color: black;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">DATOS DEL IMPUTADO</button> </a><br>
</div>
@else

<div id="panel" style="display: none">
                   <a type="button"  href="/paneldecontrolvictimavictima/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top: -5%;margin-left: 0.1%;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">
LA VICTIMA Y SU CONTEXTO:</button> </a><br>

<a type="button"  href="/paneldecontrolvictimapersona/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top:1%;margin-left: 0.1%;color: black;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">PERSONAS ASISTIDAS</button> </a><br>



   <a type="button"  href="/paneldecontrolvictimareferente/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top: 3%;margin-left: 0.1%;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">
REFERENTES AFECTIVOS</button> </a><br>


<a type="button"  href="/paneldecontrolvictimaimputado/{{session("idCaso")}}" target="_self" style="width:100%; color:black;background-color:rgb(52, 144, 220);margin-bottom: -2%;margin-top: 3%;margin-left: 0.1%;color: black;height: 8%;padding-top: 1%" class="btn col-XL" class="btn btn-danger">DATOS DEL IMPUTADO</button> </a><br>
</div>
@endif
@endforeach
      </section> 

   </header>




 






   <body>





 




   </body>
</html>
