<?php 
include ('..\vendor/autoload.php');
use App\DB;



$count=9;
if(isset($_GET["page"]))$page=$_GET["page"]-1;
else $page=0;
$start=$page*$count;
$end=$start+$count;
$data=require('src.small.php');
if($end>count($data))$end=count($data);
$page_count=ceil(count($data)/$count);	

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav>	
	<a href="..\register" class="subbtn">Зарегистрироваться</a>
	<a href="..\login" class="subbtn">Войти</a>
</nav>
<div class="container">
<?php 	
for ($i=$start; $i < $end; $i++) { 
 ?>
<div class="z-depth-3 book">
	<div class="picture">	
<img src=<?=$data[$i]["image"]?>>
	</div>
<h5>Автор</h5>
<p><?=$data[$i]["author"]?></p>	
<h5>Название</h5>	
<p><?=$data[$i]["title"]?></p>	
<h5>Категория</h5>
<p><?=$data[$i]["category"]?></p>	
</div>
 <?php 	
}
  ?>

</div>

<div style="display:flex;justify-content: center;" >	
 <ul class="pagination">
    <li <?php echo ($page==0) ? "class='disabled'" : "class='waves-effect'" ?>><a <?php if($page!=0) { ?> href="/<?=$page?>" <?php } ?> ><i class="material-icons">chevron_left</i></a></li>
 	<?php  	
 	$flag_left=true;
 	$flag_right=true;

 	 for ($i=1; $i <= $page_count; $i++) {  
 	 if($i==1 || $i==$page_count || (($i<=$page+1) && ($i>=$page-5)) || (($i>=$page+1) && ($i<=$page+6)))	{
 	 ?>
    <li <?php echo ($page+1==$i) ? "class='active'" : "class='waves-effect'" ?> ><a href="/<?=$i ?>"><?=$i ?></a></li>
    <?php 	
		}
		else if($flag_left && $i<$page)
		{
			$flag_left=false;
			echo "<li class='waves-effect'><a>...</a></li>";
		}
		else if($flag_right&& $i>$page)
		{
			$flag_right=false;
			echo "<li class='waves-effect'><a>...</a></li>";
		}


	}
     ?>
    <li <?php echo ($page+1==$page_count) ? "class='disabled'" : "class='waves-effect'" ?>><a <?php if($page+1!=$page_count) { ?> href="/<?=$page+2?>" <?php } ?>><i class="material-icons">chevron_right</i></a></li>
  </ul>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>