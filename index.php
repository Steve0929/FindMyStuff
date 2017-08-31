<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();


function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
$cona = mysqli_connect("localhost","id2356929_steve","lalala");

 if(!$cona){
   die("IMPOSIBLE CONECTAR CON LA BASE DE DATOS" .mysqli_error());
           }
mysqli_select_db($cona,"id2356929_accounts");

$sql = "SELECT * FROM objetosperdidos WHERE 1";
  $result = mysqli_query($cona,$sql);
 



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }


}
?>

<!DOCTYPE html>
<html>


	
<head>
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  <title>Find my stuff</title>
  <?php include 'css/css.html'; ?>
<meta name="viewport" content="width=device-width">
</head>

<style>


body {
  line-height: 0;

     margin: auto;
     padding-top: 0px;
     max-width:2000px;
     width: 100%;


 }

#map{
height:200px;
}

.pulla-right{

  float: right;
  padding-right: 20px;
}

.pulla-left{

  float: left;
}

 @media only screen and (max-device-width: 480px) {
   .img-circle-small{
     width: 20%;
     height: 20%;
   }

   .img-circle{
     width: 45%;
     height: 45%;
   }
   .pulla-right{

     float: none;
   }

   .pulla-left{

     float: none;
   }

   .circ{

     width: 150px;
     height: 100px;
     position: relative;
      margin:0 auto;
     margin-top: 10px;
       padding-left: 25px;

   }

   .circ>img{
   width: 100%;
   height: 100%;
   overflow: hidden;

   }

.pull-right{
  padding-right: 0px;
  padding: 0px;
  float: none;

}
.pull-left{
  padding-left: 0px;
  float: none;
}

.container-fluidend {
                padding-top: 50px;
                padding-bottom: 150px;
 opacity: 1;
 width: 100%;

                }
  .formula{


         width: 80%;
         height: auto;
         background: #add;

         max-width: 1500px;

           }

           .formulaModal{
           width: 100%;
           max-width: 500px;
           height: auto;
           position: absolute;
           padding: 10px 25px;
           background: #eee;
           margin-top: 270px;
             box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
             left: 50%;
             top: 50%;
             transform: translateX(-50%) translateY(-50%);

             border-radius: 4px;

           }
           .button-block{

           width: 100%;

           height: 100%;
           display: block;

           }
           .buttonin {
           width: 100%;

           }



           .errorCredenciales2{
           font-size: 16px;
           font-family: sans-serif,Arial;
           color:red;
           margin-top: 5px;
           width: 38%;
           padding-left: 4px;
           margin-left: -5px;
           background: pink;
           }

           .errorCredenciales3{
           font-size: 16px;

           color:pink;
           margin-top: 5px;
           width: 100%;
           background: #7F2982;

           }


}


</style>


<!-- bootstrap Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
crossorigin="anonymous">
<!-- END bootstrap  -->
<!-- fa ICONS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="JQuery/jquery-3.1.1.js"> </script>
<link rel="shortcut icon" href="favicon.ico" type="image/icon">
<link rel="shortcut icon" href="img/iconos/favicon.ico" type="image/icon">


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }


}
?>
<body>



<div class="container-fluid negru" >
 <h1><p align="center">Objetos encontrados recientemente </p></h1>


<div id="map-canvas" style="width: 100% !important ; height: 100% !important" ></div>
  <div id="map"></div>

     <script>

      function initMap() {
         var map = new google.maps.Map(document.getElementById("map"), {
           center: new google.maps.LatLng(4.7109,-74.072092),

           zoom: 10,
           mapTypeId: 'roadmap'
         });



         var infoWindow = new google.maps.InfoWindow;

         downloadUrl("coordenadas.php", function(data) {
           var xml = data.responseXML;
           var markers = xml.documentElement.getElementsByTagName("marker");

           for (var i = 0; i < markers.length; i++) {
             var point = new google.maps.LatLng(
               parseFloat(markers[i].getAttribute("lat")),
               parseFloat(markers[i].getAttribute("lng")));
               var categoria = markers[i].getAttribute("type");

               var contentString = markers[i].getAttribute("name");



               if(categoria == "maletas"){
             var icon = 'img/maleIcono.png';
                  }

              else    if(categoria == "electronicos"){
                var icon = 'img/elecIcono.png';
                }

              else  if(categoria == "documentos"){
                var icon = 'img/docuIcono.png';
                }
              else   if(categoria == "libros"){
                  var icon = 'img/librosIcono.png';
                  }

                else   if(categoria == "animales"){
                    var icon = 'img/animalesIcono.png';
                  }
                else    if(categoria == "llaves"){
                      var icon = 'img/llavesIcono.png';
                    }





             var marker = new google.maps.Marker({
               map: map,
               position: point,
               icon: icon
             });

                marker.setAnimation(google.maps.Animation.BOUNCE);

             var infowindow = new google.maps.InfoWindow({content: "<b>Objeto: </b>"+contentString+

             "   <b>Categoría: </b>"+ categoria});

             marker.infowindow = infowindow;
             //finally call the explicit infowindow object
             marker.addListener('click', function() {
               return this.infowindow.open(map, this);
             })





           }
         });



       }
       function downloadUrl(url, callback) {
         var request = window.ActiveXObject ?
         new ActiveXObject('Microsoft.XMLHTTP') :
         new XMLHttpRequest;
         request.onreadystatechange = function() {
           if (request.readyState == 4) {
             request.onreadystatechange = doNothing;
             callback(request, request.status);
           }
         };
         request.open('GET', url, true);
         request.send(null);
       }
       function doNothing() {}

     </script>
     <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX1Nx5TaFraoU028usKMZpodub3oKL824&callback=initMap">
     </script>

</div>
  



</div>




  <div class="container-fluidIni">
      <p> &nbsp; </p>
        <p> &nbsp; </p>
          <p> &nbsp; </p>
            <p> &nbsp; </p>
              <p> &nbsp; </p>
                <p> &nbsp; </p>
                  <p> &nbsp; </p>
                      <p> &nbsp; </p>
                          <p> &nbsp; </p>
                              <p> &nbsp; </p>
    <div align="right" style="margin-bottom:10px">  <button type="button" class="buttonin buttonin-index"
      data-toggle="modal" data-target="#modalice"
      id="iniciaBoton" name="iniciaBoton">Iniciar Sesión</button>  </div>


      <div align="right" style="margin-bottom:10px">  <button type="button" class="buttonin buttonin-index"
        data-toggle="modal" data-target="#modalReg"
        id="iniciaBoton" name="iniciaBoton">Registrarse</button>  </div>

  </div>





  <!-- Modal -->
  <div id="modalice" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="formulaModal">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Iniciar Sesión</h3>
              </div>

              <div class="circ"> <img src="img/fac.png" class="img-circle"> </div>
              <section class ="formi">
                <form  id="miForm" action="index.php" method="post" autocomplete="off">

                  <div class="divis">  <input type="email"  id="email" required autocomplete="off" name="email"  placeholder="Dirección de correo"

                     />
          <!--oninvalid="this.setCustomValidity('Correo inválido :(')"-->
                          <i class=" iconosFormu fa fa-vcard"> </i>



                 </div>

                      <div class="divis">  <input type="password" id="password" required autocomplete="off" name="password" placeholder="Contraseña" />
                          <i class=" iconosFormu fa fa-key"> </i>

                      </div>

                        <div style="margin-bottom:10px">  <button class="button button-block" id="loginbut" aria-form="miForm"  name="login" />Entrar</button>  </div>

                          <p style="float:right; color:grey; margin-bottom:10px;"><a href="forgot.php">¿Recuperar contraseña?</a></p>
                              <p class="errorCredenciales">Credenciales incorrectas</p>
                              <div id="mostrar">... </div>

              </form>
            </section>
    </div>

    </div>
  </div>


  <!-- Modal -->
  <div id="modalReg" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <p> &nbsp; </p>

      <div class="formulaModal">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Regístrate para empezar</h3>
              </div>

              <form action="index.php" method="post" autocomplete="off">


                  <div class="divis">

                  <input type="text" required autocomplete="off" name='firstname'  placeholder="Nombre" />
                  </div>


                  <div class="divis">

                  <input type="text"required autocomplete="off" name='lastname'  placeholder="Apellido" />
                  </div>


                <div class="divis">

                <input type="email"required autocomplete="off" name='email'  placeholder="Dirección de correo"/>
                  </div>

                <div class="divis">

                <input type="password"required autocomplete="off" name='password' placeholder="Crea una contraseña"/>

  </div>
              <button type="submit" class="button button-block" name="register" />Registrarme</button>

              </form>
              <p> &nbsp; </p>


    </div>

    </div>
  </div>







    <footer class="footer-distributed">

      <div class="footer-left">

        <p class="footer-links">
        Términos y Condiciones
        </p>

        <p class="footer-company-name">Copyright © 2017 T-Corp. Todos los derechos reservados</p>

      </div>

      <div class="footer-right">

        <p class="footer-links"> Powered by UniArcorn   </p >   <img   src="img/unicorn.png" class="img-circle-small"   width="10%" height="10%">

      </div>

    </footer>

    <!--
  <div class="field-wrap">
    <label>
      Dirección de correo<span class="req">*</span>
    </label>
    <input type="email" required autocomplete="off" name="email"/>
  </div>
  </div>

  <div class="form">

      <ul class="tab-group">
        <li class="tab"><a href="#signup">Registarme</a></li>
        <li class="tab active"><a href="#login">Entrar</a></li>
      </ul>

    tab-content   <div class="tab-content">  tabs que no funcan :S

         <div id="login">
          <h1>¡Bienvenido! Entrar</h1>

          <form action="index.php" method="post" autocomplete="off"> !!

            <div class="field-wrap">
            <label>
              Dirección de correo<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>

          <p class="forgot"><a href="forgot.php">¿Recuperar contraseña?</a></p>

          <button class="button button-block" name="login" />Entrar</button>

          </form>

        </div>

        <div id="signup">
          <h1>Regístrate para empezar</h1>

          <form action="index.php" method="post" autocomplete="off">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nombre<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>

            <div class="field-wrap">
              <label>
                Apellido<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Tu Email<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>

          <div class="field-wrap">
            <label>
              Crea una contraseña<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>

          <button type="submit" class="button button-block" name="register" />Registrarme</button>

          </form>

        </div>

     </div>  tab-content

</div> /form -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- bootstrap Script Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
<!-- END bootstrap Script -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>  </script>

  <script src="js/index.js"></script>



  <script>

  $("button#loginbut").click(function(){

    var email  = $("#email").val();
    var password = $("#password").val();

    if($("#email").val()=="" ){

       $(".divis").addClass("errorShake");
        }


    else{
      $.post("login.php?", {email: email, password: password})
            .done(function(data){
              if(data=="failed")    {
              $("#mostrar").text("falló lo siento");
                                    }
                      else{return false;}

                              });
        }

})





  $(".divis").click(function(){

     $(".divis").removeClass("errorShake");
   })

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#modalicer").modal('show');
        });
    </script>

</body>
</html>