<?php 
namespace App\controllers\admin;

	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;
	use Illuminate\Database\Capsule\Manager as DB;



class CategoriesController{

	


public function __invoke($request)
{
	session_start();
	$message="";



	$title = $request->getParsedBody()['title'];
	if(!empty($title))$this->AddCategory($title,$message);
	$blade = new BladeInstance(
				__DIR__ . "/../../../pages", 
				__DIR__ . "/../../../cache/pages"
			);
	
		$content=$blade->render('admin.categories', [
					'name' => $_SESSION['username'],
					'mes'=>$message
				]);

		return new HtmlResponse($content);
}
private function AddCategory($title, &$message){
	$count = DB::table('categories')->where('title', '=', $title)->count();
	if($count==0){
		DB::table('categories')->insert(
    	array('title' => $title)
		);
		$message.="Добавлено";
	}
	else
	{
		$message.="Не добавлено. Категория уже существует";
	}
	
}


}

 ?>