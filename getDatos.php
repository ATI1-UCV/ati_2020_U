
<?php 
    $ci = $_GET['ci'];
    $estudiante_json = file_get_contents($ci."/perfil.json");
    $decoded_estudiante_json = json_decode($estudiante_json);
    echo "<pre>";
    echo $decoded_estudiante_json;
    echo "</pre>";

    if(!isset($_COOKIE['len'])){
        $value = $_GET['len'] ? $_GET['len'] : 'es';
		setcookie("len", $value);
	}

    if(isset($_COOKIE['contador'])){
		$_COOKIE['contador'] += 1;
	}else{
		$value = 1; 
		setcookie("contador", $value);
	}
    
?>
<script>
      const len = getCookie("len");
      console.log(len);
</script>