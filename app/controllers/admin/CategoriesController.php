<?php 
namespace App\controllers\admin;

	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;
	use Illuminate\Database\Capsule\Manager as DB;



class CategoriesController{

	public $success;
	public $error;


public function __invoke($request)
{
	session_start();
	$this->success=false;
	$this->error=false;


	// var_dump($this->error);

	$title = $request->getParsedBody()['title'];
	if(!empty($title))$this->AddCategory($title);
	$blade = new BladeInstance(
				__DIR__ . "/../../../pages", 
				__DIR__ . "/../../../cache/pages"
			);
	// var_dump($this->error);

		$content=$blade->render('admin.categories', [
					'name' => $_SESSION['username'],
					'error'=>$this->error,
					'success'=>$this->success
				]);

		return new HtmlResponse($content);
}
private function AddCategory($title){
	$count = DB::table('categories')->where('title', '=', $title)->count();
	if($count==0){
	// echo "string2";

		DB::table('categories')->insert(
    	array('title' => $title)
		);
		$this->success=true;
	}
	else
	{
	$this->error=true;
	// echo "string";
	}
}


}

 ?>