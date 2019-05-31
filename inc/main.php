<?php

header('Content-typ: content="text/html; charset=UTF-8');
define("MAX_WORD", 15);

function filtro_testo($text) {

    $saneText = sanificate_text($text, $_REQUEST['leng']);

    $arrayJSON = create_JSON($saneText);

    $txtBOLD = text_bold($text, $arrayJSON);

    return array('stat' => $arrayJSON, 'bold' => $txtBOLD);
}


function text_bold($text, $word){

    foreach($word as $oneWord)
        $text = preg_replace('/\b'.$oneWord['text'].'\b/', '<strong>'.$oneWord['text'].'</strong>', $text);


    $text = ucfirst($text);

    return($text);

}

function sanificate_text($textRAW, $lang) {

    $file_js = json_decode(file_get_contents("stop-word.json"), true);
    $noWord = $file_js[$lang];
    
    $textRAW = str_replace(array(".",",",":","?","!","'",'"'), "", $textRAW); 
    $textRAW = trim($textRAW);

    $textSplitted = explode(" ", $textRAW);

    foreach($noWord as $oneWord) 
        while(($key = array_search($oneWord, $textSplitted)) !== false)
            unset($textSplitted[$key]);


    return $textSplitted;

}

function create_JSON($textSplitted) {
    
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
            array_push( $arrayJSON, array('text' => $key, 'count' => $value) );


    return $arrayJSON;

}

function get_text_between_tags($textRAW, $tag) {
    $filtro = "/<$tag\b[^>]*>(.*?)<\/$tag>/is";
    preg_match_all($filtro, $textRAW, $ris);
    if(!empty($ris[1]))
        return $ris[1];
    return array();
}

function save_DB($text, $wordObj, $tit = NULL) {

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "FIND_Fix";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO ricerche (titolo, testo, parole) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $tit, $text, $word);

    // set parameters and execute
    $stmt->execute();

    $stmt->close();
    $conn->close();
}