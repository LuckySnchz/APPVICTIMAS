
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje A: Datos institucionales</title>
      <style>
         .Auno,.Ados{float: left;
         width: 40%
         }
         .AunoDos{overflow: hidden;margin-left: 1%}
      </style>
   </head>
     <header>
      <section class="container jumbotron shadow p-3 mb-5 bg-white rounded"style="height: 150px" >
     @include('navbar')

                <a type="button"  href="/home" target="_self" style="width:100%; color:white;background-color:rgb(52, 144, 220);margin-bottom: -5%;margin-top: -12%" class="btn col-XL" class="btn btn-danger">IR A INICIO</button> </a><br><br>
      </section>        
      
   </header>
   <body>

    <h1 class="text-center" style="padding: 15px;">Eje A: Datos institucionales</h1>

    <div class="divpersona" id="divpersona">  <h2 class="text-center" style="padding: -20px;">Persona Asistida</h2></div>

    <section class="container jumbotron shadow p-3 mb-5 bg-white rounded" >

<!Listado Personas asistidas>

   


    <form class="" action="/detallepersonavinculo" method="post">
      {{csrf_field()}}
  <input type="hidden" name="idCaso" value="{{session("idCaso")}}">
    <input type="hidden" name="idPersona" value="{{session("idPersona")}}">
    <input type="hidden" name="userID_modify" value="{{$persona->userID_modify}}">


<!-C 1 Persona Asistida>

      <div class="form-group" {{ $errors->has('nombre_persona_asistida') ? 'has-error' : ''}}>
      <label for="nombre_persona_asistida">C 1. Nombre y apellido persona asistida: </label>
      <input disabled type="text" class="form-control" name="nombre_persona_asistida" id="nombre_persona_asistida" value="{{$nombre_persona_asistida}}">

       @if($nombre_persona_asistida=="Se desconoce") 

      <label for="bloqueo1" class="form-check-label">Se desconoce</label>
      <input disabled type="checkbox" id="bloqueo1" name="nombre_persona_asistida" value="Se desconoce"checked onchange="checkA14a(this)">

      @else
      <label for="bloqueo1" class="form-check-label">Se desconoce</label>
      <input disabled  type="checkbox" id="bloqueo1" name="nombre_persona_asistida" value="Se desconoce" onchange="checkA14a(this)">
      @endif
      {!! $errors->first('nombre_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

      <script>
           function checkA14a(checkbox)
           {
               if (checkbox.checked)
                   {
                       $('#nombre_persona_asistida').val('Se desconoce');
                       document.getElementById('nombre_persona_asistida').setAttribute("readonly", "readonly");

                   }else
                       {
                           $('#nombre_persona_asistida').val('');
                           document.getElementById('nombre_persona_asistida').removeAttribute("readonly");
                       }
           }
        </script>

<!-C 2. Tipo de vínculo>


     
  <div class="form-group" {{ $errors->has('vinculo_victima') ? 'has-error' : ''}}>
      <label for="">C 2. Tipo de vínculo con la víctima: </label>
      <select class="form-control" name="vinculo_victima" style="background-color: red;color:black" value="{{old("vinculo_victima")}}" id="vinculo_victima" onChange="selectOnChangeA14II(this)">
           <option value="" selected=disabled>Seleccionar...</option>

              @if(old("vinculo_victima")==5)
              <option value="5" selected >Ex-Pareja</option>
              @else<option value="5" >Ex-Pareja</option>@endif
              @if(old("vinculo_victima")==1)
              <option value="1" selected >Familiar</option>
              @else <option value="1">Familiar</option>@endif

              @if(old("vinculo_victima")==2)
              <option value="2" selected >Lazo afectivo</option>
              @else  <option value="2" >Lazo afectivo</option>@endif

              @if(old("vinculo_victima")==3)
              <option value="3" selected >Organismo o institución</option>
              @else  <option value="3">Organismo o institución</option>@endif

              @if(old("vinculo_victima")==4)
              <option value="4" selected >Otro</option>
              @else<option value="4" >Otro</option>@endif

              

              </select>
      {!! $errors->first('vinculo_victima', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

      @if(old("vinculo_victima") == 1)
        <div id="vinculo_victima_cual_familiar" {{ $errors->has('vinculo_otro_familiar') ? 'has-error' : ''}}>
        @else
          <div id="vinculo_victima_cual_familiar" style="display: none;">
      @endif
      <br><label for="">Especificar Vínculo Familar?</label>
      <div class="">
      <input class="form-control" name="vinculo_otro_familiar" id="vinculo_otro_familiar" type="text" value="{{old("vinculo_otro_familiar")}}"><br>
      {!! $errors->first('vinculo_otro_familiar', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>
</div>


@if(old("vinculo_victima") == 4)
        <div id="vinculo_victima_cual" {{ $errors->has('vinculo_otro') ? 'has-error' : ''}}>
        @else
          <div id="vinculo_victima_cual" style="display: none;">
      @endif
      <br><label for="">Cuál?</label>
      <div class="">
      <input class="form-control" name="vinculo_otro" id="vinculo_otro" type="text" value="{{old("vinculo_otro")}}"><br>
      {!! $errors->first('vinculo_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>
      </div>

<!-C 3. telefono>

       <div class="form-group"{{ $errors->has('telefono_persona_asistida') ? 'has-error' : ''}}>


    @if(old('telefono_persona_asistida')=="0")

<label >C 3. teléfono de persona asistida:</label>
<strong>Ingresa el número de teléfono, si es celular sin el 15. Característica sin el 0 y Presiona Ingresar!!</strong><br><br>

    <input  name="telefono_persona_asistida" placeholder="Ingresar 10 dígitos, el sisrema le dará el formato 221-463-2683 o 114-563-2889" style="background-color:#e9ecef;color:black" value="{{$persona->telefono_persona_asistida}}"id="telefono_persona_asistida" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onKeypress="addDashesPhoneUno(this)" type="tel" disabled readonly="readonly"/><br>

    <label class="form-check-label">Se desconoce</label>
    <input disabled name="telefono_persona_asistida" value="000-000-0000" id="bloqueo1" type="checkbox" checked onchange="checkA14(this)">
    @else

<label for="edad">C 3. teléfono de persona asistida:</label><br>
<strong>*Ingresa el número de teléfono, si es celular sin el 15. Característica sin el 0 y Presiona Ingresar!!</strong><br><br>
    <input disabled type="tel" name="telefono_persona_asistida" style="background-color: white;color:black" value="{{$persona->telefono_persona_asistida}}"   id="telefono_persona_asistida" class="form-control" placeholder="Ingresar 10 dígitos, el sisrema le dará el formato 221-463-2683 o 114-563-2889" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
onKeypress="addDashesPhoneUno(this)"required ><br>

    <label class="form-check-label" >Se desconoce</label>
    <input disabled name="telefono_persona_asistida" value="000-000-0000" id="bloqueo1" type="checkbox" onchange="checkA14(this)">
  @endif

    {!! $errors->first('telefono_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>



<script type="text/javascript">
  function addDashesPhoneUno(f1) {
  var r1 = /(\D+)/g,
  npa1 = '',
  nxx1 = '',
  last41 = '';
  f1.value = f1.value.replace(r1, '');
  npa1 = f1.value.substr(0, 3);
  nxx1 = f1.value.substr(3, 3);
  last41 = f1.value.substr(6, 4);
  f1.value = npa1 + '-' + nxx1 + '-' + last41;
}
</script>
<script type="text/javascript">
       function checkA14(checkbox) {
          if (checkbox.checked)
                {
                    $('#telefono_persona_asistida').val('Se Desconoce');
                    document.getElementById('telefono_persona_asistida').setAttribute("readonly","readonly");
                    document.getElementById('telefono_persona_asistida').style.background="#e9ecef";
                    divAY= document.getElementById("telefono_persona_asistida").disabled=true;

           }
           else{
                    $('#telefono_persona_asistida').val('');
                  document.getElementById('telefono_persona_asistida').style.background="white";
                    document.getElementById('telefono_persona_asistida').removeAttribute("readonly");
                  divA = document.getElementById("telefono_persona_asistida").disabled=false;

           }}
    </script>




<!-C 3. Otro telefono>

       <div class="form-group"{{ $errors->has('otro_telefono_persona_asistida') ? 'has-error' : ''}}>


    @if(old('otro_telefono_persona_asistida')=="0")

<label >C 3 I. Otro teléfono de persona asistida:</label>
<strong>Ingresa el número de teléfono, si es celular sin el 15. Característica sin el 0 y Presiona Ingresar!!</strong><br><br>

    <input disabled name="otro_telefono_persona_asistida" placeholder="Ingresar 10 dígitos, el sisrema le dará el formato 221-463-2683 o 114-563-2889" style="background-color: #e9ecef;color:black" value="{{$persona->otro_telefono_persona_asistida}}"   id="otro_telefono_persona_asistida" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onKeypress="addDashesPhoneDos(this)" type="tel" readonly="readonly"/><br>

    <label class="form-check-label">Se desconoce</label>
    <input disables name="otro_telefono_persona_asistida" value="000-000-0000" id="bloqueo1" type="checkbox" checked onchange="checkA15(this)">
    @else

<label for="edad">C 3 I. Otro teléfono de persona asistida:</label><br>
<strong>*Ingresa el número de teléfono, si es celular sin el 15. Característica sin el 0 y Presiona Ingresar!!</strong><br><br>
    <input disabled="" type="tel" name="otro_telefono_persona_asistida" style="background-color: white;color:black" value="{{$persona->otro_telefono_persona_asistida}}"   id="otro_telefono_persona_asistida" class="form-control" placeholder="Ingresar 10 dígitos, el sisrema le dará el formato 221-463-2683 o 114-563-2889" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
onKeypress="addDashesPhoneDos(this)"required ><br>

    <label class="form-check-label" >Se desconoce</label>
    <input disabled name="otro_telefono_persona_asistida" value="000-000-0000" id="bloqueo1" type="checkbox" onchange="checkA15(this)">
  @endif

    {!! $errors->first('otro_telefono_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
      

<script type="text/javascript">
  function addDashesPhoneDos(f2) {
  var r2= /(\D+)/g,
  npa2 = '',
  nxx2 = '',
  last42 = '';
  f2.value = f2.value.replace(r2, '');
  npa2 = f2.value.substr(0, 3);
  nxx2 = f2.value.substr(3, 3);
  last42 = f2.value.substr(6, 4);
  f2.value = npa2 + '-' + nxx2 + '-' + last42;
}
</script>
<script type="text/javascript">
       function checkA15(checkbox) {
          if (checkbox.checked)
                {
                    $('#otro_telefono_persona_asistida').val('Se Desconoce');
                    document.getElementById('otro_telefono_persona_asistida').setAttribute("readonly","readonly");
                    document.getElementById('otro_telefono_persona_asistida').style.background="#e9ecef";
                    divAY= document.getElementById("otro_telefono_persona_asistida").disabled=true;

           }
           else{
                    $('#otro_telefono_persona_asistida').val('');
                  document.getElementById('otro_telefono_persona_asistida').style.background="white";
                    document.getElementById('otro_telefono_persona_asistida').removeAttribute("readonly");
                  divA = document.getElementById("otro_telefono_persona_asistida").disabled=false;

           }}
    </script>

<!-C 4. Domicilio persona asistida>

      <div class="form-group"{{ $errors->has('domicilio_persona_asistida') ? 'has-error' : ''}}>
      <label for="domicilio_persona_asistida">C 4. Domicilio persona asistida: </label>
      <input disabled type="text" class="form-control" name="domicilio_persona_asistida" id="domicilio_persona_asistida"value="{{$domicilio_persona_asistida}}">
 @if($domicilio_persona_asistida=="Se desconoce") 

      <label for="bloqueo1" class="form-check-label">Se desconoce</label>
      <input disabled type="checkbox" id="bloqueo1" name="domicilio_persona_asistida" checked value="Se desconoce" onchange="checkA14d(this)">

      @else
      <label for="bloqueo1" class="form-check-label">Se desconoce</label>
      <input disabled type="checkbox" id="bloqueo1" name="domicilio_persona_asistida" value="Se desconoce" onchange="checkA14d(this)">
      @endif


      {!! $errors->first('domicilio_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

      <script>
           function checkA14d(checkbox)
           {
               if (checkbox.checked)
                   {
                       $('#domicilio_persona_asistida').val('Se desconoce');
                       document.getElementById('domicilio_persona_asistida').setAttribute("readonly", "readonly");
                   }else
                       {
                           $('#domicilio_persona_asistida').val('');
                           document.getElementById('domicilio_persona_asistida').removeAttribute("readonly");
                       }
           }
        </script>
<!-C 5. Localidad de residencia>

      <div class="form-group"{{ $errors->has('localidad_persona_asistida') ? 'has-error' : ''}}>
      <label for="localidad_persona_asistida">C 5. Localidad de residencia: </label>
      <input  disabled type="text" class="form-control" name="localidad_persona_asistida" id="localidad_persona_asistida" value="{{$localidad_persona_asistida}}">

       @if($localidad_persona_asistida=="Se desconoce") 

      <label for="bloqueo1" class="form-check-label">Se desconoce</label>
      <input disabled type="checkbox" id="bloqueo1" name="localidad_persona_asistida" checked value="Se desconoce" onchange="checkA14r(this)">
@else

 <label for="bloqueo1" class="form-check-label">Se desconoce</label>
      <input disabled type="checkbox" id="bloqueo1" name="localidad_persona_asistida" value="Se desconoce" onchange="checkA14r(this)">
      @endif


      {!! $errors->first('localidad_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

      <script>
           function checkA14r(checkbox)
           {
               if (checkbox.checked)
                   {
                       $('#localidad_persona_asistida').val('Se desconoce');
                       document.getElementById('localidad_persona_asistida').setAttribute("readonly", "readonly");
                   }else
                       {
                           $('#localidad_persona_asistida').val('');
                           document.getElementById('localidad_persona_asistida').removeAttribute("readonly");
                       }
           }
        </script>

<!BOTONES>

      <div class="botones">
      <div class="btn-1"> <button type="submit" class="btn btn-primary col-xl" name="button"  >Agregar/Enviar</button><br><br></div>
      </div>
      </form>

        
      </section>

      <script>

         function selectOnChange1(sel) {
             if (sel.value=="2"){
                 divC = document.getElementById("no");
                 divC.style.display = "";
             }else{
                 divC = document.getElementById("no");
                 $('#datos_profesional_interviene_hasta').val('');
                 divC.style.display="none";
             }
         }
      </script>
      <script>
         function muestroCualA2() {
             var checkBox = document.getElementById("checkeado");
             var text = document.getElementById("cualA2");
             if (checkBox.checked == true){
                 text.style.display = "block";
             } else {
               $('#tipos_delitos_otro_cual').val('');
                text.style.display = "none";
             }
         }
      </script>
      <script>
         function selectOnChangeA5bis(sel) {
         if (sel.value=="14"){
         divC = document.getElementById("cualA5");
         divC.style.display = "";}
         else{
         divC = document.getElementById("cualA5");
         $('#derivacion_otro_organismo_cual').val('');

         divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA5(sel) {
           if (sel.value=="1"||sel.value=="2"){
                divC = document.getElementById("derivacion_otro_organismo_id");
                $('#otro_organismo').val(' ');
                divC.style.display = "none";}


           if (sel.value=="3"){
                divC = document.getElementById("derivacion_otro_organismo_id");
                divC.style.display = "";

         }}
      </script>
      <script>
         function selectOnChangeA12(sel) {

                                 if (sel.value=="2"){
                divC = document.getElementById("pase_pasivo");
                divC.style.display = "";

         }
         else{
               divC = document.getElementById("pase_pasivo");
               $('#motivo_pase_pasivo').val(' ');
               divC.style.display = "none";
               divC = document.getElementById("cualA12");
               $('#motivo_pase_pasivo_cual').val('');
             divC.style.display = "none";}}
      </script>
      <script>
         function selectOnChangeA12bis(sel) {
           if (sel.value=="4"){
             divC = document.getElementById("cualA12");
             divC.style.display = "";}
             else{
                divC = document.getElementById("cualA12");
                $('#motivo_pase_pasivo_cual').val('');

                divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA14(sel) {
           if (sel.value=="2"){
             divC = document.getElementById("personas_asistidas");
             divC.style.display = "";}
             else{
                divC = document.getElementById("personas_asistidas");
                $('#Nombre_apellido_persona_asistida').val('');
                $('#vinculo_victima').val('');
                $('#vinculo_otro').val('');
                $('#telefono_contacto').val('');
                $('#domicilio_contacto').val('');
                $('#localidad_residencia').val('');
                divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA14II(sel) {
           if (sel.value=="1"){
             divC = document.getElementById("vinculo_victima_cual_familiar");
             divC.style.display = "";}
             else{
                divC = document.getElementById("vinculo_victima_cual_familiar");
                $('#vinculo_otro').val('');

                divC.style.display = "none";}


                 if (sel.value=="4"){
             divC = document.getElementById("vinculo_victima_cual");
             divC.style.display = "";}
             else{
                divC = document.getElementById("vinculo_victima_cual");
                $('#vinculo_otro-familiar').val('');

                divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA15(sel) {
           if (sel.value=="2"){
             divC = document.getElementById("no");
             divC.style.display = "";}
             else{
                divC = document.getElementById("no");
                $('#no').val('');

                divC.style.display = "none";}
         }
      </script>



      </body>
</html>
