<?php 
error_reporting(E_ERROR );

include ('..\vendor/autoload.php');
use App\DB;



$count=9;
if(isset($_GET["page"]))$page=$_GET["page"]-1;
else $page=0;
$start=$page*$count;
$dbc=new DB();

$data=$dbc->getData(
	['*'], 
	[],
	'books',
	$start,
	$count
);
// var_dump($data);
$allbooks=$dbc->getData(['*'],[],'books');
$page_count=ceil(count($allbooks)/$count);	



function getStringById($id,$column,$table){
$dbc=new DB();
$pas=$dbc->getValue($column,$table,['id' => $id]);
return $pas[0][$column];
}

$content="
 
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<nav>	
	<a href='..\register' class='subbtn'>Зарегистрироваться</a>
	<a href='..\login' class='subbtn'>Войти</a>
</nav>
<div class='container'>";


foreach ($data as $value) {
$content.="
<div class='z-depth-3 book'>
	<div class='picture'>	
<img src=";$content.=$value["url"].">
	</div>
<h5>Автор</h5>
<p>".getStringById($value["author_id"],'name','authors')."</p>	
<h5>Название</h5>	
<p>".$value["title"]."</p>	
<h5>Категория</h5>
<p>".getStringById($value["category_id"],'title','categories')."</p>	
</div>";
 
}
 
$content.="
</div>

<div style='display:flex;justify-content: center;' >	
 <ul class='pagination'>
    <li ";

    if ($page==0) $content.="class='disabled'";
    else $content.="class='waves-effect'";

    $content.="><a ";
    if($page!=0) { 
    $content.=" href='/".$page;
    } 
    $content.=" ><i class='material-icons'>chevron_left</i></a></li>";
 	
 	$flag_left=true;
 	$flag_right=true;

 	 for ($i=1; $i <= $page_count; $i++) {  
 	 if($i==1 || $i==$page_count || (($i<=$page+1) && ($i>=$page-5)) || (($i>=$page+1) && ($i<=$page+6)))	{
 	
   $content.=" <li ";
   if($page+1==$i) $content.="class='active'";
   else $content.="class='waves-effect'";
   $content.="><a href='/".$i.">".$i."</a></li>";
 
		}
		else if($flag_left && $i<$page)
		{
			$flag_left=false;
			$content.="<li class='waves-effect'><a>...</a></li>";
		}
		else if($flag_right&& $i>$page)
		{
			$flag_right=false;
			$content.="<li class='waves-effect'><a>...</a></li>";
		}


	}
    $content.="
    <li ";
    if($page+1==$page_count) $content.="class='disabled'";
    else $content.="class='waves-effect'";
    $content.="><a ";
    if($page+1!=$page_count) { 
    $content.=" href='/".$page+2;
     } $content.="><i class='material-icons'>chevron_right</i></a></li>
  </ul>
</div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
</body>
</html>";

return $content;

 ?>