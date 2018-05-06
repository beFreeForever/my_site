<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html charset=utf8">
	<meta http-equiv="Content-Language" content="ru">
	<link rel="shortcut icon" href="/icons/33.ico" type="image/x-icon">
	<TITLE> База аудиокниг </TITLE>
	<link rel="stylesheet" href="style.css" type="text/css">
</HEAD>

<BODY>
<?php
session_start();
	if ((!isset($_SESSION['admin']))&&(!isset($_SESSION['user'])))
		exit("<div><h3 align=\"center\">Вы не авторизировались!!!</h3></div>");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //Делает ошибки видимыми =)

require_once('connect.php');

$sql="SELECT * FROM `Abooks`";
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);

echo "<TABLE border=2 align=\"center\" bgcolor=\"white\">";
echo "<TR><TD><center><strong>id</strong></center></TD><TD><strong>Автор</strong></TD><TD><strong>Название</strong></TD><TD><strong>Цикл</strong></TD><TD><strong>Жанр</strong></TD><TD><strong>Чтец</strong></TD><TD><strong>Ссылка</strong></TD><TD><strong>Рейтинг</strong></TD></TR>";
while($line=mysqli_fetch_row($result)) {
	echo "<TR><TD><center><strong> ".$line[0]." </strong></center></TD><TD> ".$line[1]." ".$line[2]." </TD><TD> ".$line[3]." </TD><TD> ".$line[6]." </TD><TD> ".$line[8]." </TD><TD> ".$line[5]." </TD><TD> ".$line[4]." </TD>";
	echo "<TD>";
	if ($_COOKIE["rating"] == 0) {
		echo "<FORM align=\"center\" method=\"POST\" action = \"rating.php\">";
		echo "<input type=\"hidden\" name=\"id\" value=".$line[0].">";
		echo "<input type=\"hidden\" name=\"rating\" value=".$line[7].">";
		echo "<INPUT type=\"submit\" value=\"+\" name=\"1\" title=\"прибавить рейтинг\">";
		echo " ".$line[7]." ";
		echo "<INPUT type=\"submit\" value=\"-\" name=\"2\" title=\"убавить рейтинг\">";
		echo "</FORM>";
	}
	else 
		echo "<center>".$line[7]."</center>";
	echo "</TD></TR>";
}
echo "</TABLE>";

mysqli_close ($link);
?>
</BODY>
</HTML>