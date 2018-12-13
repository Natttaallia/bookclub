
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
	<link rel='stylesheet' type='text/css' href='/pages/style.css'>
</head>
<body>
<nav>	
	<a href='..\register' class='subbtn'>Зарегистрироваться</a>
	<a href='..\login' class='subbtn'>Войти</a>
</nav>
<div class='container'>


<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

<div class='z-depth-3 book'>
	<div class='picture'>	
<img src='<?php echo e($value["url"]); ?>'>
	</div>
<h5>Автор</h5>
<p><?php echo e($value["author_name"]); ?></p>	
<h5>Название</h5>	
<p><?php echo e($value["title"]); ?></p>	
<h5>Категория</h5>
<p><?php echo e($value["category_name"]); ?></p>	
</div>
 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

</div>

<?php echo $__env->make('pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;



<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
</body>
</html>