<?php
    $neicells = array(
        $_POST[$rowno-1 .','.$colno-1], $_POST[$rowno-1 .','.$colno], $_POST[$rowno-1 .','.$colno+1],
        $_POST[$rowno.','.$colno-1], $_POST[$rowno.','.$colno+1],
        $_POST[$rowno+1 .','.$colno-1], $_POST[$rowno+1 .','.$colno], $_POST[$rowno+1 .','.$colno+1]);
    echo $neicells;