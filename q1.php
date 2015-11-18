<?php
$arr = array(
    20=>'University',
    21=>'Polic Station',
    22=>'Ambulance',
    1=>'Zoo');
$arr2= array(
    20=>'abc',
    21=>'def',
    22=>'ghi',
    1=>'jkl');
$arr_out = array();
foreach($arr as $key=>$el) {
    $arr_out[$key] = $arr2[$key] ." ".$el;
}
var_dump($arr_out);
echo $arr_out;