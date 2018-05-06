<HTML>

<HEAD>
<TITLE>Запись</TITLE>
</HEAD>

<BODY bgcolor="LightGrey">

<?php
session_start();
	if (!isset($_SESSION['admin']))
		exit("<p align=center>Только администратор может удалять проекты</p>");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)

require_once('connect.php');

$id=(int) $_POST['chfdel'];


$sqldel = "DELETE FROM `project` WHERE `id` =".$id;
//echo $sqlupd;
mysqli_query($link, $sqldel) or trigger_error(mysqli_error()." in ". $sqldel);

mysqli_close ($link);
?>
<br><p align=center><strong>Данный элемент успешно удален!</strong></p>
<br><a href=' menu.html'><p align=center> Назад</p></a>
<a href=' load.php'><p align=center> Таблица</p></a>
</BODY>
</HTML>