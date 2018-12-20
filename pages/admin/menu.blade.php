<ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="../pages/assets/img/photo1.png">
          </div>
          <a href="#!user"><img class="circle" src="../pages/assets/img/avatar04.png"></a>
          <a href="#!name"><span class="white-text name">Welcome back,</span></a>
          <a href="#!email"><span class="white-text email">{{ $name }}</span></a>
        </div>
      </li>

      <li>
        <form class="sidebar-form">
          <div class="input-group">
            <input id="accounts" type="text" name="username" class="form-control" placeholder="Universal Search" autocomplete="off" />
          </div>
        </form>
      </li>

      <li><a class="active" href="../cabinet/1"><i class="material-icons pink-item">dashboard</i>Личный кабинет</a></li>
      <li><div class="divider"></div></li>

      <li><a class="subheader">Управление</a></li>
      <li><a href="../cabinet/categories"><i class="material-icons pink-item">thumbs_up_down</i>Добавить категорию</a></li>
      <li><a href="../cabinet/authors"><i class="material-icons pink-item">person</i>Добавить автора</a></li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a href="comments.html" class="collapsible-header">Добавить книгу<i class="material-icons pink-item">note_add</i></a>
           {{--  <div class="collapsible-body">
              <ul>
                <li><a href="userdetails.html">User Detail</a></li>
                <li><a href="recentusers.html">Recent Users</a></li>
                <li><a href="reports.html">Reports</a></li>
              </ul>
            </div> --}}
          </li>
        </ul>
      </li>

      {{-- <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Announcements<i class="material-icons pink-item">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="addannoun.html">Add New</a></li>
                <li><a href="allannoun.html">All Announcements</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li> --}}
    </ul>