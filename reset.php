<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'db.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    {
        $_SESSION['message'] = "El enlace no es válido :(";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Lo sentimos, la verificación falló.";
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Cambiar contraseña</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="formula">

          <h1>Crea una contraseña nueva</h1>

          <form action="reset_password.php" method="post">

          <div class="field-wrap">
            <label>
              Contraseña nueva<span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Confirmar contraseña nueva<span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
          </div>

          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">
          <input type="hidden" name="hash" value="<?= $hash ?>">

          <button class="button button-block"/>Continuar</button>

          </form>

    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
