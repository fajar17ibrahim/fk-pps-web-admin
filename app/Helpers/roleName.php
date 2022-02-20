<?php

function roleName($string) {
    if ($string == '1') {
        $string = 'CEO';
    } else if ($string == '4') {
        $string = 'Guru';
    } else if ($string == '2') {
        $string = 'Admin';
    } else {
        $string = 'Wali Kelas';
    }

    return $string;
}
?>