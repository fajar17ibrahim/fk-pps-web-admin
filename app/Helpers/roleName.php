<?php

function roleName($string) {
    if ($string == 'ceo') {
        $string = 'CEO';
    } else if ($string == 'teacher') {
        $string = 'Guru';
    } else if ($string == 'admin') {
        $string = 'Admin';
    } else {
        $string = 'Wali Kelas';
    }

    return $string;
}
?>