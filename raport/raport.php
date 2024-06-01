<?php
$file=fopen(dirname(__DIR__).'\logi.txt',"r");
$logs=explode("\n",fread($file,filesize(dirname(__DIR__)."\logi.txt")));
$naglowki=["co","kiedy","ile"];
foreach ($logs as $key => $value) {
    $logs[$key]=explode(",",$value);
}
$from=date('Y-m-d H:i', strtotime($_POST["od"]));
$to=$_POST["do"];
$toshow=[];
foreach ($logs as $key => $log) {
    if ((strtotime(str_replace("/","-",$log[1]))>=strtotime($from) && strtotime(str_replace("/","-",$log[1]))<=strtotime($to))&&((isset($_POST['wplaty'])&&$log[0]=='Wplata')||isset($_POST['wyplaty'])&&$log[0]=='Wyplata')) {
        print_r($log);
        echo "<br>";
    }
}