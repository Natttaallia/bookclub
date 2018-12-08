
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

<div style='display:flex;justify-content: center;' >	
 <ul class='pagination'>
    

    <?php if($page==0): ?> <li class='disabled'>
    <?php else: ?> <li class='waves-effect'>
    <?php endif; ?>

    <a 
    <?php if($page!=0): ?> href='/$page'
    <?php endif; ?> 
    ><i class='material-icons'>chevron_left</i></a></li>
 	


 	 <?php for($i=1; $i <= $page_count; $i++): ?>


 	 <?php if($i==1 || $i==$page_count || (($i<=$page+1) && ($i>=$page-5)) || (($i>=$page+1) && ($i<=$page+6))): ?>	
   <li 
      <?php if($page+1==$i): ?> class='active'
      <?php else: ?> class='waves-effect'
      <?php endif; ?>
   ><a href='/<?php echo e($i); ?>'><?php echo e($i); ?></a></li>
 
		
		<?php elseif($i<$page && $flag_left): ?>
		
			<li class='waves-effect'><a>...</a></li>
		<?php echo e($flag_left=!$flag_left); ?>

		<?php elseif($i>$page && $flag_right): ?>
		
			<li class='waves-effect'><a>...</a></li>
    <?php echo e($flag_right=!$flag_right); ?>

		
    <?php endif; ?>


	 <?php endfor; ?>
    
    <li 
    <?php if($page+1==$page_count): ?> class='disabled'
    <?php else: ?> class='waves-effect'
    <?php endif; ?>
    ><a 
    <?php if($page+1!=$page_count): ?> 
     href='/<?php echo e($page+2); ?>'
     <?php endif; ?>
     ><i class='material-icons'>chevron_right</i></a></li>
  </ul>
</div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
</body>
</html>