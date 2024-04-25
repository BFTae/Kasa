<?php

function GiveChange($money,$change){
    foreach ($money as $key => $value) {
        while ($value>0) {
            if($change-floatval($key)<0){
                break;
            }
            $change-=floatval($key);
            $value-=1;
            $money[$key]-=1;
            $change=round($change,2);
        }
    }
    print_r($money);
    if ($change!=0) return $change;
    
    return 0;
}

function Handle($money,$given,$change){
    $changeafter=GiveChange($money,$change);
    if ($changeafter!=0){
        echo "Nie będę miał jak wydać z $change zł, byłbym Panu winny ".strval($changeafter)."zł";
    }

}
require dirname(__DIR__).'\functions.php';
$money=GetMoney();


$deposit=$_POST['kwota_dw'];

$change=$_POST['change'];

Handle($money,$deposit,$change);
