<HTML>

<HEAD>
<TITLE>�������</TITLE>
</HEAD>

<BODY bgcolor="LightGrey">

<?php
session_start();
	if (!isset($_SESSION['admin']))
		exit("<p align=center>������ ������������� ����� ��������� �������</p>");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //������ ������ ��������=)
require_once('connect.php');

//$sql="SELECT  `fam`, `name`, `otdel` FROM `Table` ORDER BY `otdel`,`name`";// ������ ������!
//$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
//echo $_POST['choose']; // ��������!

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
//$result=mysql_query($sql); // �� ��������=(
mysqli_query($link, $sqladd) or trigger_error(mysqli_error()." in ". $sqladd);



mysqli_close ($link);
?>
<br><p align=center><strong>����� ������� ��������!</strong></p>
<br><a href=' menu.html'><p align=center> �����</p></a>
<a href=' load.php'><p align=center> �������</p></a>
</BODY>
</HTML>