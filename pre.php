<?php
$sitio = "<li id=\"sitio\" class=\"logo center col\"> " .
        $configcontent["sitio"][0] . "<small>" .
        $configcontent["sitio"][1] . "</small>" .
        $configcontent["sitio"][2] . "</li>";

$saludo = "<li id=\"saludo\" class=\"center col\"> " .
        $configcontent["saludo"] . " " . $nombre . "</li>";

$dropdown = "<li class=\"col-1 center\">
        <div class=\"dropdown\">
            <button class=\"btn btn-light dropdown-toggle\" type=\"button\" id=\"dropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"> " .
        $len . "</button> 
            <div class=\"dropdown-menu drop\" id=\"drop-items\" aria-labelledby=\"dropdown\">
                <button class=\"dropdown-item\" id=\"es\" value=\"es\">es</button>
                <button class=\"dropdown-item\" id=\"en\" value=\"en\">en</button>
                <button class=\"dropdown-item\" id=\"pt\" value=\"pt\">pt</button>
            </div>
        </div>
        </li>";
?>