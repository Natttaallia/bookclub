  <?php $__env->startSection('title'); ?>
    Личный кабинет
  <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('content'); ?>
        


<?php if(count($data)>0): ?>
                <h3 class="center-align">Перечень книг</h3>
                <div class="custom-responsive">
                  
                  <table class="striped hover centered">

                    <thead><tr>
                      <th>Название</th>
                      <th>Автор</th>
                      <th>Категория</th>
                      <th>Обложка</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($value["title"]); ?></td>
                      <td><?php echo e($value["author_name"]); ?></td>
                      <td><?php echo e($value["category_name"]); ?></td>
                      <td><img src='<?php echo e($value["url"]); ?>' style="width:100px"></td>
                      <td>
                  <div class="btn-toolbar">
                    <a href="#">
                      <button class="btn green" type="submit" value="Accept">
                      <i class="material-icons">done</i>
                      </button>
                    </a>
                    <a href="#">
                      <button class="btn red" type="submit" value="Reject">
                      <i class="material-icons">remove</i>
                      </button>
                    </a>
                  </div>
                </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>

            <?php echo $__env->make('pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php else: ?>
<h3 class="center-align">Нет книг</h3>
<?php endif; ?>
           <?php $__env->stopSection(); ?>
        

       
<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>