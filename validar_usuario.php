<?php

/**
 * Inicio de sesion
 *
 * Referencia: http://gonzasilve.wordpress.com/2012/05/23/autenticacion-de-usuarios-en-php-y-mysql/
 *
 */

//conectar BD
include("includes/database.php"); 
conectarse();
 
$user = $_POST['usuario'];
$pass = $_POST['password'];
//Encripto la contraseña con el algoritmo de md5 y la guardo en una variable
$pass_encrypt = md5($pass);

$query = "SELECT id FROM usuarios
        WHERE usuario = '".$user."'
        AND password = '".$pass_encrypt."' ";  
$result = mysql_query($query, $link); 

$user_id = "";
 
//Si existe al menos una fila
if( $fila=mysql_fetch_array($result) )
{       
    //Obtener el Id del usuario en la BD        
    $user_id = $fila['id'];
    //Iniciar una sesion de PHPs
    session_start();
    //Crear una variable para indicar que se ha autenticado
    $_SESSION['autenticado'] = 'SI';
    //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
    $_SESSION['user_id'] = $user_id;
    //CODIGO DE SESION
     
    //Crear un formulario para redireccionar al usuario y enviar oculto su Id 
?>

<form name="formulario" method="post" action="main.php">
    <input type="hidden" name="idUsr" value='<?php echo $user_id ?>' />
</form>

<?php
    }
    else {
        //En caso de que no exista una fila crear un formulario para redireccionar al usuario a la pagina de login mostrando el error efectuado
?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="1">
        </form>
<?php
    }
?>
                     
<script type="text/javascript"> 
	//Envia los datos de los mensajes de error a nuestra pagina de inicio de sesion
	document.formulario.submit();
</script>