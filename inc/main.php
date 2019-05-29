<?php

header('Content-typ: content="text/html; charset=UTF-8');
define("MAX_WORD", 15);

function filtro_testo($text) {

    $saneText = sanificate_text($text);

    $arrayJSON = create_JSON($saneText);

    $txtBOLD = text_bold($text, $arrayJSON);

    return array($arrayJSON, $txtBOLD);
}

function text_bold($text, $word){

    foreach($word as $oneWord)
        $text = preg_replace('/\b'.$oneWord['word'].'\b/', '<strong>'.$oneWord['word'].'</strong>', $text);


    $text = ucfirst($text);

    return($text);

}

function sanificate_text($textRAW) {

    $file_js = json_decode(file_get_contents("stop-word.json"), true);
    $noWord = $file_js['stop-word'];
    
    $textRAW = str_replace(array(".",",",":","?","!","'"), "", $textRAW);
    
    foreach($noWord as $oneWord) 
        $textRAW = preg_replace('/\b'.$oneWord.'\b/', "-", $textRAW);
    
    
    $saneText = trim($textRAW);

    //echo $saneText;

    return $saneText;

}

function create_JSON($textSANE) {

    $textSplitted = explode(" ", $textSANE);
    
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

    $impWord = array_chunk($world, MAX_WORD, true);
    
    $arrayJSON = array();

    foreach($impWord[0] as $key => $value)
        if($value > 1)
            array_push( $arrayJSON, array('word' => $key, 'occ' => $value) );


    return $arrayJSON;

}

function get_text_between_tags($textRAW, $tag) {
    $filtro = "/<$tag\b[^>]*>(.*?)<\/$tag>/is";
    preg_match_all($filtro, $textRAW, $ris);
    if(!empty($ris[1]))
        return $ris[1];
    return array();
}