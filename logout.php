<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>¡Adiós!</title>
  <?php include 'css/css.html'; ?>
</head>
<style>

body {
  line-height: 0;

     margin: auto;
     padding-top: 0px;
     max-width:2000px;
     width: 100%;


 }

a{
  text-decoration: none !important;
}

a:hover{
  text-decoration: none !important;
}

.buttonin-index{
  width: 200px;

}




 @media only screen and (max-device-width: 480px) {



.container-fluidend {
                padding-top: 50px;
                padding-bottom: 150px;
 opacity: 1;
 width: 100%;

                }
  .formula{


         width: 80%;
         height: auto;
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


           }

           .buttonin-index{
             width: 220px;

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


<body>
    <div class="formula">
          <p> &nbsp; </p>
       <h1> <p align="center"> ¡Perfecto! </p></h1>

          <h3><p align="center"> <em>Has cerrado tu sesión exitosamente.</em></p></h3>
            <p> &nbsp; </p>
            <p align="center">    <a href="index.php"><button class="buttonin buttonin-index"/>Inicio</button></a> </P>



    </div>
</body>
</html>