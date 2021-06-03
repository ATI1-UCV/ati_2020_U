<?
// Input: ci studiante
// Output: json response

// Response header initial configuration
header('Content-type:application/json;charset=utf-8');

$student = $_GET["ci"];
if(!$student){
  echo json_encode(array("errorMsg" => "No especificó parámetro ci"));
  // TODO especificar codigo error en el header
  http_response_code(400);
  exit;
}

$json_perfil_string = file_get_contents("./" . $student .  "/perfil.json");
if (!$json_perfil_string) {
  echo json_encode(array("errorMsg" => "No se pudo abrir archivo json del estudiante"));
  http_response_code(400);
  exit;
}

echo $json_perfil_string;
?>
