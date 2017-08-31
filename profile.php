<?php

/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
// ( $_SESSION['logged_in'] != 1 )
if (!isset($_SESSION['logged_in']))  {
  $_SESSION['message'] = "¡Debes iniciar sesión!";
  header("location: error.php");
die();
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>


<!DOCTYPE html>
<html >

<!-- bootstrap Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
crossorigin="anonymous">




<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
crossorigin="anonymous">
<!-- END bootstrap  -->
<script src="JQuery/jquery-3.1.1.js"> </script>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Bienvenido<?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>


<style>


#map{
height: 250px;
width: 100%;

}

.row{
  padding: 0;
  margin: 0;

}

.formula{
width: 700px;
         }

         .buttonin-index{
           width: 200px;
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
   .container-fluidend {
                   padding-top: 50px;
                   padding-bottom: 150px;
    opacity: 1;
    width: 100%;

                   }
   .pulla-right{

     float: none !important;
   }

   .pulla-left{

     float: none !important;
   }

   .buttonin-index{
     width: 220px;

   }
   .formula{

          width: 100%;
            }
.form {
  background: rgba(29, 65, 47, 3);
  padding: 40px;
  max-width: 100%;
  width: 800px;
  zoom:250%;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.button-block{

width: 100%;
zoom:40%;
height: 100%;
display: block;

}

.buttonin {
width: 100%;
background: #FED766;
}



}
</style>
<style>
body {
     font: 20px Montserrat, sans-serif;
     line-height: 0;
     margin: auto;
     padding-top: 0px;


     max-width:2000px;
     width: 100%;

 }

</style>



<body>


  <div id="panelosoB" class="container-fluid backAzul">
          <h1 >Qué bueno tenerte de regreso. </h1>

          <p>
          <?php

          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];

              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }

          ?>
          </p>

          <?php

          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){


          }

          ?>


          <h3> Hola de nuevo <?php echo   $first_name.' '.$last_name; ?>.</h3>
          <h4><p>Tu correo activo: <?= $email ?></p></h4>

        <?php   if ( $active ){  echo
          ' <h4><p>Estado de la cuenta: <span class="label label-success">ACTIVA</span> </p></h4> '; }

                         if ( !$active ){  echo
            ' <h4><p>Estado de la cuenta: <span class="label label-danger">INACTIVA</span> </p></h4>


            <div class="panelRojo" >

          <h4>La cuenta no está activada aún. Por favor verifica tu cuenta abriendo el enlace
             que hemos enviado a tu correo.</h4>  </div>'       ;}

           ?>



          <h4>    <a href= "logout.php"><span class="label label-default">Cerrar sesión</span></a></h4>

    <!--   <a href="logout.php"><button class="label label-success" name="logout"/>Cerrar sesión</button></a> -->
  </div>


<div class="row">
    <div class="col-sm-6">

          <div id="panelosoA" class="container-fluid fondiu">

        <h3 align="center">    <a href= "buscador.php"><span class="label label-danger">Extravié un objeto.</span></a></h3>

          <p> &nbsp; </p>
          <p> &nbsp; </p>
          <div align="center">
          <img src="img/search2.png" class="img-circle"   width="100" height="100" >
          </div>
          <h3 ><p align="center">¿Perdiste un objeto? Adelante, permítenos ayudarte a buscar si alguien ya lo ha encontrado. </p></h3>
            <p> &nbsp; </p>
              <p> &nbsp; </p>
              
                 <div align="center" style="margin-bottom:10px">

                    <a href= "buscador.php">   <button class="buttonin buttonin-small" id="buscabutnewpage"
                      name="buscarnewpage" />Buscar</button></a>  </div>

        </div>
</div>

<div class="col-sm-6">
  <div id="panelosoB" class="container-fluid backVerde" >

          <h3 align="center"> <a href= "#panelosoB"><span class="label label-success">Encontré un objeto.</span> </a> </h3>
          <p> &nbsp; </p>
          <p> &nbsp; </p>
          <div align="center">
          <img src="img/rating.png" class="img-circle"  width="100" height="100">
          </div>

          <h3 ><p align="center">¿Encontraste un objeto? Adelante, publícalo ahora para que su dueño pueda recuperarlo. </p></h3>
            <p> &nbsp; </p>
              <p> &nbsp; </p>
            <div align="center" style="margin-bottom:10px">  <button type="button" class="buttonin buttonin-small"
              data-toggle="modal" data-target="#modalice"
              id="publibut" name="publica"> Publicar</button>  </div>

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

<!-- Modal -->
<div id="modalice" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 align="center" class="modal-title">Publicar un objeto encontrado</h4>
  <h2>  <p align="center">Te pediremos algunos detalles...</p> </h2>
      </div>

      <div class="modal-body">

        <p> &nbsp; </p>
        <form  id="miFormPublicar" action="profile.php" method="post" enctype="multipart/form-data" autocomplete="off">


            <input type="text"  class="form-control" id="objetoTitulo" required autocomplete="off" name="objetoTitulo"  placeholder="Objeto Encontrado"  />
              <p> &nbsp; </p>
                <p> &nbsp; </p>
              <input type="text"  class="form-control"  id="objetoLugar" required autocomplete="off" name="objetoLugar"  placeholder="Lugar donde lo encontraste"  />
             

                 <h2><small id="fileHelp" class="form-text text-muted">Por favor selecciona la ubicación en el mapa en la que encontraste el objeto. </small>  </h2>
               
                    <input type="hidden"  class="form-control"  id="mapaxx" required autocomplete="off" name="mapaxx"  placeholder="   MAPA-x:"  />
                    <input type="hidden"  class="form-control"  id="mapayy" required autocomplete="off" name="mapayy"  placeholder="   MAPA-y:"  />
                <div id="map"></div>


       <script async defer
                 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX1Nx5TaFraoU028usKMZpodub3oKL824&callback=initMap">
                 </script>
                 <script>


                 var map;
                 function initMap() {
                   map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: -34.397, lng: 150.644},
                  zoom: 17
                                });



       // Try HTML5 geolocation.
       if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function(position) {

            // Para centrar el mapa
           var pos = {
             lat: position.coords.latitude,
             lng: position.coords.longitude
           };

             marker = new google.maps.Marker({

             map: map,
             draggable: true,
             position: {lat: position.coords.latitude, lng: position.coords.longitude}

         });

         document.getElementById("mapaxx").value= position.coords.latitude;
         document.getElementById("mapayy").value= position.coords.longitude;

         var contentString = "<div style='color:black;'>Tu posición actual, arrastra el marcador a la posición donde encontraste el objeto.</div>";
         var infowindows = new google.maps.InfoWindow({
           content: contentString
            });

              marker.addListener('click', function() {
              infowindows.open(map, marker);
              });

              //Actualizar coordenadas al mover el marcador
              google.maps.event.addListener(marker, "dragend", function (evt) {

              document.getElementById("mapaxx").placeholder = this.getPosition().lat();
              document.getElementById("mapayy").placeholder = this.getPosition().lng();
              document.getElementById("mapaxx").value = this.getPosition().lat();
              document.getElementById("mapayy").value = this.getPosition().lng();
          });


              map.setCenter(marker.position);


         }, function() {
           handleLocationError(true, infoWindow, map.getCenter());
         });
       } else {
         // Browser doesn't support Geolocation
         handleLocationError(false, infoWindow, map.getCenter());
       }
     }

     function handleLocationError(browserHasGeolocation, infoWindow, pos) {
       infoWindow.setPosition(pos);
       infoWindow.setContent(browserHasGeolocation ?
                             'Error: Error en Geolocalización. The Geolocation service failed.' :
                             'Error: Este navegador no soportaG eolocalización. Your browser doesn\'t support geolocation.');
     }

                 </script>



              <p> &nbsp; </p>
                <p> &nbsp; </p>


                <p> Categoría:</p>
                  <p> &nbsp; </p>
                  <select class="form-control"  id="exampleSelect1" name="categorias">
                      <option value="documentos" >Documentos/Billeteras</option>
                      <option value="electronicos" >Dispositivos electronicos</option>
                      <option value="maletas">Maletas</option>
                      <option value="llaves">Llaves</option>
                      <option value="animales">Animales</option>
                      <option value="libros">Libros</option>
                      </select>
                      <p> &nbsp; </p>
                      <p> &nbsp; </p>
              <small id="fileHelp" class="form-text text-muted">Imágen del objeto</small>
              <p> &nbsp; </p>
                <p> &nbsp; </p>
                <input type="file" class="form-control" id="exampleInputFile"  name="imagenFM" required aria-describedby="fileHelp ">
                      <p> &nbsp; </p>
                      <p> &nbsp; </p>
                    <p align="center"> <button type="submit" class="buttonin buttonin-small" name="publicarOBJ" />Publicar</button> </p>
                    <input type="hidden" name="emailUsuario" value="<?php echo $email; ?>" />
          </form>

      </div>


<!-- Modal
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>-->

  </div>
</div>
</div>



<!-- Modal2
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>-->

  </div>
</div>
</div>

<?php
if(isset($_POST['publicarOBJ']))
  {

if( $active){
$cona = mysqli_connect("localhost","id2356929_steve","lalala");
if(!$cona){
  die("IMPOSIBLE CONECTAR CON LA BASE DE DATOS" .mysqli_error());
}

mysqli_select_db($cona,"id2356929_accounts");


$file =$_FILES['imagenFM']['tmp_name'];
$imagenData = addslashes(file_get_contents($_FILES['imagenFM']['tmp_name']));
$imagenNombre = addslashes($_FILES['imagenFM']['name']);
$imagenTam = getimagesize($_FILES['imagenFM']['tmp_name']);

if($imagenTam==FALSE){
  echo '<div class="formula">
      <p> &nbsp; </p>
      <h2>Error :(</h2>
    <h3>   <p>
    El archivo subido no es una imágen válida.
        <p> &nbsp; </p>
    </p></h3>
    <p align="center"> <a href="profile.php"><button class="buttonin buttonin-index"/>Regresar</button></a> </P>
  </div>';
}

else{
$sqla = "INSERT INTO objetosperdidos (nombre,lugar,usuarioid,imagenDB,categoria,latitud,longitud) "
            . "VALUES ('$_POST[objetoTitulo]','$_POST[objetoLugar]','$_POST[emailUsuario]','$imagenData', '$_POST[categorias]','$_POST[mapaxx]','$_POST[mapayy]')";




mysqli_query($cona,$sqla);




echo'<div class="formula">
    <p> &nbsp; </p>
    <h2>Perfecto</h2>
  <h3>   <p>
  Tu publicación se ha realizado exitosamente, agradecemos tu colaboración.
  </p></h3>
    <p> &nbsp; </p>
  <p align="center"> <a href="profile.php"><button class="buttonin buttonin-index"/>Regresar</button></a> </P>

</div>';

//echo  '<img src="data:image/jpeg;base64,' .base64_encode($RESULTADOOP['image']). ' "/>  ';


mysqli_close($cona);
  }
}

else{

echo '<div class="formula">
    <h2>   Error en la publicación :(   <h2>
  <h3>   <p>
  No puedes realizar esta acción porque parece que tu cuenta no ha sido activada aún.
  </p></h3>
  <p align="center"> <a href="profile.php"><button class="buttonin buttonin-index"/>Regresar</button></a> </P>
</div>';

    }

  }

 ?>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- bootstrap Script Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
<!-- END bootstrap Script -->
<script src="js/index.js"></script>
<script>
$(function () {
    $('#mostrar').click(function(){
        $('#contenidoS').slideToggle();
    });
});


$('#modalice').on('shown.bs.modal',function(){



  google.maps.event.trigger(map, "resize");



if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

  map.setCenter(new google.maps.LatLng(pos));

  }) }
});



</script>
</body>
</html>