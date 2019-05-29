<?php
include_once("main.php");

$url = $_REQUEST['url'];

$html = file_get_contents($url);

$contRAW = get_text_between_tags($html, "p");

$content = "";

foreach($contRAW as $tmp)
    $content = $content . $tmp . " ";

echo (filtro_testo($rawText));
