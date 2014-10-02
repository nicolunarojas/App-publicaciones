<?php

include_once("includes/database.php");

$link=Conectarse();

$query = "SELECT `usuario`, `posts`, `likes`, `dislikes` FROM `posts` WHERE 1";

$result=mysql_query($query,$link);


if ($fila = $usuario = mysql_fetch_array($result)){
	echo "<p class='publicaciones'> \n";
	   	do {
	   		echo "
	    	".$usuario['usuario']."
	    	"; 
	    	echo "
	    	".$fila['posts']."
	    	";
	    	echo "</br>";
	    	echo "</br>";
	   	} while ($fila = $usuario = mysql_fetch_array($result)); 
	   		echo "</p>";
		} else { 
			echo "<p>¡No hay ningún post!</p>"; 
}

?>