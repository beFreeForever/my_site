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

//$sql="SELECT  `fam`, `name`, `otdel` FROM `Table` ORDER BY `otdel`,`name`";// запрос верный!
//$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
//echo $_POST['choose']; // работает!

$id=$_POST['choose'];
$sql="SELECT * FROM `project` WHERE `id` = ".$id;
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
//$result=mysql_query($sql); // не работает=(
$nums=mysqli_num_rows($result);

$line = mysqli_fetch_row($result);
echo "<FORM align=center method=POST action = \"wrt.php\">";// формы!
echo "<h2>Ваши данные</h2><hr color=\"blue\"><br>Проект:<br>";
echo "<INPUT type = \"text\" name = \"dog\" value=".$line[1]." title=\"Поле для договора\">";
echo "<br><br>Фирма:<br>";
echo "<INPUT type = \"text\" name = \"fir\" value=".$line[2]." title=\"Поле для фирмы\">";
echo "<br><br><hr color=\"blue\">";

echo "<INPUT type=\"submit\" value=\"Изменить значения\" name=\"OK\" title=\"Отправка информации на сервер\">";

echo "<input type=\"hidden\" name=\"id\" value=".$id.">";// id выбран
//echo "<input type=\"hidden\" name=\"link\" value=".$link.">";// ссылка на вход
echo "</FORM>";

mysqli_close ($link);
?>
<br><br><a href=' menu.html'><p align=center> Назад</p></a>	
</BODY>
</HTML>