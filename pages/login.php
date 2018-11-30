<?php 

error_reporting(E_ERROR );
include ('..\vendor/autoload.php');
use App\DB;


$login = $_GET['login'];
$password = $_GET['password'];
$email = $_GET['email'];



if (isset($login) && isset($password) && !empty($login) && !empty($password)) {
$dbc=new DB();
$pas=$dbc->getValue('password','users',['login' => $dbc->db->quote($login)]);
foreach ($pas as  $value) {
	if(password_verify($password,$value['password'])){
			$Success=true;
		}
}

}
	
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><form action="">
<?php if(!isset($Success)&&isset($login)){ ?>
	<div class="Mes">Данные не верные. Вы не вошли</div>
<?php unset($Success);} ?>
<?php if(isset($Success)){ ?>
	<div class="Mes">Вы успешно зашли</div>
<a href="/cabinet">Личный кабинет</a>
<?php 
unset($Success);
} 
else{
?>
 
 	<h1>Выполните вход</h1>
		<p><label>Логин: </label> <input type="text" name="login" id="add"></p>
		<p><label>Пароль: </label><input type="password" name="password" id="add"></p>

		<p><input type="submit" class="btn waves-effect waves-light" value="Log In"></p>
 
 <?php 	} ?>
</form>
</body>
</html>