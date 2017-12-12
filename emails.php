<?php


$string = file_get_contents( "http://www.petbr.com.br/clasvamot.asp" );
// poderia ser um string ao invés de file_get_contents().

$list = preg_match_all(
    '/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi',
    $string,
    $matches
);
print '<pre>';

    foreach ( $matches[0] as $email ) {
        //echo $email . "\r\n" ;
    }


//print_r( $matches );
print '</pre>';

$string = file_get_contents( "emails.txt" );
    $emails = explode( "\r\n" , $string ) ;
    print_r($emails) ;