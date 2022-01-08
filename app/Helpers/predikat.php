<?php

function predikat($string) {
    if ($string == 'A' || $string == 'SB') {
        $string = 'Sangat Baik';
    } else if ($string == 'B') {
        $string = 'Baik';
    } else if ($string == 'C') {
        $string = 'Cukup Baik';
    } else if ($string == 'D') {
        $string = 'Kurang Baik';
    }

    return $string;
}
?>