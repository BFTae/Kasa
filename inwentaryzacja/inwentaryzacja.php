<?php
require dirname(__DIR__).'\functions.php';

$cash=Cashify(0);
foreach ($cash as $key => $value) {
    $cash[$key]=$_POST[str_replace(".","_",$key)];
}
$money=GetMoney();
echo "<table>";
echo "<tr><th>Nominał</th><th>Stan fizyczny</th><th>Stan logiczny</th></tr>";
$logiczny=0;
foreach ($cash as $key => $value) {
    echo "<tr>";

    echo "<td>";
    echo "$key zł";
    echo "</td>";

    echo "<td>";
    echo "$value";
    echo "</td>";

    echo "<td>";
    $logiczny=$money[$key];
    echo "$logiczny";
    echo "</td>";

    echo "</tr>";
}
echo "</table>";
echo '<div id="was_nun"></div>';