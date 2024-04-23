<?php
function GetBanknoty(){
    $plik=fopen("kasa.txt","r");
    $linie=explode("\n",fread($plik,filesize("kasa.txt")));
    $banknoty=[];
    foreach ($linie as $key => $value) {
        $value=explode(":",$value);
        $banknoty[$value[0]]=$value[1];
    }
    fclose($plik);
    return $banknoty;
}
function Wartosc($banknoty){
    $wartosc=0;
    foreach ($banknoty as $key => $value) {
        $wartosc+=intval($key)*intval($value);
    }
    return $wartosc;
}
