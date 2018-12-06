<?php 
namespace App\controllers;

	use App\DB;	
	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;



class LoginController{


	private $Success;
	private $login;
	private $password;


public function __invoke($request)
{
	$data =$request->getParsedbody();
	$this->login=$data['login'];
	$this->password=$data['password'];
	$this->ChekingUser();
	if(is_null($this->login)||is_null($this->password))
	 	$content = include(__DIR__ . '/../../pages/login.template.php');
	 else if($this->Success)
		$content = include(__DIR__ . '/../../pages/loginsuccess.template.php');
	 else
		$content = include(__DIR__ . '/../../pages/loginerror.template.php');
		return new HtmlResponse($content);



}
private function ChekingUser(){

	if (isset($this->login) && isset($this->password) && !empty($this->login) && !empty($this->password)) {

	$dbc=new DB();
	$pas=$dbc->getValue('password','users',['login' => $dbc->db->quote($this->login)]);

		foreach ($pas as  $value) {
			if(password_verify($this->password,$value['password'])){
			$this->Success=true;
			}
		}
	}
}

}

 ?>