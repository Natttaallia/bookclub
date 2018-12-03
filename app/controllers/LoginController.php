<?php 
namespace App\controllers;

	use App\DB;
	
	use Zend\Diactoros\Response\HtmlResponse;


class LoginController{


	private $Success;

	private $login;
	private $password;

function __constructor(){
	$login = $_GET['login'];
	$password = $_GET['password'];
	$this->ChekingUser();
	

	
}
private function ChekingUser(){
	if (isset($login) && isset($password) && !empty($login) && !empty($password)) {
	$dbc=new DB();
	$pas=$dbc->getValue('password','users',['login' => $dbc->db->quote($login)]);
		foreach ($pas as  $value) {
			if(password_verify($password,$value['password'])){
			$Success=true;
		}
}
}
}
	public function index(){
	 if(!isset($login)||!isset($password))
	 	$content = include(__DIR__ . '/../../pages/login.template.php');
	 else if($Success)
		$content = include(__DIR__ . '/../../pages/loginsuccess.template.php');
	 else
		$content = include(__DIR__ . '/../../pages/loginerror.template.php');

		return new HtmlResponse($content);
	}
}

 ?>