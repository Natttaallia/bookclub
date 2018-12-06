<?php 
$content="
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
	<form action='' method='post' enctype='multipart/form-data'>
<h1>Добавление пользователя</h1>
		<p><label>Логин: </label> <input type='text' name='login' id='add'></p>
		<p><label>Пароль: </label><input type='password' name='password' id='add'></p>
		<p><label>Почта: </label><input type='email' name='email' id='add'></p>
		
		<p><input type='submit' class='btn waves-effect waves-light'  value='Зарегистрироваться'><a href='login.php' class='btn waves-effect waves-light'>Войти</a></p>

 </form>

</body>
</html>
	"; 
return $content;
 ?>