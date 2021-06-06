<?php
	function get_datos(){
		// See if ci is set on URL
		if (isset($_GET['ci'])){
			$cedula = $_GET['ci'];
			$perfil = file_get_contents("./".$cedula."/perfil.json");
			
			return $perfil;

		}else{
			return null;
		}
	}


	$result = get_datos();
	echo $result;

?>