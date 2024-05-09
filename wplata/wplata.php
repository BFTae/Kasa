
<?php

function GiveChange($money,$change){
    $changenom=[];
    foreach ($money as $key => $value) {
        while ($value>0) {
            if($change-floatval($key)<0){
                break;
            }
            $change-=floatval($key);
            $value-=1;
            $money[$key]-=1;
            if(isset($changenom[$key])==false){
                $changenom[$key]=1;
            }else{
            $changenom[$key]+=1;
            }
            $change=round($change,2);
        }
    }
    if ($change!=0) {
        return $change;
    }
    print_r($money);
    SaveMoney($money);
    return $changenom;
}

function DepositMoney($money,$deposit){
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
    $cash=DepositMoney($money,$deposit);
    print_r($cash);
    $moneypropose=Cashify(0);
    foreach ($money as $key => $value) {
        $moneypropose[$key]=$cash[$key]+$money[$key];
    }
    $changeafter=GiveChange($moneypropose,$change);
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
print_r($money);
Handle($money,$deposit,$change);
