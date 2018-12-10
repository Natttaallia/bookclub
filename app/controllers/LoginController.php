<?php 
namespace App\controllers;

	// use App\DB;	
	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;
	use Illuminate\Database\Capsule\Manager as DB;




class LoginController{


	private $Success;
	private $login;
	private $password;


public function __invoke($request)
{
	$blade = new BladeInstance(
				__DIR__ . "/../../pages", 
				__DIR__ . "/../../cache/pages"
			);

	$data =$request->getParsedbody();
	$this->login=$data['login'];
	$this->password=$data['password'];
	if (isset($this->login) && isset($this->password) && !empty($this->login) && !empty($this->password)) {
		$this->ChekingUser();
		if($this->Success){
			session_start();
			$_SESSION['username']=$this->login;
				$content=$blade->render('success', [
					'Text' => "Вы успешно зашли",
					'Element' => "<a href='/cabinet'>Личный кабинет</a>"
				]);}
	 	else
				$content=$blade->render('error', [
					'Text' => "Данные не верные. Вы не вошли"
				]);
	}
	else
		$content=$blade->render('login');

		return new HtmlResponse($content);



}
private function ChekingUser(){	
	// $dbc=new DB();
	// $pas=$dbc->getValue('password','users',['login' => $dbc->db->quote($this->login)]);
	$pas=DB::table('users')
					->where('login', '=', $this->login)
					->pluck('password')
					->toArray();
		// var_dump($pas);
		foreach ($pas as  $value) {
			if(password_verify($this->password,$value)){
			$this->Success=true;
			}
		}	
	}

}

 ?>