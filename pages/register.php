<?php 
error_reporting(E_ERROR);
include("..\config.php"); 


$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

//подкlючение к бд
try {
	 $db=new PDO("mysql:dbname=".DB.";host=".HOST, USER, PASSWORD);
	} catch (PDOException $e) {
	 echo 'Подключение не удалось: ' . $e->getMessage();
	return 0;
}


if (isset($login) && isset($password) && isset($email)&& !empty($login) && !empty($password)&& !empty($email)  ) {
	$sth = $db->prepare('SELECT login FROM users WHERE login = ?');
	$sth->execute(array($login));
if (count($sth->fetchAll()) > 0) {
$Error=true;
}
	else{
	$sth = $db->prepare('INSERT INTO users(login, password, email) VALUES( ?,?,?)');
$sth->execute(array($login,password_hash($password, PASSWORD_BCRYPT),$email));


		//исходные данные, создание файла пользователя
		session_save_path('users_data/');
				session_id($id);
				session_start();
    	session_write_close();
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
