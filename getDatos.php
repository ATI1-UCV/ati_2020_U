<?php
header('Content-type: application/json');
if(isset($_COOKIE["contador"])) {
    setcookie("contador", $_COOKIE["contador"] + 1, time() + 60 * 60);
} else {
    setcookie("contador", 1, time() + 60 * 60);
}
$ci = $_GET["ci"];
$len = $_GET["len"] ?? "es";
setcookie("len", $len, time() + 60 * 60);
$file = json_decode(file_get_contents($ci . "/perfil.json"));
$file = (array) $file;
$files = glob($ci . "/*");
foreach ($files as $filename) {
	if ($filename != $ci . "/perfil.json") {
        $file["imagen"] = $filename;
	}
}
echo json_encode($file);
?>