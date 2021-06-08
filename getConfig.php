<?php
$len = $_GET["len"] ?? "es";
$configs = [
  "en" => "configEN.json",
  "es" => "configES.json",
  "pt" => "configPT.json",
];

$file_name = $configs[$len];

header('Content-Type: application/json');
echo file_get_contents("conf/$file_name");
?>

