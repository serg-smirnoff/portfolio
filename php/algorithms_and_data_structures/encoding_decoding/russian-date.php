<?php function dateRus() {
    $dateEng = array('1' => "Nov",'2' => "Oct",'3' => "Sep",'4' => "Aug",'5' => "Jul",'6' => "Jun",'7' => "May",'8' => "Apr",'9' => "Mar",'10' => "Feb",'11' => "Jan",'12' => "Dec");
    $dateRus = array('1' => "но€бр€",'2' => "окт€бр€",'3' => "сент€бр€",'4' => "августа",'5' => "июл€",'6' => "июн€",'7' => "ма€",'8' => "апрел€",'9' => "марта",'10' => "феврал€",'11' => "€нвар€",'12' => "декабр€");
    foreach ($dateEng as $key => $month) {
        if ($month == date("M", time())) {
            $i=$key; break;
        }
    }
    return date("d ", time()).$dateRus[$key].date(" Y", time());
}
