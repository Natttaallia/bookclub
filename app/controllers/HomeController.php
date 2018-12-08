<?php 

namespace App\controllers;
error_reporting(E_ERROR  | E_PARSE);

	use App\DB;
	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;


class HomeController{

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
	$this->count=9;

	$page_=$request->getURI()->getPath();
	$page_ = substr($page_, 1);
	if(isset($page_))$this->page=$page_-1;
	else $this->page=0;


	$dbc=new DB();

	$this->allbooks=$dbc->getData(['*'],[],'books');
	$this->page_count=ceil(count($this->allbooks)/$this->count);	

	if($this->page>$this->page_count)$this->page=0;

	$this->start=$this->page*$this->count;
	

	$data=$dbc->getData(
	['*'], 
	[],
	'books',
	$this->start,
	$this->count
	);
for ($i=0; $i < $this->count; $i++) { 
	$author=$this->getStringById($data[$i]["author_id"],'name','authors');
	$data[$i]+=["author_name"=>$author];
	$category=$this->getStringById($data[$i]["category_id"],'title','categories');
	$data[$i]+=["category_name"=>$category];
}




	$content=$blade->render('home', [
					'data' => $data,
					'page' => $this->page,
					'page_count' => $this->page_count,
					'flag_right'=>true,
					'flag_left'=>true

				]);

	return new HtmlResponse($content);




	}
	private function getStringById($id,$column,$table){
		$dbc=new DB();
		$pas=$dbc->getValue($column,$table,['id' => $id]);
		return $pas[0][$column];
	}


}
 ?>