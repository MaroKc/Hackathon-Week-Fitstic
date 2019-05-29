<?php

include_once("main.php");

$rawText = strtolower($_REQUEST['testo']);

echo json_encode(filtro_testo($rawText));

