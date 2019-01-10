<?php 
namespace App\controllers\admin;

	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;
	use Illuminate\Database\Capsule\Manager as DB;



class CategoriesController{

	


public function __invoke($request)
{
	session_start();




	$title = $request->getParsedBody()['title'];
	// var_dump(empty($title));
	if(!empty($title)) $result = $this->AddCategory($title);

	$blade = new BladeInstance(
				__DIR__ . "/../../../pages", 
				__DIR__ . "/../../../cache/pages"
			);
	
	// echo $message . PHP_EOL;
		$content=$blade->render('admin.categories', [
					'name' => $_SESSION['username'],
					'title'=>$title,
					'mes'=> $result > 0 ? 'Не добавлено' : 'Добавлено',
				]);
// echo $message;
		return new HtmlResponse($content);
}
private function AddCategory($title){
	$count = DB::table('categories')->where('title', '=', $title)->count();
	if($count==0)
		DB::table('categories')->insert(
    	array('title' => $title)
		);
	
	return $count;
}


}

 ?>