<?php
$rows = intval($_GET['rows']);
$rowno = 1;
$cols = intval($_GET['columns']);
$colno = 1;
if (isset($_GET['gen'])) {
    $gen = intval($_GET['gen']);
} else {
    $gen = 0;
}
$gen ++;

if (($rows < 1) || ($cols < 1)) {
    ?>
    <P>Please enter an interger above 0.<br>
    <a href="./grid_params.html">Re-enter grid parameters.</a></P>
<?php
} else {?>
    <p>Your grid has <?php echo $rows;?> rows and <?php echo $cols;?> columns.</p><p style="font-family: 'Lucidia-Console', monospace" align="center">
    <form action="game_of_life.php?rows=<?php echo $rows;?>&columns=<?php echo $cols;?>&gen=<?php echo $gen;?>" method="post">
    <?php
    $neicells = array(
        isset($_POST[$rowno-1 .','.$colno-1]), isset($_POST[$rowno-1 .','.$colno]), isset($_POST[$rowno-1 .','.$colno+1]),
        isset($_POST[$rowno.','.$colno-1]), isset($_POST[$rowno.','.$colno+1]),
        isset($_POST[$rowno+1 .','.$colno-1]), isset($_POST[$rowno+1 .','.$colno]), isset($_POST[$rowno+1 .','.$colno+1]));
    while ($rowno <= $rows) {
        $colno = 1;
        while ($colno <= $cols) {
            echo '<input type="checkbox" name="'.$rowno.','.$colno.'"';
//Start of live/dead test
            $neino = 0;
            foreach ($neicells as $nei) {
                if (isset($nei)) {$neino ++;}
            }
            if ((isset($_POST[$rowno.','.$colno])&& ($neino == 2 || $neino == 3)) || (!isset($_POST[$rowno.','.$colno])&& $neino == 3)) {
                echo ' checked>';
            } else {
                echo '>';
            }
//End of live/dead test
            $colno ++;
        }        
        echo '<br>';
        $rowno ++;
    }
    print_r($neicells);
    ?>
    <p align="center">
        <input type=submit value="Previous generation">
        Current generation: <?php echo $gen -1;?>
        <input type=submit value="Next generation"></form></p></p>
    <?php
}

?>