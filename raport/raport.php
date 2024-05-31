<?php
$file=fopen(dirname(__DIR__).'\logi.txt',"r");
$logs=explode("\n",fread($file,filesize(dirname(__DIR__)."\logi.txt")));
$naglowki=["co","kiedy","ile"];
foreach ($logs as $key => $value) {
    $logs[$key]=explode(",",$value);
}
$from=date('Y-m-d\TH:i', strtotime($_POST["od"]));
$to=$_POST["do"];
echo $from;
$toshow=[];
foreach ($logs as $key => $log) {
    foreach ($log as $klucz => $wartosc) {
        
    }
}