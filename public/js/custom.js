function onDateFormat($d){
    $date = $d.getDate();
    $month = $d.getMonth() + 1;
    $year = $d.getFullYear();
    $newDate = $year + '-' + ($month < 10 ? '0' + $month : $month) + '-' + ($date < 10 ? '0' + $date : $date) ;
    return $newDate;
}