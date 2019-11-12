@extends('layouts.app')

@section('content')
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
  @endif
  <!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>APP VICTIMAS</title>
      <style>
      </style>
   </head>
  <header>

<h2 style="text-align: center">Bienvenido/a {{Auth::user()->getName()}}</h2>
<br>
<h4 style="text-align: center"> Agregar Casos, Incidencias o Derivaciones</h4>
<br>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


          
 @if(Auth::user()->getId()==111)
   <div class="list-group">
     <a href="agregarCaso" target="_self" class="list-group-item list-group-item-action flex-column align-items-start active">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">CASOS</h5>
         </div>
       <p class="mb-2">Agregar casos nuevos a la base de datos</p>
       </a>
     <a href="agregardemanda" target="_self" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">INCIDENCIAS</h5>
       </div>
       <p class="mb-2"></p>
     </a>

     <a href="agregarderivacion" target="_self" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">DERIVACION</h5>
       </div>
       <p class="mb-2"></p>
     </a>


       <a href="/excel" target="_self" class="list-group-item list-group-item-action flex-column align-items-start active"style="background-color:rgb(137, 210, 14)">
       <div class="d-flex w-100 justify-content-between" >
         <h5 class="mb-2 h5">ESTADISTICA</h5>
       </div>
       <p class="mb-2"></p>
     </a>
   </div>


 @else
   <div class="list-group">
     <a href="agregarCaso" target="_self" class="list-group-item list-group-item-action flex-column align-items-start active">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">CASOS</h5>
         </div>
       <p class="mb-2">Agregar casos nuevos a la base de datos</p>
       </a>

     <a href="agregardemanda" target="_self" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">INCIDENCIAS</h5>
       </div>
       <p class="mb-2">Agregar incidencias a la base de datos</p>
       <p class="mb-2"></p>
     </a>

     <a href="agregarderivacion" target="_self" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">DERIVACION</h5>
       </div>
       <p class="mb-2">Agregar derivaciones de casos a la base de datos</p>
       <p class="mb-2"></p>
     </a>
   </div>

@endif


</div>


<section class="container jumbotron shadow p-3 mb-5 bg-white rounded" >
<div class="form-group"  >



<br><br>
<div style="margin-left: 11%">
  {!! $errors->first('buscar', '<p class="help-block" style="color:red"  ;>:message</p>') !!}</div>
   
<form action="/search" method="GET">
 {{csrf_field()}}
<div class="buscar" id="buscar" style="margin-left: 11%;margin-top: -1%"{{ $errors->has('buscar') ? 'has-error' : '' }}>



  @if (old("buscar")==1)
            
  <input type="radio" name="buscar"  value="1" checked><strong> Casos</strong>
            @else 
  <input type="radio" name="buscar"  value="1"><strong> Casos</strong>
            @endif
@if (old("buscar")==2)

  <input type="radio" name="buscar"  value="2" checked ><strong> Incidencias</strong>
            @else 
  <input type="radio" name="buscar"  value="2"><strong> Incidencias</strong>
            @endif
@if (old("buscar")==3)
              <input type="radio" name="buscar"  value="3" checked ><strong> Dericaciones</strong>
            @else 
  <input type="radio" name="buscar"  value="3"><strong> Derivaciones</strong>
            @endif
@if (old("buscar")==4)
              <input type="radio" name="buscar"  value="4" checked ><strong>BUSQUEDA GENERAL</strong>
            @else 
  <input type="radio" name="buscar"  value="4"><strong>BUSQUEDA GENERAL</strong>
            @endif
@if (old("buscar")==5)
            <input type="radio" name="buscar"  value="5" checked ><strong>Mis Cargas</strong>
            @else 
  <input type="radio" name="buscar"  value="5"><strong>Mis Cargas</strong>
            @endif  


</div>
<br>
<div class="search" id="search" style="margin-left: 5%;margin-top: 1%"{{ $errors->has('search') ? 'has-error' : ''}}>
 <input type="text" value="{{old("search")}}" name="search" id="search"style="margin-left: 5%;width: 60%;">
 <button type="submit" class="btn"  style="color:white;background-color:rgb(137, 210, 14)">BUSCAR</button><br><br>
 <h5 style="margin-left: 5%"><strong>Buscar por Nombre de Referencia, por Nombre de la víctima o por modalidad de ingreso</strong></h5>
 
</div>
<div style="margin-left: 11%">

   {!! $errors->first('search', '<p class="help-block" style="color:red";>:message</p>') !!}</div>
</form>
<div class="form-group" id="buscador">
<section class="my-5" style="margin-left: 6%">


<ul style="list-style: none">





 @foreach ($casos as $caso)

<li>
    @if($buscar==5 && $caso->activo==1)
  


 <div class="card-header border-0 font-weight-bold d-flex justify-content-between"><p class="mr-4 mb-0"> <strong style="color:red">{{$countcasos=$countcasos+1}}.- </strong><strong><span style="text-decoration: underline">Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p></div>
     <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrolcaso/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>

      <li class="list-inline-item"><a href='/agregarnuevaIntervencionvictima/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
   
    <div class="row media mt-2 px-1">
      <div class="col-6">

<label class="font-weight-bold" style="text-decoration: underline;">Cavaj: </label>
     @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif
                    @endforeach
                    <br>
    <label class="font-weight-bold" style="text-decoration: underline;">Delito: </label>                
                     @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
             <p>_______________________________________________________</p> 
          @endif                    
        @endforeach
      </div>

      <div class="col-6">
            <label class="font-weight-bold" style="text-decoration: underline;">Fecha de Ingreso: </label>  
             {{date("d/m/y",strtotime($caso->fecha_ingreso))}}
             <br>
   <label class="font-weight-bold" style="text-decoration: underline;">Estado:</label>  
          @if($caso->estado == 1) Activo @else Pasivo @endif
      </div>
  </li>


         <label class="font-weight-bold" style="text-decoration: underline;">Victima/s:</label>
          @foreach ($victimas as $victima)
          @if ($victima->idCaso == session("idCaso"))
          <div>
         <label class="font-weight-bold">Nombre y apellido: </label>
        {{$victima->victima_nombre_y_apellido}}
         </div>
  <div style="display:none">
    <label class="font-weight-bold" style="display:none">Tiene documentación que acredite su identidad: </label>
    @if($victima->tienedoc == 1) Posee
    @elseif($victima->tienedoc == 3) No posee
    @elseif($victima->tienedoc == 5) En tramite
    @elseif($victima->tienedoc == 6) Se desconoce
    @endif
    </div>

    @if($victima->tienedoc == 3 || $victima->tienedoc == 6)
    <div style="display:none">
    @else <div style="display:block">
    @endif
    <label class="font-weight-bold" style="text-decoration: underline;">Tipo de documento: </label>
    @if($victima->tipodocumento ==1) D.N.I.
    @elseif($victima->tipodocumento ==2)Documento Extranjero
    @elseif($victima->tipodocumento ==3)Libreta Cívica
    @elseif($victima->tipodocumento ==4)Libreta de Enrolamiento
    @elseif($victima->tipodocumento ==5)Pasaporte
    @elseif($victima->tipodocumento ==6)Residencia Precaria
    @elseif($victima->tipodocumento ==7)Se Desconoce
    @elseif($victima->tipodocumento ==8)No posee
    @elseif($victima->tipodocumento ==9)Otro
    @endif
    </div>

   

    @if($victima->tienedoc == 3 || $victima->tienedoc == 6)
    <div style="display:none">
    @else<div style="display:block">
    @endif
    <label class="font-weight-bold" style="text-decoration: underline;">Nro de documento: </label>
    {{$victima->victima_numero_documento}}
    </div>


           <div>
    <label class="font-weight-bold" style="text-decoration: underline;">Localidad Victima: </label>
    @foreach($ciudades as $ciudad)
    @if($ciudad->idPcia==1 && $ciudad->id==$victima->localidad_hecho)
    {{$ciudad->localidad_nombre}}
    @endif
    @endforeach
    </div>

   <p>_______________________________________________________</p>        
      @endif
        @endforeach
      

@endif
   
@endforeach





@foreach ($demandas as $demanda)
    <li>
 @if($buscar==5)
        
        <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
         <p class="mr-4 mb-0"> <strong style="color:red">{{$countdemandas=$countdemandas+1}}.- </strong><strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
       <li class="list-inline-item"><a href='/informedemanda/{{$demanda->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>

      <li class="list-inline-item"><a href="javascript:AlertDemandaaCaso();" class="mr-3"><i class="fas fa-user mr-1"></i>Pasar a Caso</a></li>
       <script type="text/javascript">
       function AlertDemandaaCaso() {
       var answer = confirm ("¿Esta seguro que desea eliminar la incidencia y crear el caso?")
       if (answer)
       window.location="/demandaCaso/{{$demanda->id}}";
       }
       </script>
       
       <li class="list-inline-item"><a href="javascript:AlertDemanda();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
       <script type="text/javascript">
       function AlertDemanda() {
       var answer = confirm ("¿Está seguro que desea eliminar la incidencia seleccionada?")
       if (answer)
       window.location="/informedemanda/deletedemanda/{{$demanda->id}}";
       }
       </script>

       </ul>
       </div>
       <div class="row media mt-2 px-1">
         <div class="col-6">
           <p>Delito: @foreach ($delitos as $delito)
             @if ($delito->id == $demanda->delito)
               {{$delito->nombre}}
             @endif
           @endforeach</p>
           </div>
           <div class="col-6">
           <p>Fecha de ingreso: {{date("d/m/y",strtotime($demanda->fecha_ingreso))}}</p>
           </div>

     </div>
     @endif
   @endforeach


@foreach ($derivaciones as $derivacion)
    <li>
 @if($buscar==5)


<div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"> <strong style="color:red">{{$countderivaciones=$countderivaciones+1}}.- </strong><strong><span style="text-decoration: underline">  Derivación: </span><strong>{{$derivacion->nombre_y_apellido}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">



        <li class="list-inline-item"><a href='/informederivacion/{{$derivacion->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
        <li class="list-inline-item"><a href='/agregarseguimiento/{{$derivacion->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar seguimiento</a></li>
        <li class="list-inline-item"><a href="javascript:AlertIt();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
        





        <script type="text/javascript">
        function AlertIt() {
        var answer = confirm ("¿Está seguro que desea eliminar la derivación seleccionada?")
        if (answer)
        window.location="/informederivacion/deletederivacion/{{$derivacion->id}}";
        }
        </script>
      </ul>
      </div>
       <div class="row media mt-2 px-1">
         <div class="col-6">
          <p>Tipo de demanda: @foreach ($tipo_demandas as $demanda)
            @if ($demanda->id == $derivacion->tipo_demanda)
              {{$demanda->nombre}}
            @endif
          @endforeach</p>
          <p>Organismo al que se deriva: @foreach ($oderivados as $derivado)
            @if ($derivado->id == $derivacion->derivacion)
              {{$derivado->nombre}}
            @endif
          @endforeach</p>
          </div>

          <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($derivacion->fecha_ingreso))}}</p>
          <p>Estado: @if ($derivacion->estado_derivacion==1) Resuelta
          @elseif ($derivacion->estado_derivacion==2) En proceso
          @else Imposibilidad de contacto</p>
            @endif
          </div>
        </div>


@endif
@endforeach


 @foreach ($casos as $caso)

<li>
    @if($buscar==4 && $caso->activo==1)
     <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
    
   
    <div class="row media mt-2 px-1">
      <div class="col-6">
           <label class="font-weight-bold" style="text-decoration: underline;">Victima/s:</label>
          @foreach ($victimas as $victima)
          @if ($victima->idCaso == session("idCaso"))
          <div>
         <label class="font-weight-bold">Nombre y apellido: </label>
        {{$victima->victima_nombre_y_apellido}}
         </div>
         @endif
        @endforeach
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif
         @endforeach</p>

           <p>Delito: @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
          @endif                    
        @endforeach</p>
      </div>
      <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
          <p>Estado: @if($caso->estado == 1) Activo @else Pasivo @endif</p>
      </div>
  </li>

@endif
@endforeach

 
 @foreach ($demandas as $demanda)
    <li>
 @if($buscar==4)
       
    <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     
     </li> 

   

       <div class="row media mt-2 px-1">
         <div class="col-6">
           <p>Delito: @foreach ($delitos as $delito)
             @if ($delito->id == $demanda->delito)
               {{$delito->nombre}}
             @endif
           @endforeach</p>
           </div>
           <div class="col-6">
           <p>Fecha de ingreso: {{date("d/m/y",strtotime($demanda->fecha_ingreso))}}</p>
           </div>

     </div>
 @endif
   @endforeach

@foreach ($derivaciones as $derivacion)
     <li>     
       @if($buscar==4)
      <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Derivación: </span>{{$derivacion->nombre_y_apellido}}</strong></p>
     
      </li>
   

      <div class="row media mt-2 px-1">
          <div class="col-6">
          <p>Tipo de demanda: @foreach ($tipo_demandas as $demanda)
            @if ($demanda->id == $derivacion->tipo_demanda)
              {{$demanda->nombre}}
            @endif
          @endforeach</p>
          <p>Organismo al que se deriva: @foreach ($oderivados as $derivado)
            @if ($derivado->id == $derivacion->derivacion)
              {{$derivado->nombre}}
            @endif
          @endforeach</p>
          </div>
          <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($derivacion->fecha_ingreso))}}</p>
          <p>Estado: @if ($derivacion->estado_derivacion==1) Resuelta
          @elseif ($derivacion->estado_derivacion==2) En proceso
          @else Imposibilidad de contacto</p>
            @endif
          </div>
      </div>
@endif

    @endforeach
@if($buscar==1||$buscar==2||$buscar==3)
 @foreach ($casos as $caso)

 <li>
    @if((Auth::user()->hasRole('user'))&&(Auth::user()->id==$caso->userID_create))
     <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrolcaso/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
   
      <li class="list-inline-item"><a href='/agregarnuevaintervencionvictima/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
   
    <div class="row media mt-2 px-1">
      <div class="col-6">
          <label class="font-weight-bold" style="text-decoration: underline;">Victima/s:</label>
          @foreach ($victimas as $victima)
          @if ($victima->idCaso == session("idCaso"))
          <div>
         <label class="font-weight-bold">Nombre y apellido: </label>
        {{$victima->victima_nombre_y_apellido}}
         </div>
         @endif
        @endforeach
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif                   
           @endforeach</p>
             <p>Delito: @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
          @endif                    
        @endforeach</p>
      </div>
      <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
          <p>Estado: @if($caso->estado == 1) Activo @else Pasivo @endif</p>
      </div>
  </li>
@endif
<!--@if((Auth::user()->hasRole('user'))&&(Auth::user()->id!==$caso->userID_create))
      <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
      <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
    <!--<ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrolcaso/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-i}line-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
      <li class="list-inline-item"><a href='/agregarnuevaintervencion/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
    </div>
    <div class="row media mt-2 px-1">
      <div class="col-6">
          <p>Victima: {{$caso->nombre_y_apellido_de_la_victima}}</p>
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}} @endif
                    @endforeach</p>
                      <p>Delito: @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
          @endif                    
        @endforeach</p>
        </div>
        <div class="col-6">
        <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
        <p>Estado: @if($caso->estado == 1) Activo
        @else Pasivo
        @endif</p>
      </div>
    </div>
  @endif-->
  @endforeach




 @foreach ($casos as $caso)
@if(Auth::user()->hasRole('profesional') && $caso->activo==1)
<li>
   @foreach ($profesionales as $profesional) 

   @if(($profesional->idCaso==$caso->id&&$profesional->userID_create==NULL&& $profesional->nombre_profesional_interviniente==$user->getId()))<!--EL QUE YO CREE-->

  



    
     <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrolcaso/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
  
      <li class="list-inline-item"><a href='/agregarnuevaintervencionvictima/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
   
    <div class="row media mt-2 px-1">
      <div class="col-6">
           <label class="font-weight-bold" style="text-decoration: underline;">Victima/s:</label>
          @foreach ($victimas as $victima)
          @if ($victima->idCaso == session("idCaso"))
          <div>
         <label class="font-weight-bold">Nombre y apellido: </label>
        {{$victima->victima_nombre_y_apellido}}
         </div>
         @endif
        @endforeach
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif
                    @endforeach</p>
                      <p>Delito: @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
          @endif                    
        @endforeach</p>
      </div>
      <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
          <p>Estado: @if($caso->estado == 1) Activo @else Pasivo @endif</p>
      </div>
  </li>

@endif

@endforeach
@endif
@endforeach


@foreach ($casos as $caso)
@if(Auth::user()->hasRole('profesional') && $caso->activo==1)
 

<li>
   @foreach ($profesionales as $profesional) 




  


    @if(($profesional->idCaso==$caso->id &&$profesional->userID_create!==NULL&& $profesional->nombre_profesional_interviniente==$user->getId()))<!--ME PARTICIPARON-->


    
     <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrolcaso/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
   
      <li class="list-inline-item"><a href='/agregarnuevaintervencionvictima/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
   
    <div class="row media mt-2 px-1">
      <div class="col-6">
          <label class="font-weight-bold" style="text-decoration: underline;">Victima/s:</label>
          @foreach ($victimas as $victima)
          @if ($victima->idCaso == session("idCaso"))
          <div>
         <label class="font-weight-bold">Nombre y apellido: </label>
        {{$victima->victima_nombre_y_apellido}}
         </div>
         @endif
        @endforeach
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif
                    @endforeach</p>
                      <p>Delito: @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
          @endif                    
        @endforeach</p>
      </div>
      <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
          <p>Estado: @if($caso->estado == 1) Activo @else Pasivo @endif</p>
      </div>
  </li>
@endif

@endforeach
@endif
@endforeach


<!--BUSQUEDA GENERAL-->

 @foreach ($casos as $caso)

<li>
    @if(Auth::user()->hasRole('admin'))
     <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrolcaso/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>

      <li class="list-inline-item"><a href='/agregarnuevaintervencionvictima/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
   
    <div class="row media mt-2 px-1">
      <div class="col-6">
            <label class="font-weight-bold" style="text-decoration: underline;">Victima/s:</label>
          @foreach ($victimas as $victima)
          @if ($victima->idCaso == session("idCaso"))
          <div>
         <label class="font-weight-bold">Nombre y apellido: </label>
        {{$victima->victima_nombre_y_apellido}}
         </div>
         @endif
        @endforeach
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif
                    @endforeach</p>
                      <p>Delito: @foreach ($delitos as $delito)
          @if ($delito->id == $caso->delito){{$delito->nombre}}
          @endif                    
        @endforeach</p>
      </div>
      <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
          <p>Estado: @if($caso->estado == 1) Activo @else Pasivo @endif</p>
      </div>
  </li>

@endif

@endforeach

  @foreach ($demandas as $demanda)
    <!--<li>
@if((Auth::user()->hasRole('user'))&&(Auth::user()->id!==$demanda->userID_create)||(Auth::user()->hasRole('profesional'))&&(Auth::user()->id!==$demanda->userID_create))       
<div class="card-header border-0 font-weight-bold d-flex justify-content-between">
    <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     <li class="list-inline-item"><a href='/informedemanda/{{$demanda->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
     </li>
     @endif-->
  @if((Auth::user()->hasRole('user'))&&(Auth::user()->id==$demanda->userID_create)||(Auth::user()->hasRole('profesional'))&&(Auth::user()->id==$demanda->userID_create)) 
       <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
       <li class="list-inline-item"><a href='/informedemanda/{{$demanda->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>

      <li class="list-inline-item"><a href="javascript:AlertDemandaaCaso();" class="mr-3"><i class="fas fa-user mr-1"></i>Pasar a Caso</a></li>
       <script type="text/javascript">
       function AlertDemandaaCaso() {
       var answer = confirm ("¿Esta seguro que desea eliminar la incidencia y crear el caso?")
       if (answer)
       window.location="/demandaCaso/{{$demanda->id}}";
       }
       </script>
       
       <li class="list-inline-item"><a href="javascript:AlertDemanda();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
       <script type="text/javascript">
       function AlertDemanda() {
       var answer = confirm ("¿Está seguro que desea eliminar la incidencia seleccionada?")
       if (answer)
       window.location="/informedemanda/deletedemanda/{{$demanda->id}}";
       }
       </script>

       </ul>
       </div>
       <div class="row media mt-2 px-1">
         <div class="col-6">
           <p>Delito: @foreach ($delitos as $delito)
             @if ($delito->id == $demanda->delito)
               {{$delito->nombre}}
             @endif
           @endforeach</p>
           </div>
           <div class="col-6">
           <p>Fecha de ingreso: {{date("d/m/y",strtotime($demanda->fecha_ingreso))}}</p>
           </div>

     </div>
   @endif
  


@if(Auth::user()->hasRole('admin'))

<div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
       <li class="list-inline-item"><a href='/informedemanda/{{$demanda->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>

      <li class="list-inline-item"><a href="javascript:AlertDemandaaCaso();" class="mr-3"><i class="fas fa-user mr-1"></i>Pasar a Caso</a></li>
       <script type="text/javascript">
       function AlertDemandaaCaso() {
       var answer = confirm ("¿Esta seguro que desea eliminar la incidencia y crear el caso?")
       if (answer)
       window.location="/demandaCaso/{{$demanda->id}}";
       }
       </script>
       
       <li class="list-inline-item"><a href="javascript:AlertDemanda();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
       <script type="text/javascript">
       function AlertDemanda() {
       var answer = confirm ("¿Está seguro que desea eliminar la incidencia seleccionada?")
       if (answer)
       window.location="/informedemanda/deletedemanda/{{$demanda->id}}";
       }
       </script>

       </ul>
       </div>
       <div class="row media mt-2 px-1">
         <div class="col-6">
           <p>Delito: @foreach ($delitos as $delito)
             @if ($delito->id == $demanda->delito)
               {{$delito->nombre}}
             @endif
           @endforeach</p>
           </div>
           <div class="col-6">
           <p>Fecha de ingreso: {{date("d/m/y",strtotime($demanda->fecha_ingreso))}}</p>
           </div>

     </div>
   @endif
   @endforeach

 @foreach ($derivaciones as $derivacion)
  
         @if((Auth::user()->hasRole('user'))&&(Auth::user()->id==$derivacion->userID_create)||(Auth::user()->hasRole('profesional'))&&(Auth::user()->id==$derivacion->userID_create)) 


<div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline;"> Derivación: </span><strong>{{$derivacion->nombre_y_apellido}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">



        <li class="list-inline-item"><a href='/informederivacion/{{$derivacion->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
        <li class="list-inline-item"><a href='/agregarseguimiento/{{$derivacion->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar seguimiento</a></li>
        <li class="list-inline-item"><a href="javascript:AlertIt();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
        





        <script type="text/javascript">
        function AlertIt() {
        var answer = confirm ("¿Está seguro que desea eliminar la derivación seleccionada?")
        if (answer)
        window.location="/informederivacion/deletederivacion/{{$derivacion->id}}";
        }
        </script>
      </ul>
      </div>
       <div class="row media mt-2 px-1">
         <div class="col-6">
          <p>Tipo de demanda: @foreach ($tipo_demandas as $demanda)
            @if ($demanda->id == $derivacion->tipo_demanda)
              {{$demanda->nombre}}
            @endif
          @endforeach</p>
          <p>Organismo al que se deriva: @foreach ($oderivados as $derivado)
            @if ($derivado->id == $derivacion->derivacion)
              {{$derivado->nombre}}
            @endif
          @endforeach</p>
          </div>

          <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($derivacion->fecha_ingreso))}}</p>
          <p>Estado: @if ($derivacion->estado_derivacion==1) Resuelta
          @elseif ($derivacion->estado_derivacion==2) En proceso
          @else Imposibilidad de contacto</p>
            @endif
          </div>
        </div>
          @endif

          @if(Auth::user()->hasRole('admin'))

<div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"><strong><span style="text-decoration: underline"> Derivación: </span>{{$derivacion->nombre_y_apellido}}</strong></p>
      <ul class="list-unstyled list-inline mb-0">
        <li class="list-inline-item"><a href='/informederivacion/{{$derivacion->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
        <li class="list-inline-item"><a href='/agregarseguimiento/{{$derivacion->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar seguimiento</a></li>
        <li class="list-inline-item"><a href="javascript:AlertIt();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
        <script type="text/javascript">
        function AlertIt() {
        var answer = confirm ("¿Está seguro que desea eliminar la derivación seleccionada?")
        if (answer)
        window.location="/informederivacion/deletederivacion/{{$derivacion->id}}";
        }
        </script>
      </ul>
      </div>
      <div class="row media mt-2 px-1">
          <div class="col-6">
          <p>Tipo de demanda: @foreach ($tipo_demandas as $demanda)
            @if ($demanda->id == $derivacion->tipo_demanda)
              {{$demanda->nombre}}
            @endif
          @endforeach</p>
          <p>Organismo al que se deriva: @foreach ($oderivados as $derivado)
            @if ($derivado->id == $derivacion->derivacion)
              {{$derivado->nombre}}
            @endif
          @endforeach</p>
          </div>
          <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($derivacion->fecha_ingreso))}}</p>
          <p>Estado: @if ($derivacion->estado_derivacion==1) Resuelta
          @elseif ($derivacion->estado_derivacion==2) En proceso
          @else Imposibilidad de contacto</p>
            @endif
          </div>
        </div>
          @endif
         @endforeach
         @endif
   
<br>

</section>

</section>

</div>

@endsection
</div>

