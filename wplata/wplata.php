<?php
function DepositMoney($deposit){
    $cash=Cashify(0);
    if(isset($_POST['ifbanknotami'])==false){
        $cash=Cashify($deposit);
    }else{
        foreach ($cash as $key => $value) {
            $cash[$key]=$_POST[str_replace(".","_",$key)];
        }
    }
    return $cash;
}
function Handle($money,$deposit,$change){
    $cash=DepositMoney($deposit);
    $moneypropose=Cashify(0);
    foreach ($money as $key => $value) {
        $moneypropose[$key]=$cash[$key]+$money[$key];
    }
    if(isset($_POST['ifbanknotami'])){
        $money=$moneypropose;
        $changeafter=Withdraw_GiveChange($money,$change,true);
    }else{
        $changeafter=Withdraw_GiveChange($money,$change,false);
        SaveMoney($moneypropose);
    }
    if (is_array($changeafter)==false){
        echo "Nie będę miał jak wydać z $change zł";
        return;
    }
    echo "Wydaję:<br>";
    foreach ($changeafter as $key => $value) {
        echo "$key zł: $value<br>";
    }
}
require dirname(__DIR__).'\functions.php';
$money=GetMoney();
$deposit=$_POST['kwota_dw'];
$change=$_POST['change'];
if ($change=="") $change=0;
Handle($money,$deposit,$change);
