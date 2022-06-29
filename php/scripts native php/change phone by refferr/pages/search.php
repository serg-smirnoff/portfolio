<?php
$result = array();
if(!session_id()) { # запускаем ссесию, если она не существует
	session_start();
}
if(!empty($_SESSION['search'])) { # проверяем наличие результата
	$result = $_SESSION['search'];
}

?>

<?php if(empty($result)): # нет резуьтата?>
<div align="center">
<b>Ничего не найдено</b>
</div>
<?endif;?>


<?php if(!empty($result)): ?>
<?php foreach($result as $file_path=>$info): # вывод результата ?>
<div>
<a href="<?=basename($file_path)?>"><?=(empty($info['title'])?'без названия':$info['title'])?></a>
<?=(empty($info['desc'])?'':'...'.implode('...',$info['desc']).'...')?>
</div>
<?endforeach;?>
<?endif;?>