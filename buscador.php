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



   .container-fluidend {
                   padding-top: 25px;
                   padding-bottom: 15px;
                   padding-left: none;
                   padding-right: none;
                   display: block;
                   text-align: justify;
    opacity: 1;
    width: 100%;
    margin: auto;



                   }
   .pulla-right{

  float: none;
     text-align: justify;
     padding: none !important;
   }

   .pulla-left{

     float: none !important;

     padding: none !important;
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

.img-circle-small{
  width: 20%;
  height: 20%;
}

.img-circle-smaller{
  width: 10%;
  height: 10%;
}


.img-circle{
  width: 45%;
  height: 45%;
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

 #contenidoS{
display:none;
   
 }

</style>



<body>

  <!-- INICIA NAVBAR BOOTSTRAP-->


  <nav class="navbar navbar-default">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="profile.php"> INICIO</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Explorar</a></li>
          <li><a href="profile.php">Perfil</a></li>
        </ul>

    </div>
  </nav>
  <!-- FIN NAVBAR BOOTSTRAP-->

  <div id="panelosoB" class="container-fluid backAzul">

          <div class="row">
                <div class="col-sm-6">
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


          <h3> Hola de nuevo <?php echo   $first_name.' '.$last_name; ?>.  </h3>

          <div class="verticalLine">&nbsp;</div>
    </div>



        <div align="center" class="col-sm-6">
          <div align="center" id="mostrar">
              <p> &nbsp; </p>
                <p> &nbsp; </p>
             <img src="img/room-key.png" class="img-circle-small"   width="10%" height="10%" > </div>

            <div id="contenidoS" >
          <h4><p>Tu correo activo: <?= $email ?></p></h4>

        <?php   if ( $active ){  echo
          ' <h4><p>Estado de la cuenta: <span class="label label-success">ACTIVA</span> </p></h4> '; }

                         if ( !$active ){  echo
            ' <h4><p>Estado de la cuenta: <span class="label label-danger">INACTIVA</span> </p></h4>


            <div class="panelRojo" >

          <h4>La cuenta no está activada aún. Por favor verifica tu cuenta abriendo el enlace
             que hemos enviado a tu correo.</h4>

              </div>     <p> &nbsp; </p>'       ;}

           ?>

           <div align="center" style="margin-bottom:10px">  <button class="buttonin buttonin-small" id="propios"
              data-toggle="modal" data-target="#modalice2"
             name="propios" />Objetos Marcados como propios</button>  </div>

             <div align="center" style="margin-bottom:10px">  <button class="buttonin buttonin-small" id="publicados" name="publicados"
                 data-toggle="modal" data-target="#modalice"
                name="publicados" />Objetos que has publicado</button>  </div>


          <h4>    <a href= "logout.php"><span class="label label-default">Cerrar sesión</span>   </a> </h4>
</div>
</div>
    <!--   <a href="logout.php"><button class="label label-success" name="logout"/>Cerrar sesión</button></a> -->
  </div>
</div>

      <div id="panelosoA" class="container-fluid fondiubus">

        <h3 align="center">    <a href= "#"><span class="label label-danger">Extravié un objeto.</span></a></h3>

          <p> &nbsp; </p>
          <p> &nbsp; </p>
          <div align="center">
          <img src="img/search2.png" class="img-circle"   width="100" height="100" >
          </div>
          <h3 ><p align="center">¿Perdiste un objeto? Adelante, permítenos ayudarte a buscar si alguien ya lo ha encontrado. </p></h3>
            <p> &nbsp; </p>

            <h3> <p align="center"> ¿Que tipo de objeto perdiste?</p></h3>
              <p> &nbsp; </p>
              <p> &nbsp; </p>
                <p> &nbsp; </p>
                  <p> &nbsp; </p>
                    <p> &nbsp; </p>
  <hr style="width: 100%; height: 30px;" />

    <form  id="miFormPublicar" action="buscador.php" method="post" autocomplete="off">
                            <div class="row-fluid">
                            <div class="col-sm-4">

                            <p align="center "> Documentos/Billeteras </p>
                            <p> &nbsp; </p>
                            <p align="center ">  <a href="#exampleSelect1"> <img alt="documentos" src="img/wallet.png" class="img-circle"   width="100" height="100" > </a></p>
                            </div>
                            <div class="col-sm-4">
                            <p align="center "> Dispositivos electronicos</p>
                            <p> &nbsp; </p>
                            <p align="center "> <a href="#exampleSelect1">  <img alt="electronicos" src="img/responsive.png" class="img-circle"   width="100" height="100" >  </a></p>
                            </div>
                            <div class="col-sm-4">
                            <p align="center ">Maletas</p>
                            <p> &nbsp; </p>
                            <p align="center "> <a href="#exampleSelect1"> <img  alt="maletas" src="img/backpack.png" class="img-circle"   width="100" height="100" > </a> </p>
                            </div>
                            <p> &nbsp; </p>
                            <p> &nbsp; </p>
                            <p> &nbsp; </p>
                            </div>

  <hr style="width: 100%; height: 30px;" />
  <div class="row-fluid">

                        <div class="col-sm-4">
                        <p align="center ">Llaves/Accesorios</p>
                        <p> &nbsp; </p>
                        <p align="center "> <a href="#exampleSelect1"> <img alt="llaves" src="img/key.png" class="img-circle"   width="100" height="100" > </a> </p>
                        </div>
                        <div class="col-sm-4">
                        <p align="center "> Animales </p>
                        <p> &nbsp; </p>
                        <p align="center "> <a href="#exampleSelect1"> <img  alt="animales" src="img/dog.png" class="img-circle"   width="100" height="100" > </a> </p>
                        </div>
                        <div class="col-sm-4">
                        <p align="center "> Libros/Cuadernos </p>
                        <p> &nbsp; </p>
                        <p align="center "> <a href="#exampleSelect1"> <img  alt="libros" src="img/library.png" class="img-circle"   width="100" height="100" > </a> </p>
                        </div>

                                        <p> &nbsp; </p>
                                        <p> &nbsp; </p>
                                        <p> &nbsp; </p>
                                      </div>
                                <hr style="width: 100%; height: 30px;" />
                                <p> &nbsp; </p>
                                <p> &nbsp; </p>

                                <p align="left"> Categoría</p>
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

              <div align="center" style="margin-bottom:10px">
                <p> &nbsp; </p>
                <p align="left"> ¿Cuando lo perdiste?</p>
                <p> &nbsp; </p>
                <input type="date" name="fecha" placeholder="¿Cuando lo perdiste?">


                    <p> &nbsp; </p>
             <button class="buttonin buttonin-small" id="buscabut" name="buscar" />Buscar</button> </div>

</form>

 <?php

 $cona = mysqli_connect("localhost","id2356929_steve","lalala");

 if(!$cona){
   die("IMPOSIBLE CONECTAR CON LA BASE DE DATOS" .mysqli_error());
           }
mysqli_select_db($cona,"id2356929_accounts");

if(isset($_POST['buscar'])){

  $buscarq= $_POST['categorias'];
  $fechita = $_POST['fecha'];
  $sql = "SELECT * FROM objetosperdidos WHERE categoria LIKE '%$buscarq%' AND Cuando LIKE '%$fechita%'";
  $result = mysqli_query($cona,$sql);

 
  $numresultados = mysqli_num_rows($result);
      if($numresultados ==0  ){
        echo '
        <hr style="width: 100%; height: 30px;" />
        <p  style="font: bold 18px sans-serif;width: 100%;align="center"; align="center"> Lo sentimos. No hay resultados para la busqueda.</p>
          <p> &nbsp; </p>
        <hr style="width: 100%; height: 30px;" />
       ';

                            }

else{
  while($row = mysqli_fetch_array($result)){


  echo '

  <hr style="width: 100%; height: 30px;" />

  <tr>
  <td>
  <div class="row">
        <div class="col-sm-6">
        <img height="300" width="500" src="data:image/jpeg;base64,' .base64_encode( $row['imagenDB'] ).' " >
          <p> &nbsp; </p>
          <p> &nbsp; </p>


</div>


<div class="col-sm-6">';



echo'

<h4><b>Objeto: ' .( $row['nombre'] ).' </b></h4>

<h4><b> Categoría: ' .( $row['categoria'] ).'  </b></h4>


  <h4><b>Encontrado en: ' .( $row['lugar'] ).' el:  ' .( $row['Cuando'] ).' </b> </h4> ';


  if($row['devuelto'] == 0){

    echo'
          <h4><b>
            Estado actual: Buscando a su dueño</b> <img src="img/boxs.png" class="img-circle-smaller"  width="40" height="40"> </h4> </h4>
    
<form  id="miFormPublicar2" action="buscador.php" method="post" autocomplete="off">
            <input type="hidden" name="holdingid"  value='.( $row['id'] ).' " />
            <p align="left"> <button type="submit" class="buttonin buttonin-small" name="perte" />¡Me pertenece!
            </button> </p>
            </form>

              ';

  }


else if($row['devuelto'] == 2){

    echo'
          <h4><b>
            Estado actual: Solicitado. En proceso de devolución.
            </b> <img src="img/transfer.png" class="img-circle-smaller"  width="40" height="40"> </h4> </h4>
              ';

  }

  else{
    echo '

      <h4><b>
       Estado actual: Ya se reencontró con su dueño  </b>  <img src="img/package (2).png" class="img-circle-smaller"  width="40" height="40"> </h4>
             ';

  }

echo'

</div>
</div>
  </td>
  </tr> ';
}//fin while
    }
}

if(isset($_POST['perte'])){



  $elida = $_POST['holdingid'];
  $sqlap = "UPDATE objetosperdidos SET devuelto='2' WHERE id= $elida";
  $sqlam = "UPDATE objetosperdidos SET solicitadoPor='$email' WHERE id= $elida";

  mysqli_query($cona,$sqlap);
  mysqli_query($cona,$sqlam);

  echo'<div class="formula">
      <p> &nbsp; </p>
      <h2>Perfecto</h2>
    <h3>   <p>
    Tu publicación se ha realizado exitosamente, agradecemos tu colaboración.
    </p></h3>
      <p> &nbsp; </p>
    <p align="center"> <a href="buscador.php"><button class="buttonin buttonin-index"/>Regresar</button></a> </P>

  </div>';

}

 mysqli_close($cona);
    ?>

 </div>

      
        <div id="modalice" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 align="center" class="modal-title">Tus publicaciones de objetos</h4>
            <h2>  <p align="center">Te mostraremos tus objetos publicados</p> </h2>
              </div>

              <div class="modal-body">

                <p> &nbsp; </p>
                <?php

                $cona = mysqli_connect("localhost","id2356929_steve","lalala");
                  if(!$cona){
                  die("IMPOSIBLE CONECTAR CON LA BASE DE DATOS" .mysqli_error());
                          }

             


                 if(isset($_POST['publicados'])){
                  
                 $sql = "SELECT * FROM objetosperdidos WHERE usuarioid LIKE '%$email%' ";
                 $result = mysqli_query($cona,$sql);
                 $numresultados = mysqli_num_rows($result);
                   
                 if($numresultados == 0 ){
                       echo '
                       <hr style="width: 100%; height: 30px;" />
                       <p  align="center"> Parece que no has publicado nada aún.</p>
                         <p> &nbsp; </p>
                       <hr style="width: 100%; height: 30px;" />
                      ';

                                           }

               else{
                 while($row = mysqli_fetch_array($result)){
                   if($row['devuelto'] == 0){

                     echo' <hr style="width: 100%; height: 30px;" />
                            <h4> Estado: Buscando a su dueño</h4>
                               ';

                   }
                   else{
                     echo '<hr style="width: 100%; height: 30px;" />
                          <h4> Estado: Ya se reencontró con su dueño</h4>
                           <img src="img/checked.png" class="img-circle-small"  width="40" height="40">
                           ';
                   }

                 echo '
                 <tr>
                 <td>


                 <h4> Objeto: ' .( $row['nombre'] ).' </h4>

                <h4> Categoría: ' .( $row['categoria'] ).' </h4>

               <h4>Encontrado en: ' .( $row['lugar'] ).' el  ' .( $row['Cuando'] ).' </h4>


               <img height="300" width="500" src="data:image/jpeg;base64,' .base64_encode( $row['imagenDB'] ).' " >
                 <p> &nbsp; </p>
                 <p> &nbsp; </p>


                 </td>
                 </tr> ';
               }
                   }

                 mysqli_close($cona);
}
               ?>


              </div>
              <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
     </div>
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



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- bootstrap Script Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
<!-- END bootstrap Script -->
<script src="js/index.js"></script>

<script>$(document).ready(function(){
    $('img').click(function(){
        $('select').val($(this).attr('alt'));
    });
}); </script>


<script>
$(function () {
    $('#mostrar').click(function(){
        $('#contenidoS').slideToggle();
    });
});

</script>



</body>
</html>