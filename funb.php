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

// function smile($t) {
//     $arrPat = [
//         "/(\:\-\))|(\:\))/",
//         "/(\:\-\()|(\:\()/"
//     ];

//     $arrRep = [
//         "<img src='icons/smiling.png' width='16' height='16'>",
//         "<img src='icons/sad.png' width='16' height='16'>"
//     ];

//     return preg_replace($arrPat, $arrRep, $t);
    
// }

function smile($emodzi)
{
    return preg_replace(
        [
            '/\:\-{0,1}\)/',
            '/\:\-{0,1}\(/'
        ],
        [
            '😀',
            '🙁'
        ],
        $emodzi
    );
}

// function censor($text) {
    
//     $pat = "/питон|редиска/";

//     if (preg_match($pat, $text)) {
//         return "Данное слово запрещено в чате!";
//     } else {
//         return $text;
//     }
// }

function censor($text)
{
    return preg_match('/(дурак|редиска)/iu', $text) ? false : true;
}


function url_link($link) { // не может перейти по ссылке
    $arrPat = [
        
        '/https\:\/\/.*/',
        
    ];

    $arrRep =  [
              
        "<a href='$0'>перейти по ссылке</a>"
       
    ];

    return preg_replace($arrPat, $arrRep, $link);
}



