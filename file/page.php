<?php

header('Content-typ: content="text/html; charset=UTF-8');


$html = file_get_contents('https://www.ilrestodelcarlino.it/politica/elezioni-comunali-risultati-1.4615136');






function get_text_between_tags($string, $tagname) {
    $pattern = "/<$tagname\b[^>]*>(.*?)<\/$tagname>/is";
    preg_match_all($pattern, $string, $matches);
    if(!empty($matches[1]))
        return $matches[1];
    return array();
}




/*
function get_text_between_tags($string, $tagname) {
    $dom = new DOMDocument();
    $dom->loadHTML($string);
    $tags = $dom->getElementsByTagName($tagname);
    $out = array();
    $length = $tags->length;
    for( $i=0; $i<$length; $i++) $out[] = $tags->item($i)->nodeValue;
    return $out;
}*/



//$tmp = "<ORGANIZATION>Head of Pekalongan Regency</ORGANIZATION>, Dra. Hj.. Siti Qomariyah , MA and her staff were greeted by <ORGANIZATION>Rector of IPB</ORGANIZATION> Prof. Dr. Ir. H. Herry Suhardiyanto , M.Sc. and <ORGANIZATION>officials of IPB</ORGANIZATION> in the guest room.";

$div = get_text_between_tags($html, "p");

print_r( get_text_between_tags($html, "p"));