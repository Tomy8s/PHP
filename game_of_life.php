<!--by T. Yates-->
<?php
$rows = intval($_GET['rows']);
$rowno = 1;
$cols = intval($_GET['columns']);
$colno = 1;
if (isset($_POST['gen'])) {
    $gen = intval($_POST['gen']);
} else {
    $gen = 0;
}
$gen ++;
if (isset($_GET['random']) && (intval($_GET['live']) > 0) && (intval($_GET['live']) <= ($rows * $cols))) {
    $live = intval($_GET['live']);
} else if (isset($_GET['random'])) {
    $live = rand(1, $rows * $cols);
}
//Check grid parameters
if (($rows < 1) || ($cols < 1)) {
    ?>
    <P>Please enter an interger above 0.<br>
    <a href="./grid_params.html">Re-enter grid parameters.</a></P>
<?php
} else {?>
    <p>Your grid has <?php echo $rows;?> rows and <?php echo $cols;?> columns.</p><p style="font-family: 'Lucidia-Console', monospace" align="center">
    <form action="game_of_life.php?rows=<?php echo $rows;?>&columns=<?php echo $cols;?>" method="post">
    <?php
    echo $gen.' gen<br>';
//Random cell generator
    if ($gen == 1 && isset($_GET['random'])) {
        $randomnos = array_fill(0, $live, NULL);
        for ($i = 0; $i < $live; $i ++) {
            $newrand = rand(1, $cols * $rows);
            while (in_array($newrand, $randomnos)) {
                $newrand = rand(1, $cols * $rows);
            }
            $randomnos[$i] = $newrand;
        }
        //$randkey = 0;
        //print_r($randomnos);
        //echo '<br>';
        //foreach ($randomnos as $randkey => $randval) {
        //    echo 'Value = '.$randval.' row = '.(intval($randval/$cols)+1).' col = '.($randval%$cols).'<br>';
        //}
        //echo $live.' live<br>';
        while ($rowno <= $rows) {
            $colno = 1;
            while ($colno <= $cols) {
                echo '<input type="checkbox" name="'.$rowno.','.$colno.'"';
                if (in_array(((($rowno-1)*$cols)+$colno), $randomnos)){
                    echo ' checked>';
                } else {
                    echo '>';
                }
                $colno ++;
            }
            echo '<br>';
            $rowno ++;
        }
    } else {
        while ($rowno <= $rows) {
            $colno = 1;
            while ($colno <= $cols) {
                echo '<input type="checkbox" name="'.$rowno.','.$colno.'"';
    //Start of live/dead test
                $neicells = array(
                    isset($_POST[($rowno-1).','.($colno-1)]), isset($_POST[($rowno-1).','.($colno)]), isset($_POST[($rowno-1).','.($colno+1)]),
                    isset($_POST[($rowno).','.($colno-1)]), isset($_POST[($rowno).','.($colno+1)]),
                    isset($_POST[($rowno+1).','.($colno-1)]), isset($_POST[($rowno+1).','.($colno)]), isset($_POST[($rowno+1).','.($colno+1)]));
                $neino = 0;
                foreach ($neicells as $nei) {
                    if ($nei == true) {
                        $neino ++;
                    }
                }
                if (((isset($_POST[$rowno.','.$colno]) && ($neino == 2 || $neino == 3)) || (!isset($_POST[$rowno.','.$colno])&& $neino == 3))) {
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
    }
    ?>
    <p>
        <!--<input type=submit value="Previous generation">-->
        Current generation: <?php echo $gen -1;?>
        <input type="hidden" value="<?php echo $gen;?>" name="gen">
        <input type="submit" value="Next generation"></form></p></p>
    <?php
}
?>
<!--by T. Yates-->