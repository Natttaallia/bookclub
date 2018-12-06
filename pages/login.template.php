<?php 
$content="
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<form action='' method='post'>
 
 	<h1>Выполните вход</h1>
		<p><label>Логин: </label> <input type='text' name='login' id='add'></p>
		<p><label>Пароль: </label><input type='password' name='password' id='add'></p>

		<p><input type='submit' class='btn waves-effect waves-light' value='Log In'></p>
 
</form>
</body>
</html>"; 
return $content;
 ?>