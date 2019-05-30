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

/*
function getSize($percent) {
     
    $size = "font-size: ";
 
    if ($percent >= 99)
        $size .= "4em;";
    else if ($percent >= 95)
        $size .= "3.8em;";
    else if ($percent >= 80)
        $size .= "3.5em;";
    else if ($percent >= 70)
        $size .= "3em;";
    else if ($percent >= 60)
        $size .= "2.8em;";
    else if ($percent >= 50)
        $size .= "2.5em;";
    else if ($percent >= 40)
        $size .= "2.3em;";
    else if ($percent >= 30)
        $size .= "2.1em;";
    else if ($percent >= 25)
        $size .= "2.0em;";
    else if ($percent >= 20)
        $size .= "1.8em;";
    else if ($percent >= 15)
        $size .= "1.6em;";
    else if ($percent >= 10)
        $size .= "1.3em;";
    else if ($percent >= 5)
        $size .= "1.0em;";
    else
        $size .= "0.8em;";

    return $size;
}
 
function showCloud($word, $show_freq = false)
{
    $max = $word[0]['occ'];
    $out = "";

    foreach ($word as $oneWord)
    {
        if(!empty($oneWord['word']))
        {
            $size = getSize(($oneWord['occ'] / $max) * 100);
            if($show_freq) $disp_freq = "(".$freq['occ'].")"; else $disp_freq = "";

            $out .= "<span style='font-family: Tahoma; padding: 4px 4px 4px 4px; letter-spacing: 3px; $size'>
                        &nbsp; {".$oneWord['word']."}<sup>$disp_freq</sup> &nbsp; </span>";
        }
    }

    return $out;
}
*/