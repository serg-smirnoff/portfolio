<?php
$result = array();
if(!session_id()) { # ��������� ������, ���� ��� �� ����������
	session_start();
}
if(!empty($_SESSION['search'])) { # ��������� ������� ����������
	$result = $_SESSION['search'];
}

?>

<?php if(empty($result)): # ��� ���������?>
<div align="center">
<b>������ �� �������</b>
</div>
<?endif;?>


<?php if(!empty($result)): ?>
<?php foreach($result as $file_path=>$info): # ����� ���������� ?>
<div>
<a href="<?=basename($file_path)?>"><?=(empty($info['title'])?'��� ��������':$info['title'])?></a>
<?=(empty($info['desc'])?'':'...'.implode('...',$info['desc']).'...')?>
</div>
<?endforeach;?>
<?endif;?>