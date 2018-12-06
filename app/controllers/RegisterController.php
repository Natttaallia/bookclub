<?php 
namespace App\controllers;

	use App\DB;
	use Zend\Diactoros\Response\HtmlResponse;


class RegisterController{

	private $Success;
	private $login;
	private $password;
	private $email;



	public function __invoke($request)
{
	$data =$request->getParsedbody();
	$this->login=$data['login'];
	$this->password=$data['password'];
	$this->email=$data['email'];

	$this->ChekingUser();
	if(is_null($this->login)||is_null($this->password))
	 	$content = include(__DIR__ . '/../../pages/login.template.php');
	 else if($this->Success)
		$content = include(__DIR__ . '/../../pages/loginsuccess.template.php');
	 else
		$content = include(__DIR__ . '/../../pages/loginerror.template.php');
		return new HtmlResponse($content);



}
	public function index(){
		$content = include(__DIR__ . '/../../pages/register.php');
		return new HtmlResponse($content);
	}
}
 ?>