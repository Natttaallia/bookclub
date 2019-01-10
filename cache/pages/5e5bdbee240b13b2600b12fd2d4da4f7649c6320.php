  <?php $__env->startSection('title'); ?>
    Добавление категории
  <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('content'); ?>


<?php if(!empty($title)): ?>
<h3><?php echo e($mes); ?></h3>
<?php endif; ?>
<form action='' method='post' enctype='multipart/form-data' style="width:70%;margin:15%">
		<p><label>Наименование категории: </label> <input type='text' name='title' id='add'></p>
		
		<p><input type='submit' class='btn waves-effect waves-light'  value='Добавить'></p>

 </form>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>