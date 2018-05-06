<HTML>

<HEAD>
</HEAD>
<TITLE></TITLE>
<BODY>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)
$sqlhost="95.79.35.162";
$sqluser="root";
$sqlpass="Ibanez89047996350";//потом дописать!!!!!
$db="MyDB";
$link = mysqli_connect($sqlhost, $sqluser, $sqlpass, $db) or die("MySQL не доступен! ".mysqli_error());
mysqli_query($link, "SET NAMES utf8");
?>
</BODY>
</HTML>