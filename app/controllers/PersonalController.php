<?php 

namespace App\controllers;


	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;
	use Illuminate\Database\Capsule\Manager as DB;




class PersonalController{


private $count;
	private $page;
	private $start;
	private $allbooks;
	private $page_count;


public function __invoke($request)
{
	$blade = new BladeInstance(
				__DIR__ . "/../../pages", 
				__DIR__ . "/../../cache/pages"
			);
	session_start();

$id=DB::table('users')
					->where('login', '=', $_SESSION['username'])
					->value('id');
					// ->get();
				// var_dump($id);
$data=DB::table('books')
					->where('user_id', '=', $id)
					->get()
					->toArray();


	foreach ($data as $key => $value) {
		$data[$key]= (array) $value;
		$author=$this->getStringById($data[$key]["author_id"],'name','authors');
	$data[$key]+=["author_name"=>$author];
	$category=$this->getStringById($data[$key]["category_id"],'title','categories');
	$data[$key]+=["category_name"=>$category];
	}
	if(isset($_SESSION['username']))	
		$content=$blade->render('personal', [
					'name' => $_SESSION['username'],
					'data'=>$data
				]);
	else
		$content=$blade->render('error', [
					'Text' => "Вы не авторизированы"
				]);


		return new HtmlResponse($content);



}
private function getStringById($id,$column,$table){
		$pas=DB::table($table)->where('id', '=', $id)->get()->toArray();
		foreach ($pas as $key => $value) 
			$pas[$key]= (array) $value;
		return $pas[0][$column];
	}

}




 ?>