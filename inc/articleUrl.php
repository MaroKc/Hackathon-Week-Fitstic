<?php
include_once("main.php");

$url = $_REQUEST['testo'];

$html = file_get_contents($url);

$contRAW = get_text_between_tags($html, "p");

$titoloRAW = explode("-", get_text_between_tags($html, "title")[0] );

$content = "";

foreach($contRAW as $tmp)
    $content = $content . strip_tags($tmp) . " ";

$ret = filtro_testo(strtolower($content));
$ret['titolo'] = $titoloRAW[0];
echo json_encode($ret);
