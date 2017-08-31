<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Success</title>
  <?php include 'css/css.html'; ?>
<style>
a{
  text-decoration: none !important;
}

a:hover {
text-decoration: none !important;
}
  .buttonin-index{
    width: 200px;
  }


        .formula{


               width: 100%;


                 }


    @media only screen and (max-device-width: 480px) {

      .formula{


             width: 100%;
             height: auto;
           max-width: 1500px;

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


              .button-block{

              width: 100%;

              height: 100%;
              display: block;

              }
              .buttonin {

          }

              .buttonin-index{
                width: 220px;

              }

   }

</style>


</head>
<body>
<div class="formula">
    <p> &nbsp; </p>
    <h1><?= '¡Perfecto!'; ?></h1>
<h3>    <p align="center">
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];
    else:
        header( "location: index.php" );
    endif;
    ?>
   </p></h3>
      <p> &nbsp; </p>
    <p align="center"> <a href="index.php"><button class="buttonin buttonin-index"/>Inicio</button></a> </P>
</div>
</body>
</html>
