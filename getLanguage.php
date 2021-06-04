<?php
	session_start();
	$lenguaje 		= $_GET["len"];
	if($lenguaje == 'en'){
		$_SESSION['len'] 	= $lenguaje;
		echo  file_get_contents("conf/configEN.json");
	}elseif($lenguaje == 'pt'){
		$_SESSION['len'] 	= $lenguaje;
		echo  file_get_contents("conf/configPT.json");
	}else{
		$_SESSION['len'] 	= $lenguaje;
		echo  file_get_contents("conf/configES.json");
	}
?>