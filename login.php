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

require_once("connect.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)
$sql="SELECT * FROM `Users`";
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
$i=0;
while($line = mysqli_fetch_row($result)) {
	if((md5($_POST['pass']) == $line[2]) && ($_POST['mail']) == $line[1]) {
		$i=1;
		setcookie("id", $line[0], time() + 14400);
		setcookie("name", $line[4], time() + 14400);
		setcookie("surname", $line[5], time() + 14400);
		setcookie("lvl", $line[3], time() + 14400);
		setcookie("rating", 0, time() + 14400);
		if($line[3] == 1)
			$_SESSION['admin']=true;
		else
			$_SESSION['user']=true;
	}

}


if ($i == 1) {
	header('location:menu.php');
}
else {
	echo "<div><h4 align=\"center\"><strong>Ошибка в указании почты или пароля!</strong></h4>";
	echo "<hr align=\"center\" width=\"90%\" size=\"2\" color=\"#6B8E23\" /></div>";
	echo "<p><input type=\"button\"  onclick=\"history.back();\" value=\"Назад\"/></p>";
	exit;
}

?>

</BODY>
</HTML>