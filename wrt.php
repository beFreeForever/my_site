<HTML>

<HEAD>
<TITLE>Запись</TITLE>
</HEAD>

<BODY bgcolor="LightGrey">

<?php
session_start();
	if (!isset($_SESSION['admin']))
		exit("<p align=center>Только администратор может изменять проекты</p>");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)

require_once('connect.php');

$id=(int) $_POST['id'];
$fir=(string) $_POST['fir'];
$dog=(string) $_POST['dog'];

$sqlupd = "UPDATE `project` SET `fir`= '".$fir."', `dog`= '".$dog."' WHERE `id`=".$id;
//echo $sqlupd;
mysqli_query($link, $sqlupd) or trigger_error(mysqli_error()." in ". $sqlupd);

mysqli_close ($link);
?>
<br><p align=center><strong>Данный элемент успешно обновлен!</strong></p>
<br><a href=' menu.html'><p align=center> Назад</p></a>
<a href=' load.php'><p align=center> Таблица</p></a>
</BODY>
</HTML>