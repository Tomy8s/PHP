<?php
$rows = intval($_GET['rows']);
$rowno = 1;
$cols = intval($_GET['columns']);
$colno = 1;
if (($rows < 1) || ($cols < 1)) {
    ?>
    <P>Please enter an interger above 0.<br>
    <a href="./grid_params.php">Re-enter grid parameters.</a></P>
<?php
} else {
    echo '<p>Your grid has '.$rows.' rows and '.$cols.' columns.</p><p style="font-family: \'Lucidia-Console\', monospace">&nbsp&nbsp&nbsp';
    while ($colno <= $cols) {
        if ($colno < 10) {
            echo '&nbsp'.$colno.'&nbsp';
        } else if ($colno < 100) {
            echo '&nbsp'.$colno;
        } else {
            echo '&nbsp#&nbsp';
        }
        $colno ++;
    }
    echo '<br>&nbsp&nbsp&nbsp';
    while ($rowno <= $rows) {
        $colno = 1;
        while ($colno <= $cols) {
            echo '+--';
            $colno ++;
        }
        if ($rowno < 10) {
            echo '+<br>&nbsp&nbsp'.$rowno;
        } else if ($rowno < 100) {
            echo '+<br>&nbsp'.$rowno;
        } else if ($rowno < 1000) {
            echo $rowno;
        } else {
            echo '+<br>#';
        }
        $colno = 1;        
        while ($colno <= $cols) {
            echo '|&nbsp&nbsp';
            $colno ++;
        }        
        echo '|<br>&nbsp&nbsp&nbsp';
        $rowno ++;
    }
    $colno = 1;
    while ($colno <= $cols) {
        echo '+--';
        $colno ++;
    }
    echo '+</p>';
}

?>
