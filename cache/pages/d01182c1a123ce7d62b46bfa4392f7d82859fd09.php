<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../pages/assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    

    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="../pages/assets/img/photo1.png">
          </div>
          <a href="#!user"><img class="circle" src="../pages/assets/img/avatar04.png"></a>
          <a href="#!name"><span class="white-text name">Welcome back,</span></a>
          <a href="#!email"><span class="white-text email"><?php echo e($name); ?></span></a>
        </div>
      </li>

      <li>
        <form class="sidebar-form">
          <div class="input-group">
            <input id="accounts" type="text" name="username" class="form-control" placeholder="Universal Search" autocomplete="off" />
          </div>
        </form>
      </li>

      <li><a class="active" href="cabinet/1"><i class="material-icons pink-item">dashboard</i>Личный кабинет</a></li>
      <li><div class="divider"></div></li>

      <li><a class="subheader">Управление</a></li>
      <li><a href="names.html"><i class="material-icons pink-item">thumbs_up_down</i>Добавить категорию</a></li>
      <li><a href="comments.html"><i class="material-icons pink-item">person</i>Добавить автора</a></li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a href="comments.html" class="collapsible-header">Добавить книгу<i class="material-icons pink-item">note_add</i></a>
           
          </li>
        </ul>
      </li>

      
    </ul>
    <main>
    <section class="content">
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">// Личный кабинет </h1></div>
      <!-- Stat Boxes -->
      <div class="row">
        


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
            </div>
          </div>
        </section>
        </main>
        <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
              © 2017 Farooq Designs. All rights reserved.
            </div>
          </div>
        </footer>

        <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
        in the materialize js file & I don't want that.
        -->
        <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <script>
        // Hide sideNav
        $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens
          });
          $(document).ready(function(){
          $('.tooltipped').tooltip({delay: 50});
          });
          $('select').material_select();
          $('.collapsible').collapsible();
          </script>
          <div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped" data-position="top" data-delay="50" data-tooltip="Quick Links">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip="Handbook" href="#"><i class="material-icons">insert_chart</i></a></li>
              <li><a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Staff Applications" href="#"><i class="material-icons">format_quote</i></a></li>
              <li><a class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Name Guidelines" href="#"><i class="material-icons">publish</i></a></li>"
              <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Issue Tracker" href="#"><i class="material-icons">attach_file</i></a></li>
              <li><a class="btn-floating orange tooltipped" data-position="top" data-delay="50" data-tooltip="Support" href="#"><i class="material-icons">person</i></a></li>
            </ul>
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      </body>
    </html>
