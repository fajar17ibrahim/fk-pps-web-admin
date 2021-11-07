<?php

//Format -> tanggal("2021-01-01");
function tanggal($date) {
	$month = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);

	$split = explode('-', $date);
	
	// variabel split 0 = date
	// variabel split 1 = month
	// variabel split 2 = year
 
	if ($date == 'now') {
		$mytime = Carbon\Carbon::now();
		return $mytime->toDateTimeString();
	} else  {
		return $split[2] . ' ' . $month[ (int) $split[1] ] . ' ' . $split[0];
	}
}

?>