<?php
function WithdrawAttempt($money,$withdrawn){
    foreach ($money as $key => $value) {
        $moneypropose[$key]=$money[$key]-$withdrawn[$key];
        if ($moneypropose[$key]<0){
            echo "Wypłata jest niemożliwa, brak odpowiednich nominałów";
            return;
        }
    }
    SaveMoney($moneypropose);
    return $moneypropose;
}

function Handle($money,$withdrawn){
    $moneypropose=Cashify(0);
    if (isset($_POST['ifbanknotami'])){
        $withdrawn=Cashify(0);
        foreach ($withdrawn as $key => $value) {
            $withdrawn[$key]=$_POST[str_replace(".","_",$key)];
        }
        if(WithdrawAttempt($money,$withdrawn)==false) return;
    }else{
        $attempt=Withdraw_GiveChange($money,$withdrawn,true);
        if (is_array($attempt)==false){
            echo "Wypłata niemożliwa, brakuje $attempt zł";
            return;
        }
        $moneypropose=$attempt;
    }
    echo "Wypłacono:";
    foreach ($moneypropose as $key => $value) {
        echo "$key zł: $value<br>";
    }
    Logs(SumofMoney($moneypropose),false);
    return;
    
}
require dirname(__DIR__).'\functions.php';
$money=GetMoney();
$withdrawn=$_POST['kwota_w'];
Handle($money,$withdrawn);