<?php 
namespace App\controllers;

	use App\DB;
	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;



class RegisterController{

	private $Success;
	private $login;
	private $password;
	private $email;



	public function __invoke($request)
	{
		$blade = new BladeInstance(
				__DIR__ . "/../../pages", 
				__DIR__ . "/../../cache/pages"
			);

	$data =$request->getParsedbody();
	$this->login=$data['login'];
	$this->password=$data['password'];
	$this->email=$data['email'];


	if (isset($this->login) && isset($this->password) && isset($this->email)&& !empty($this->login) && !empty($this->password)&& !empty($this->email)  ) {
			$this->Cheking();
			if($this->Success){
			session_start();
			$_SESSION['username']=$this->login;
				$content=$blade->render('success', [
					'Text' => "Вы успешно зарегестрировались",
					'Element' => "<a href='/cabinet'>Личный кабинет</a>"
				]);}
	 	else
				$content=$blade->render('error', [
					'Text' => "Такой логин уже существует. Добавление невозможно"
				]);
	}
		else
		$content=$blade->render('register');

		return new HtmlResponse($content);
}
private function Cheking(){
	$dbc=new DB();
	$pas=$dbc->getValue('login','users',['login' => $dbc->db->quote($this->login)]);
			if (count($pas) > 0) 
				$this->Success=false;
			else{
				$pas=$dbc->setValue(['login', 'password', 'email'],'users',[$dbc->db->quote($this->login),$dbc->db->quote(	password_hash($this->password, PASSWORD_BCRYPT)),$dbc->db->quote($this->email)]);
				$this->Success=true;
			}
	}
	
}
 ?>