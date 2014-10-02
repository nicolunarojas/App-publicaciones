<?php
 
//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['user_id'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error
?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="2">
        </form>
        <script type="text/javascript"> 
            document.formulario.submit();
        </script>
<?php
}
 
    //Conectar BD
    include("includes/database.php");  
    conectarse();
 
    //Sacar datos del usuario que ha iniciado sesion
    $query = "	SELECT  nombre,apellido,id,usuario
            	FROM usuarios
            	WHERE id = '".$_SESSION['user_id']."'";         
    $result = mysql_query($query); 
 
    $nombre_completo = "";
    $username = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysql_fetch_array($result) )
        $nombre_completo = $fila['nombre']." ".$fila['apellido'];
    	$username = $fila['usuario'];


    //Sacar los datos de los posts de los usuarios
    $query_post = " SELECT usuarios.usuario, usuarios.nombre, usuarios.apellido, posts.posts 
    				FROM usuarios
    				RIGHT JOIN posts 
    				ON usuarios.usuario=posts.usuario
    				ORDER BY fecha DESC LIMIT 0 , 30";
	$result_post=mysql_query($query_post);

	$nombre_completo_amigo = "";
    $username_amigo = "";
    $post = "";

     
//Cerrrar conexion a la BD
mysql_close($link);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Say-it!</title>
 	
 	<link rel="stylesheet" type="text/css" href="style.css"/>
 	<script type="text/javascript"></script>
 	<meta name="viewport" content="width=device-width, user-scalable=no">

 	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>

        <!-- Contenido del sitio -->

		<header>
		<div class="container">
			<figure class="logo">
				<img src="images/logo.png" alt="Say-it!" title="Say-it!">
			</figure>
			<div id="usuario-header">
				<h4><?php echo $nombre_completo ?>
				<a id="logout-link" href="logout.php">
					<figure id="logout">
						<img src="images/logout_icon.png" alt="Cerrar sesión" title="Cerrar sesión">
					</figure>
				</a> 
				</h4>
			</div>
		</div>
		</header>
		
		<section id="contenido">
			
			<div id="portada" style="background: url('images/usuarios/<?php echo $username ?>_cover.jpg');" ></div>

			<div id="contenedor-usuario" class="container">
				<figure id="foto-perfil">
					<img src="images/usuarios/<?php echo $username ?>.jpg" alt="<?php echo $nombre_completo ?>" title="<?php echo $nombre_completo ?>">
				</figure>
				<h2 class="nombre-usuario"><?php echo $nombre_completo ?></h2>
			</div>

			<div id="contenedor-principal" class="container">

				<!-- Referencia del popup: http://stackoverflow.com/questions/19064987/html-css-popup-div-on-text-click -->

				<a class="boton" type="text/javascript" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('oscurecer').style.display='block'">
					Escribe algo!
				</a>

				<div id="light" class="contenido-mensaje-input">
					<figure class="foto-amigo">
						<img src="images/usuarios/<?php echo $username ?>.jpg" alt="<?php echo $nombre_completo ?>" title="<?php echo $nombre_completo ?>">
					</figure>
					
					<h2 class="nombre-amigo"><?php echo $nombre_completo ?></h2>
					
					<form action='publicar.php' method='post' name='publicar'>
						<textarea id="input-mensaje" name="postear"></textarea>
						<input type="hidden" name="usr" value='<?php echo $username?>' />
						<input type="hidden" name="fecha" value='<?php date('Y-m-d H:i:s');?>' />
						<input type='submit' class="boton" name='ok' id='ok' value='Enviar' href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('oscurecer').style.display='none'"/>
					</form>


					<!-- <a class="boton" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('oscurecer').style.display='none'">Enviar</a> -->
				</div>
        		
        		<div id="oscurecer" class="fondo-negro-transparente"></div>

				<div id="caja-publicaciones">
				<?php 
					if ($fila_post = mysql_fetch_array($result_post)){
					   	do {
					   		//Creo variables para mostrar los datos organizados de los usuarios
					   		$nombre_completo_amigo = $fila_post['nombre']." ".$fila_post['apellido'];
							$username_amigo = $fila_post['usuario'];
							$post = $fila_post['posts'];
					   		
					   		//Imprimo los valores de los posts, en este caso se crea un contenedor <article> para cada post
					   		echo "<article class='contenedor-amigo'>";
					   		echo "<figure class='foto-amigo'>";
					   		echo "<img src='images/usuarios/$username_amigo.jpg' alt='$nombre_completo_amigo' title='$nombre_completo_amigo'>";
					    	echo "</figure>";
					    	echo "<h2 class='nombre-amigo'>$nombre_completo_amigo</h2>";
					    	echo "<br />";
					   		echo "<p class='publicaciones'>'".$post."'</p>";
					   		echo "</article>";
					   		echo "<br />";
					   	} while ($fila_post = mysql_fetch_array($result_post));

						} else { 
							echo "<p>¡No hay ningún post!</p>"; 
					}
				 ?>									
				</div>
			</div>
		</section>
</body>
</html>