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

function Cashify($money){
    $cash=[
    "500"=>0,
    "200"=>0,
    "100"=>0,
    "50"=>0,
    "20"=>0,
    "10"=>0,
    "5"=>0,
    "2"=>0,
    "1"=>0,
    "0.5"=>0,
    "0.2"=>0,
    "0.1"=>0,
    "0.05"=>0,
    "0.02"=>0,
    "0.01"=>0
    ];
    foreach($cash as $key => $value){
        while($money-floatval($key)){
            $money-= floatval($key);
            $cash[$key]+=1;
        }
    }
    return $cash;
}
function SaveMoney($newmoney){
    $file=fopen("kasa.txt","w");
    foreach($newmoney as $key => $value){
        fwrite($file,"$key:$value",strlen("$key:$value"));
        if($key!="0.01") fwrite($file,"\n",strlen("\n"));
    }
    fclose($file);
}