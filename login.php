<?php
 



/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
$resis = false;

if ( $result->num_rows == 0 ){ // User doesn't exist
   //  $_SESSION['message'] = " Oops No recordamos tener un usuario registrado con
 //    esa dirección de correo. :s";
 //    header("location: error.php");
 
    echo   '

    <!-- Modal -->
    <div id="modalicer" class="modal fade" role="dialog">
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

                    <div class="divis errorShake">  <input type="email"  id="email" required autocomplete="off" name="email"  placeholder="Dirección de correo"

                       />

                            <i class=" iconosFormu fa fa-vcard"> </i>



                   </div>

                        <div class="divis errorShake">  <input type="password" id="password" required autocomplete="off" name="password" placeholder="Contraseña" />
                            <i class=" iconosFormu fa fa-key"> </i>

                        </div>

                          <div style="margin-bottom:10px">  <button class="button button-block" id="loginbut" aria-form="miForm"  name="login" />Entrar</button>  </div>

                         <p style="float:right; color:grey; margin-bottom:10px;"><a href="forgot.php">¿Recuperar contraseña?</a></p>
                            <p> &nbsp; </p>
                            <div > <p class="errorCredenciales3"> No recordamos tener ningún usuario registrado con esa dirección de correo.</p> </div>

                </form>
              </section>
      </div>

      </div>
    </div>
                   ';


}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = "Has ingresado a tu cuenta.";   // BUG1
        header("location: profile.php");
    }
    else {


      //  $_SESSION['message'] = "La contraseña es incorrecta";
        //  header("location: error.php");

echo   '

<!-- Modal -->
<div id="modalicer" class="modal fade" role="dialog">
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

                <div class="divis errorShake">  <input type="email"  id="email" required autocomplete="off" name="email"  placeholder="Dirección de correo"

                   />

                        <i class=" iconosFormu fa fa-vcard"> </i>



               </div>

                    <div class="divis errorShake">  <input type="password" id="password" required autocomplete="off" name="password" placeholder="Contraseña" />
                        <i class=" iconosFormu fa fa-key"> </i>

                    </div>

                      <div style="margin-bottom:10px">  <button class="button button-block" id="loginbut" aria-form="miForm"  name="login" />Entrar</button>  </div>

                     <p style="float:right; color:grey; margin-bottom:10px;"><a href="forgot.php">¿Recuperar contraseña?</a></p>

                        <div > <p class="errorCredenciales2">Contraseña incorrecta</p> </div>

            </form>
          </section>
  </div>

  </div>
</div>
               '   ;



    }
} 
   ?>