<?php 
error_reporting(E_ERROR);
include ('..\vendor/autoload.php');
use App\DB;


$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];




if (isset($login) && isset($password) && isset($email)&& !empty($login) && !empty($password)&& !empty($email)  ) {
	$dbc=new DB();
$pas=$dbc->getValue('login','users',['login' => $dbc->db->quote($login)]);
if (count($pas) > 0) {
$Error=true;
}
	else{
$pas=$dbc->setValue(['login', 'password', 'email'],'users',[$dbc->db->quote($login),$dbc->db->quote(password_hash($password, PASSWORD_BCRYPT)),$dbc->db->quote($email)]);
		session_start();
		$Success=true;
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
<?php if(isset($Error)){ ?>
	<div class="Mes">Такой логин уже существует. Добавление невозможно</div>
<?php unset($Error);} ?>
<?php if(isset($Success)){ ?>
	<div class="Mes">Добавлено</div>
<?php unset($Success);} ?>
 
 	<h1>Добавление пользователя</h1>
		<p><label>Логин: </label> <input type="text" name="login" id="add"></p>
		<p><label>Пароль: </label><input type="password" name="password" id="add"></p>
		<p><label>Почта: </label><input type="email" name="email" id="add"></p>
		
		<p><input type="submit" class="btn waves-effect waves-light"  value="Зарегистрироваться"><a href="login.php" class="btn waves-effect waves-light">Войти</a></p>

 </form>

</body>
</html>
