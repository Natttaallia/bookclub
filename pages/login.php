<?php 
error_reporting(E_ERROR );
include("config.php"); 

$login = $_GET['login'];
$password = $_GET['password'];
$email = $_GET['email'];



//подкlючение к бд
try {
	 $db=new PDO("mysql:dbname=".DB.";host=".HOST, USER, PASSWORD);
	} catch (PDOException $e) {
	 echo 'Подключение не удалось: ' . $e->getMessage();
	return 0;
}




if (isset($login) && isset($password) && !empty($login) && !empty($password)) {

	$sth = $db->prepare('SELECT login, password FROM users WHERE login = ?');
	$sth->execute(array($login));

while ($row = $sth->fetch(PDO::FETCH_LAZY))
{
			if(password_verify($password,$row['password'])){
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