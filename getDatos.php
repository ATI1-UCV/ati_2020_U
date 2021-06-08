<?php
$ci = $_GET["ci"] ?? false;
if (!$ci or !file_exists($ci)) {
  http_response_code(404);
  die();
}

header('Content-Type: application/json');
echo file_get_contents("$ci/perfil.json");
?>

