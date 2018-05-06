<HTML>
<HEAD>
<TITLE>Удаление проекта</TITLE>
</HEAD>
<BODY bgcolor="LightGrey">
<h2 align=center>Выберите проект для удаления</h3><hr color="blue"><br>
<?php
session_start();
	if (!isset($_SESSION['admin']))
		exit("<p align=center>Только администратор может удалять проекты</p>");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)
require_once('connect.php');

$sql="SELECT * FROM `project`";// тип запрос sql
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);

?>
<br>

<form action="del.php" method="POST" align="center">
<select size="1" name="chfdel">
<?php
while ($line=mysqli_fetch_row($result)) {// заполнение списка
	echo "<option value=".$line[0].">".$line[1]." (".$line[2].")</option>";
}
mysqli_close ($link);
?>
</select><br><br>
<input type="submit" value="УДАЛИТЬ!">

<br><br><a href=' menu.html'><p align=center> Назад</p></a>
</form>
</body>
</HTML>