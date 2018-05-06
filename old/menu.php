<HTML>

<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta http-equiv="Content-Language" content="ru">
	<link rel="shortcut icon" href="/icons/28.ico" type="image/x-icon">
	<TITLE> Главная страница </TITLE>
	<link rel="stylesheet" href="style.css" type="text/css">
	<style>
	div {
		width: 30%; height: 43%;
	}
	</style>
</HEAD>

<BODY>
<?php
	session_start();
	if ((!isset($_SESSION['admin']))&&(!isset($_SESSION['user'])))
		exit("<h4 align=center>Вы не авторизировались!!!</h4>");
?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter46301727 = new Ya.Metrika({
                    id:46301727,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/46301727" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

	<div>
	<h3 align=center color="#fff">Меню - затычка</h3>
	<hr align="center" width="90%" size="2" color="#6B8E23" /><br>
	
	<FORM align="center" method="GET" action = "abook.php">
		<INPUT type="submit" value="Аудиокниги" name="1" title="База аудиокниг">
	</form>
	<FORM align="center" method="GET" action = "choose.php">
		<INPUT type="submit" value="Изменить проект" name="2" title="Изменить существующий проект из БД">
	</form>
	<FORM align="center" method="GET" action = "add.html">
		<INPUT type="submit" value="Добавить проект" name="3" title="Добавить новый проект в БД">
	</form>
	<FORM align="center" method="GET" action = "chfdel.php">
		<INPUT type="submit" value="Удалить проект" name="4" title="Удалить проект из БД">
	</form>
	</div>
	
</BODY>
</HTML>