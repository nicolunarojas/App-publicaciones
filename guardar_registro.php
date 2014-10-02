<?php

/**
 * Registro
 *
 * Referencia: http://gonzasilve.wordpress.com/2012/05/23/autenticacion-de-usuarios-en-php-y-mysql/
 *
 */

include_once("includes/database.php");

$link=Conectarse();
$name = $_POST['name'];
$surname= $_POST['surname'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$query = sprintf("SELECT usuario FROM usuarios WHERE usuarios.usuario = '%s'", $username);

$result=mysql_query($query,$link);

if(mysql_num_rows($result)){
		//En caso de que ya exista un usuario registrado con el mismo nombre crea, un formulario para redireccionar al usuario a la pagina de registro mostrando el error
	?>
        <form name="formulario" method="post" action="registro.php">
            <input type="hidden" name="status_registro" value="1">
        </form>
	<?php
} else {

	mysql_free_result($result);

	if($pass1!=$pass2) {
		//En caso de que las contrasenas no coincidan, crea un formulario para redireccionar al usuario a la pagina de registro mostrando el error
	?>
        <form name="formulario" method="post" action="registro.php">
            <input type="hidden" name="status_registro" value="2">
        </form>
	<?php
	} else {

		$pass_encrypt = md5($pass1);
		$query = sprintf("INSERT INTO usuarios (nombre, apellido, correo, usuario, password)
		VALUES ('%s', '%s', '%s', '%s', '%s')", $name, $surname, $email, $username, $pass_encrypt);

		$result=mysql_query($query,$link);

		if(mysql_affected_rows()){
			header("Location: index.php");
		} else {
			//En caso de que ocurra un error agregando los datos, crea un formulario para redireccionar al usuario a la pagina de registro mostrando el error
		?>
	        <form name="formulario" method="post" action="registro.php">
	            <input type="hidden" name="status_registro" value="3">
	        </form>
		<?php
		}
	}
}

?>

<script type="text/javascript"> 
	//Envia los datos de los mensajes de error a nuestra pagina de registro
    document.formulario.submit();
</script>