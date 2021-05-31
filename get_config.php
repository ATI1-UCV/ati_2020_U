<?php
  function get_config($language = "es"){
    $conf_dir = "./conf/";

    $session_lang = isset($_SESSION["language"]);

    // if no parameter and language defined
    if(!$language && $session_lang){
      $language = $_SESSION["language"];
    }
  
    // If no language from parameter, and no session_lang
    // define default language
    if(!$language && !$session_lang){
      $_SESSION["language"] = "es"; 
      $language = "es";
    }

    if($language === "es"){
      $config_json_string = file_get_contents($conf_dir . "configES.json");
    }elseif ($language === "en"){
      $config_json_string = file_get_contents($conf_dir . "configEN.json");
    }elseif ($language === "pt"){
      $config_json_string = file_get_contents($conf_dir . "configPT.json");
    }

    if (!$config_json_string){
        echo "<p>Unable to open language.json<p>";
    }

    $config = json_decode($config_json_string, true);
    return $config;
  }
?>
