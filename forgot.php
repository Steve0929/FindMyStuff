<?php
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    {
        $_SESSION['message'] = "¡No existe ningún usuario registrado con esa dirección de correo!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data

        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Puedes revisar tu correo: <span>$email</span>"
        . " Hemos enviado un link de confirmación para cambiar tu contraseña.</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Cambio de contraseña... ';
        $message_body = '
        Hola '.$first_name.',

        Hemos recibido una solicitud de cambio de contraseña.

        Por favor abre el siguiente enlace para completar el cambio de contraseña:

        http://localhost/login-system/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<!-- bootstrap Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
crossorigin="anonymous">
<html>
<head>

  <title>Cambiar contraseña</title>
    <meta charset="UTF-8">
  <?php include 'css/css.html'; ?>
    <meta name="viewport" content="width=device-width">
</head>

<style>



body{

  background-color: #ddd;
}

input[type ="text" ],input[type ="password" ],input[type ="email" ],input[type ="file" ]{

  color: black !important;
}



.buttonin-index{
  width: 260px;

}

.formula{


       width: 80%;
       height: auto;
     max-width: 1500px;
padding: 30px;
         }
@media only screen and (max-device-width: 480px) {


 .formula{


        width: 100%;
        height: auto;
      max-width: 1500px;

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

<body>


    <p> &nbsp; </p>
    <div class="formula">
      <p align="center"> <h1>Cambiar tu contraseña:</h1> </p>

  <p > <em>Por favor ingresa tu correo electrónico para continuar con el proceso de recuperación de contraseña</em></p>

    <form action="forgot.php" method="post">
     <div class="field-wrap">

      <input type="email" required autocomplete="off"  placeholder="Dirección de correo" name="email"/>
    </div>


    <p align="center">   <button class="buttonin buttonin-index"/>Continuar</button></p>
    </form>
        <p> &nbsp; </p>
  </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>


</body>

</html>
