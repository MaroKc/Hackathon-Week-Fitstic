<?php
header('Content-typ: content="text/html; charset=UTF-8');
$rawText = strtolower("Sto cercando su google perchè google è il migliore");
//$rawText = strtolower($_REQUEST['testo']);

//echo $rawText;

$file_js = json_decode(file_get_contents("stop-word.json"), true);
$noWord = $file_js['stop-word'];

$rawText = str_replace(array(".",",",":","?","!"), "", $rawText);

foreach($noWord as $oneWord) 
    $rawText = preg_replace('/\b'.$oneWord.'\b/', "-", $rawText);


$saneText = trim($rawText);

$textSplitted = explode(" ", $saneText);

$world = array();


foreach($textSplitted as $tmp){

    if($tmp == "-")
        continue;

    if(isset($world[$tmp]))
        $world[$tmp] ++;
    else
        $world[$tmp] = 1;
}

arsort($world);

echo (json_encode($world));

/*
exit();
echo "<pre>";
print_r($world);
echo "</pre>";
*/
