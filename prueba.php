<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php //Leer los archivos json
	//Recibimos len con un get
	$len = $_POST['len'] | 'es';
	switch ($len) {
		case 'es':
			$data = file_get_contents("confphp/configES.json");
			break;
		case 'en':
			$data = file_get_contents("confphp/configEN.json");
			break;
		case 'pt':
			$data = file_get_contents("confphp/configPT.json");
			break;
	}

	$language = json_decode($data, true);
	$js_code = 'console.log(' . json_encode($language, JSON_HEX_TAG) . ');';
	
	?>
    <p><?php echo "texto de php"?></p>
</body>
</html>