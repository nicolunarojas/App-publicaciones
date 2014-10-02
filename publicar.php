<?php 

//Postear un mensaje

//Conectar BD
include("includes/database.php");  
conectarse();

$username = $_POST['usr'];
$postear = $_POST['postear'];
$fecha = $_POST['fecha'];

//Soluciona error de las comillas en ingles
$post = addslashes($postear);

$query_publicar = "INSERT INTO `posts`(`usuario`, `posts`, `fecha`) VALUES ('".$username."', '".$post."', now())";

$result_publicar=mysql_query($query_publicar,$link);

if(mysql_affected_rows()){
	header("Location: main.php");
} else {
	echo "Ocurrio un error al realizar el post";
}

//Cerrrar conexion a la BD
mysql_close($link);

 ?>