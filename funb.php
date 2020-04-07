<?php
function bb_code($text) {
    
    $arrPat = [
        "/\[b\](.*)\[\/b\]/i",
        "/\[i\](.*)\[\/i\]/i",
        "/\[u\](.*)\[\/u\]/i",
        '/\[IMG\](.*)\[\/IMG\]/',
    ];

    $arrRep =  [
        "<b>$1</b>",
        "<i>$1</i>",
        "<u>$1</u>",
        "<img src='$1'>"
    ];

    return preg_replace($arrPat, $arrRep, $text);
}

function smile($t) {
    $arrPat = [
        "/(\:\-\))|(\:\))/",
        "/(\:\-\()|(\:\()/"
    ];

    $arrRep = [
        "<img src='icons/smiling.png' width='16' height='16'>",
        "<img src='icons/sad.png' width='16' height='16'>"
    ];

    return preg_replace($arrPat, $arrRep, $t);
    
}

function cens($text) {
    
    $pat = "/питон|редиска/";

    if (preg_match($pat, $text)) {
        return "Данное слово запрещено в чате!";
    } else {
        return $text;
    }
}

function md($text) {
    $arrPat = [
        '/\*\*(.*?)\*\*/',
        '/\*(.*?)\*/',
    ];

    $arrRep =  [
        "<b>$1</b>",
        "<i>$1</i>"
    ];

    return preg_replace($arrPat, $arrRep, $text);
}

function url_img($img) {
    $arrPat = [
        '/https\:\/\/.*\.(png|jpg|jpeg|gif)/i',
        '/http\:\/\/.*\.(png|jpg|jpeg|gif)/i',
    ];

    $arrRep =  [
  
        "<img src='$0'>",
    ];

    return preg_replace($arrPat, $arrRep, $img);
}

// function url_link($link) { // не может перейти по ссылке
//     $arrPat = [
        
//         '/https\:\/\/.*/',
        
//     ];

//     $arrRep =  [
              
//         "<a href='$0'>перейти по ссылке</a>"
       
//     ];

//     return preg_replace($arrPat, $arrRep, $link);
// }


function saveXML($userAgent, $remoteAddr, $name, $mess, $date)
{
    $str = <<<XML
    \n<msg>
    <userAgent>$userAgent</userAgent>
    <addr>$remoteAddr</addr>
    <name>$name</name>
    <mess>$mess</mess>
    <date>$date</date>
    </msg>
XML;

    return file_put_contents('chat.xml', $str, FILE_APPEND);
}


function readXML($f)
{

    preg_match_all(
        '/<msg>.*?<userAgent>(.*?)<\/userAgent>.*?<addr>(.*?)<\/addr>.*?<name>(.*?)<\/name>.*?<mess>(.*?)<\/mess>.*?<date>(.*?)<\/date>.*?<\/msg>/uis',
        file_get_contents($f), $matches
    );
  
    $arr = [];

    foreach ($matches[1] as $key => $value) {  
        $arr[$key]['userAgent'] = $value;
        $arr[$key]['addr'] = $matches[2][$key];
        $arr[$key]['name'] = $matches[3][$key];
        $arr[$key]['mess'] = $matches[4][$key];
        $arr[$key]['date'] = $matches[5][$key];
    }

    return $arr;
}
