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