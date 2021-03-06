<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar pt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item mb-2">
            <a href="{{ route('personal') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Главная 
              </p>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="{{ route('personal.liked.index') }}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Понравившиеся посты
              </p>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="{{ route('personal.comment.index') }}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Комментарии
              </p>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="{{ route('main.index') }}" class="nav-link">
              <i class="nav-icon fab fa-blogger-b"></i>
              <p>
                Мой блог
              </p>
            </a>
          </li>
        </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
