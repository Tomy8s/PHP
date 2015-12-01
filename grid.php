<?php
$rows = intval($_GET['rows']);
$cols = intval($_GET['columns']);
if (($rows < 1) || ($cols < 1)) {
    ?>
    <P>Please enter an interger above 0.<br>
    <a href="./grid_params.php">Re-enter grid parameters.</a></P>
<?php
} else {
    echo '<p>Your grid has '.$rows.' rows and '.$cols.' columns.</p><p style="font-family: \'Lucidia-Console\', monospace">';
    while ($rows > 0) {
        $cols = intval($_GET['columns']);
        while ($cols > 0) {
            echo '+--';
            $cols --;
        }
        $cols = intval($_GET['columns']);
        echo '+<br>';
        while ($cols > 0) {
            echo '|&nbsp&nbsp';
            $cols --;
        }
        echo '|<br>';
        $rows --;
    }
    $cols = intval($_GET['columns']);
    while ($cols > 0) {
        echo '+--';
        $cols --;
    }
    echo '+</p>';
}

?>