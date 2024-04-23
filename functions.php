<?php
function GetMoney(){
    $plik=fopen("..\kasa.txt","r");
    $linie=explode("\n",fread($plik,filesize("..\kasa.txt")));
    $money=[];
    foreach ($linie as $key => $value) {
        $value=explode(":",$value);
        $banknoty[$value[0]]=$value[1];
    }
    fclose($plik);
    return $money;
}
function Wartosc($money){
    $wartosc=0;
    foreach ($money as $key => $value) {
        $wartosc+=intval($key)*intval($value);
    }
    return $wartosc;
}
