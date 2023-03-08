<?php function dateRus() {
    $dateEng = array('1' => "Nov",'2' => "Oct",'3' => "Sep",'4' => "Aug",'5' => "Jul",'6' => "Jun",'7' => "May",'8' => "Apr",'9' => "Mar",'10' => "Feb",'11' => "Jan",'12' => "Dec");
    $dateRus = array('1' => "������",'2' => "�������",'3' => "��������",'4' => "�������",'5' => "����",'6' => "����",'7' => "���",'8' => "������",'9' => "�����",'10' => "�������",'11' => "������",'12' => "�������");
    foreach ($dateEng as $key => $month) {
        if ($month == date("M", time())) {
            $i=$key; break;
        }
    }
    return date("d ", time()).$dateRus[$key].date(" Y", time());
}
?>