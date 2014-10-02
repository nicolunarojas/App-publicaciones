<?php

/* Funcion que redirige al usuario a la pagina de publicaciones en caso de ya haber inicido sesion */

function redirect() {
    header('location:main.php');
}

?>


<?php
	/* Incia sesion o continua la ya iniciada */ 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="es" id="log-in">
	<head>
		<title>Iniciar sesión</title>
	 	
	 	<link rel="stylesheet" type="text/css" href="style.css"/>
	 	<script type="text/javascript"></script>
	 	<meta name="viewport" content="width=device-width, user-scalable=no">

	 	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	 	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	</head>
	
	<body id="registro-login">

		<?php
		/* Con esto validamos si existe una id en nuestros cookies para continuar con la sesion iniciada y ejecuta la funcion redirect */
		  if(isset($_SESSION['user_id'])){
		   redirect();
		  }
		?>

		<div class="container">
			<figure class="logo-logs">
				<img src="images/logo.png" alt="Say-it!" title="Say-it!">
			</figure>
			
			<section class="campos-log">

			<form id="frmlogin" name="frmlogin"  method="POST" action="validar_usuario.php">

				<h3 class="etiqueta-campos">Nombre de usuario <br /> (prueba: tyrone, diana, william, john, violet, ryan) </h3>			
				<input class="campos" type="text" name="usuario" id="usuario" class="required" maxlength="50">
				<h3 class="etiqueta-campos">Contraseña (prueba: 12345) </h3>
				<input class="campos" type="password" name="password" id="password" class="required"  maxlength="50">
				<input class="boton" id="boton-logs" type="submit" name="enviar" value="Iniciar sesión" >
				<br/>
				<p class="ask-log">¿No tienes cuenta? <a class="call-to-action" href="registro.php">Registrate</a></p>

				<?php

    			//Mostrar errores de validacion de usuario en esta misma pantalla usando mensajes de Javascript
				if( isset( $_POST['msg_error'] ) )
				{
					switch( $_POST['msg_error'] )
					{
						case 1:
							?>
							<script type="text/javascript"> 
								alert("El usuario o password son incorrectos.");
							</script>
							<?php
						break;          
						case 2:
							?>
							<script type="text/javascript"> 
								alert("La seccion a la que intentaste entrar esta restringida.\n Solo permitida para usuarios registrados.");
							</script>
							<?php       
						break;
            		}//Fin switch
       			}
        		?>
			</form>
			</section>

		</div>


	</body>
</html>