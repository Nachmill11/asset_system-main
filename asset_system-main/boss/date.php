<script>
	function convertDate($string){
	$exp = explode("-", $string);
	list($year, $month, $day) = $exp;
	$year = $year-543;
	return "{$year}-{$month}-{$day}";
	}
</script>
<?php
    function showThaiDate($date){
    $__thai_month = [
        "01" => 'ม.ค.',
        "02" => 'ก.พ.',
        "03" => 'มี.ค.',
        "04" => 'เม.ย.',
        "05" => 'พ.ค.',
        "06" => 'มิ.ย.',
        "07" => 'ก.ค.',
        "08" => 'ส.ค.',
        "09" => 'ก.ย.',
        "10" => 'ต.ค.',
        "11" => 'พ.ย.',
        "12" => 'ธ.ค.',
    ];
    
    $exp = explode("-", $date);
    list($year, $month, $day ) = $exp;
    
    $year = $year+543;
    return "{$day} {$__thai_month[$month]} {$year}";
}
?>

<?php
    function showThaiYear($year){
    $exp = explode("-", $year);
    list($year, $month, $day ) = $exp;
    
    $year = $year+543;
    return "{$day} {$month} {$year}";
}
?>

