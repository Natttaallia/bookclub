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
	// var_dump(empty($title));
	if(!empty($title)) $result = $this->AddCategory($title,$message);

	$blade = new BladeInstance(
				__DIR__ . "/../../../pages", 
				__DIR__ . "/../../../cache/pages"
			);
	
	// echo $message . PHP_EOL;
		$content=$blade->render('admin.categories', [
					'name' => $_SESSION['username'],
					'mes'=> $result == 0 && !empty($title) ?  $message : 'Добавлено',
				]);
// echo $message;
		return new HtmlResponse($content);
}
private function AddCategory($title, &$message){
	$count = DB::table('categories')->where('title', '=', $title)->count();
	if($count==0){
		DB::table('categories')->insert(
    	array('title' => $title)
		);
	}
	// 	$message.="Добавлено";
	// 	// {
	// 	// 	error: '',
	// 	// 	success: true
	// 	// }
	// }
	else
	{
		// {
		// 	error: 'record already exist',
			// success: false
		// }
		$message.="Не добавлено. Категория уже существует";
	}
	return $count;
}


}

 ?>