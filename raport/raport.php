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
        array_push($toshow,$log);
    }
}
echo "<table>";
foreach ($toshow as $id => $log) {
    echo "<tr>";
    foreach ($log as $key => $value) {
        if ($key==2){
            $value=number_format(floatval($value), 2, '.', "");
        }
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";