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
	$this->count=20;
	$id=DB::table('users')
					->where('login', '=', $_SESSION['username'])
					->value('id');

	$page_=$request->getURI()->getPath();
	$page_ = substr($page_, 9);

	// var_dump($page_);
	if(!empty($page_))$this->page=$page_-1;
	else $this->page=0;
	$this->allbooks=DB::table('books')
					->where('user_id', '=', $id)
					->count();
	// var_dump($this->allbooks);
	$this->page_count=ceil($this->allbooks/$this->count);	

	if($this->page>$this->page_count)$this->page=0;
	$this->start=$this->page*$this->count;


					// ->get();
				// var_dump($id);
$data=DB::table('books')
					->where('user_id', '=', $id)
					->get()
					->slice($this->start,$this->count)
					->toArray();
	// var_dump($data);


	foreach ($data as $key => $value) {
		$data[$key]= (array) $value;
		$author=$this->getStringById($data[$key]["author_id"],'name','authors');
		$data[$key]+=["author_name"=>$author];
		$category=$this->getStringById($data[$key]["category_id"],'title','categories');
		$data[$key]+=["category_name"=>$category];
	}
	// var_dump($data);
	if(isset($_SESSION['username']))	
		$content=$blade->render('admin.personal', [
					'name' => $_SESSION['username'],
					'data'=>$data,
					'page' => $this->page,
					'page_count' => $this->page_count,
					'flag_right'=>true,
					'flag_left'=>true,
					'uri'=>"/cabinet"
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