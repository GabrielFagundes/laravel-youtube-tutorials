<?php

function cutString($string){

    $stringFormatted = $string;

    if (strlen($string) > 100)
        $stringFormatted = substr($string, 0, 97) . '...';

    return $stringFormatted ;

}
