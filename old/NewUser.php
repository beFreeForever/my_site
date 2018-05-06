<HTML>

<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta http-equiv="Content-Language" content="ru">
	<link rel="shortcut icon" href="/icons/13.ico" type="image/x-icon">
	<TITLE> Регистрация </TITLE>
	<link rel="stylesheet" href="style.css" type="text/css">
	<style>
		p {
			margin: auto;position: absolute;
			bottom: 10%;
			left: 48%;
		}
	</style>
</HEAD>

<BODY>

<?php

// проверим пароли на совпадения, пустоту ввода и мин. символов =======================================

if ($_POST['pass1'] != $_POST['pass2']) {
	echo "<div align=\"center\"><h4><strong>Ошибка!</strong></h4>";
	echo "<hr align=\"center\" width=\"90%\" size=\"2\" color=\"#6B8E23\" />";
	echo "<br>Пароли не совпадают!</div>";
	echo "<p><input type=\"button\"  onclick=\"history.back();\" value=\"Назад\"/></p>";
	exit;
}
if (!preg_match("|^([a-z0-9_\.\-]{8,20})|is", strtolower($_POST['pass1'])) || !preg_match("|^([a-z0-9_\.\-]{8,20})|is", strtolower($_POST['pass2']))) {
	echo "<div align=\"center\"><h4><strong>Ошибка!</strong></h4>";
	echo "<hr align=\"center\" width=\"90%\" size=\"2\" color=\"#6B8E23\" />";
	echo "<br>Минимальное количество символов в пароле: 8!</div>";
	echo "<p><input type=\"button\"  onclick=\"history.back();\" value=\"Назад\"/></p>";
	exit;
}
// проверим код ========================================================================================
if ($_POST['truekey'] != $_POST['key']) {
	echo "<div align=\"center\"><h4><strong>Ошибка!</strong></h4>";
	echo "<hr align=\"center\" width=\"90%\" size=\"2\" color=\"#6B8E23\" />";
	echo "<br>Не верный код из почты!</div>";
	echo "<p><input type=\"button\"  onclick=\"history.back();\" value=\"Назад\"/></p>";
	exit;
}
// дадим уровень при инвайте ===========================================================================
$id = 0;
if ($_POST['invite'] == "a723db38bf761340df9b9108a74912e5"){ // friendsnn
	$lvl = 5;
}
if ($_POST['invite'] == "8739bc10f5f307f57b18e0860a994097"){ // friendsbb
	$lvl = 4; 
}
if ($_POST['invite'] == "0d3fda0bdbb9d619e09cdf3eecba7999"){ // family
	$lvl = 3;
}
else {
	$lvl = 2;
}

require_once('connect.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми =)
// поиск свободного id для регистрации =================================================================
$sql="SELECT `id` FROM `Users` ";
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
$line = mysqli_fetch_row($result);
$num1 = $line[0];
$id = 0;
while($line = mysqli_fetch_row($result)) { 
	$num2 = $line[0];
	if($num2-$num1 == 1){
		$num1 = $num2;
		$num2 = 0;
	}
	else {
		$id = $num1 + 1;
		break;
	}
}
if($id == 0){
	$id = $num1 + 1;
}
// добавим пользователя! ================================================================================
$pass = md5($_POST['pass1']);
$sqladd="INSERT INTO `Users`(`id`, `mail`, `pass`, `lvl`, `name`, `surname`) VALUES ('".$id."','".$_POST['email']."','".$pass."','".$lvl."','".$_POST['name']."','".$_POST['surname']."')";
mysqli_query($link, $sqladd) or trigger_error(mysqli_error()." in ". $sqladd);

mysqli_close ($link);

?>
<div align="center"><h4><strong>Вы зарегистрировались!</strong></h4>
<hr align="center" width="90%" size="2" color="#6B8E23" /><br>
<FORM align="center" method="POST" action = "index.html">
	<INPUT type="submit" value="На страницу входа" name="OK" title="Вернуться на страницу входа">
</FORM></div>
</BODY>
</HTML>