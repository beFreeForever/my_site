<HTML>

<HEAD>
<TITLE>Успешно</TITLE>
</HEAD>

<BODY bgcolor="LightGrey">

<?php
session_start();
	if (!isset($_SESSION['admin']))
		exit("<p align=center>Только администратор может добавлять проекты</p>");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)
require_once('connect.php');

//$sql="SELECT  `fam`, `name`, `otdel` FROM `Table` ORDER BY `otdel`,`name`";// запрос верный!
//$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
//echo $_POST['choose']; // работает!

$sql="SELECT * FROM `project` ";
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
$i=0;
while($line=mysqli_fetch_row($result)) {
	$n[$i]=$line[0];
	$i++;
}
$id = $n[count($n)-1]+1;
echo $id;


$fir = $_POST['fir'];
$dog = $_POST['dog'];
$sqladd="INSERT INTO `project`(`id`, `dog`, `fir`) VALUES (".$id.",'".$dog."','".$fir."')";
//$result=mysql_query($sql); // не работает=(
mysqli_query($link, $sqladd) or trigger_error(mysqli_error()." in ". $sqladd);



mysqli_close ($link);
?>
<br><p align=center><strong>Новый элемент добавлен!</strong></p>
<br><a href=' menu.html'><p align=center> Назад</p></a>
<a href=' load.php'><p align=center> Таблица</p></a>
</BODY>
</HTML>