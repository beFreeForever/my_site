<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta http-equiv="Content-Language" content="ru">
	<link rel="shortcut icon" href="/icons/24.ico" type="image/x-icon">
	<TITLE>Ошибка!</TITLE>
	<link rel="stylesheet" href="style.css" type="text/css">
	<style>
	p {
		margin: auto;position: absolute;
		bottom: 10%;
		left: 48%;
	}
	</style>
</HEAD>
	
<BODY bgcolor="LightGrey">
<?php
session_start();
	if ((!isset($_SESSION['admin']))&&(!isset($_SESSION['user'])))
		exit("<div><h3 align=\"center\">Вы не авторизировались!!!</h3></div>");
//setcookie("rating", 1, time() + 14400);
require_once("connect.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)
$rating = $_POST['rating'];
if(isset($_POST['1'])) // +
	$rating++;
if(isset($_POST['2'])) // -
	$rating--;
$sqlupd = "UPDATE `Abooks` SET `rating`= '".$rating."' WHERE `id`=".$_POST['id'];
mysqli_query($link, $sqlupd) or trigger_error(mysqli_error()." in ". $sqlupd);
header('location:abook.php');



?>

</BODY>
</HTML>