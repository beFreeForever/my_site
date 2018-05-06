<HTML>

<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta http-equiv="Content-Language" content="ru">
	<link rel="shortcut icon" href="/icons/13.ico" type="image/x-icon">
	<TITLE> Регистрация </TITLE>
	<link rel="stylesheet" href="style.css" type="text/css">
	<style>
	div {
		width: 30%; height: 43%;
	}
	p {
		margin: auto;position: absolute;
		bottom: 10%;
		left: 48%;
	}
	</style>
</HEAD>

<BODY>

<?php

$milo = $_POST['mail'];

if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($milo))) { 
	echo "<div><h4 align=\"center\"><strong>Вы указали неверные данные!</strong></h4>";
	echo "<hr align=\"center\" width=\"90%\" size=\"2\" color=\"#6B8E23\" /></div>";
	echo "<p><input type=\"button\"  onclick=\"history.back();\" value=\"Назад\"/></p>";
	exit;
	
}
// проверка на почту ========================================================================
require_once('connect.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //делает ошибки видимыми=)
$sql="SELECT * FROM `Users`";
$result = mysqli_query($link, $sql) or trigger_error(mysqli_error()." in ". $sql);
//$line = mysqli_fetch_row($result);

while($line = mysqli_fetch_row($result)) {
	if ($milo == $line[1]) { 
		echo "<div><h4 align=\"center\"><strong>Эта почта уже занята!</strong></h4>";
		echo "<hr align=\"center\" width=\"90%\" size=\"2\" color=\"#6B8E23\" /></div>";
		echo "<p><input type=\"button\"  onclick=\"history.back();\" value=\"Назад\"/></p>";
		exit;
	}
}
mysqli_close ($link);

$code = rand ( 100000, 999999 );
	echo "<div>";
if(mail($milo, "Регистация на сайте", "Введите код-ключ на сайте:          $code"))
	echo "<h4 align=\"center\"><strong> Сообщение успешно отправлено на почту: $milo</strong></h4>";
else
	echo "<div><h4 align=\"center\"><strong> Сообщение НЕ отправлено. Повторите попытку позже.</strong></h4></div>";

?>
	<hr align="center" width="90%" size="2" color="#6B8E23" />
	<FORM align="center" method="POST" action = "NewUser.php">
		<INPUT type = "text" name = "name" value="имя" title="Введите ваше имя, лучше честно)" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
		<BR><BR>
		<INPUT type = "text" name = "surname" value="фамилия" title="Введите вашу фамилию. Хоть эта информация никому не нужна, зато я буду знать кто вы)" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
		<BR><BR>
		<INPUT type="password"  name="pass1" placeholder="Введите пароль" title="Введите пароль. Минимум 8 символов." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
		<BR><BR>
		<INPUT type="password"  name="pass2" placeholder="Подтвердите пароль" title="Введите пароль еще раз" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
		<BR><BR>
		<INPUT type = "text" name = "key" value="код из письма" title="Введите код-ключ из письма" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
		<BR><BR>
		<INPUT type = "text" name = "invite" value="*инвайт-код" title="Введите инвайт-код. Не обязательно!" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
<?php	
		echo "<input type=\"hidden\" name=\"email\" value=$milo>";
		echo "<input type=\"hidden\" name=\"truekey\" value=$code>";
		echo "<BR><BR>";
?>		
		<INPUT type="submit" value="Регистрация" name="OK" title="Отправить информацию на сервер">
	</form>
	</div>
	<p><input type="button"  onclick="history.back();" value="Назад"></p>
</BODY>
</HTML>