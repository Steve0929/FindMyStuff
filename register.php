<?php

/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Check if user with that email already exists 

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0

if ( $result->num_rows > 0 ) {
 
    $_SESSION['message'] = 'Ya existe un usuario registrado con esa dirección de correo. ';
    header("location: error.php");
    die();
}

else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) "
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 1; // 1 porque no estamos enviando emails...0 until user activates their account with 
                                  //verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        
     //   $_SESSION['message'] =
        
      //  "Se ha enviado un link de confirmación a: $email Por favor revisa tu correo y verifica
             //    tu cuenta." 

        // Send registration confirmation link (verify.php)
      //  $to      = $email;
       // $subject = 'Verificación de cuenta (Tcorp.com)';
       // $message_body = '
       // Hola '.$first_name.',

       // Gracias por registrarte.

     //   Por favor abre el siguiente enlace para activar tu cuenta:

     //   http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;

     //   mail( $to, $subject, $message_body );
     
   $_SESSION['message'] = "¡Bienvenido a la plataforma!";
  header("location: profile.php");
die();


    }

    else {
        $_SESSION['message'] = '¡Error en el registro!';
        header("location: error.php");
die();
    }

}