<?php
$elements = Array('Hydrogen', 'Helium', 'Lithium', 'Beryllium');
echo $elements[2].'<br>';
print_r ($elements);
echo'<br><br>';
$atomic = Array('Hydrogen'=>1, 'Helium'=>2, 'Lithium'=>3, 'Beryllium'=>4);
echo $atomic['Hydrogen'].'<br>';
print_r ($atomic);
echo'<br><br>';

$element = 'Helium';

if (!empty($atomic[$element])) {
    echo $element.'\'s atomic number is '.$atomic[$element].'.';
} else {
    echo 'Sorry, that element has not been found in the database, please check your spelling and try again.';
}
echo'<br><br>';
$properties = Array('Hydrogen'=>Array('Atomic number'=> 1, 'Weight'=> 1, 'Group number'=> 1, 'Period number'=> 1),
                    'Helium'=>Array('Atomic number'=> 2, 'Weight'=> 4, 'Group number'=> 18, 'Period number'=> 1),
                    'Lithium'=>Array('Atomic number'=> 3, 'Weight'=> 7, 'Group number'=> 1, 'Period number'=> 2),
                    'Beryllium'=>Array('Atomic number'=> 4, 'Weight'=> 9, 'Group number'=> 2, 'Period number'=> 2));

$request = 4;
if (empty($properties[$element])) {
    echo 'Sorry, that element has not been found in the database, please check your spelling and try again.';
} else {
    switch($request){
        case 1:echo $element.'\'s atomic number is '.$properties[$element]['Atomic number'].'.';
        case 2:echo $element.'\'s atomic weight is '.$properties[$element]['Weight'].'.';
        case 3:echo $element.' is in group number '.$properties[$element]['Group number'].'.';
        case 4:echo $element.' is in period number '.$properties[$element]['Period number'].'.'; break;
        default: echo 'Sorry, but the information you requested cannot be found for this element.';
    }
}
?>
