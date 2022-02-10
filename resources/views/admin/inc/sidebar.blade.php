<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="{{ route('admin') }}" class="brand-link">
      <i class="nav-icon  img-circle elevation-3 fab fa-blogger"></i>
      <span class="brand-text font-weight-light">Blog</span>
    </a> -->
    <!-- /.Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Главная 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Пользователи
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Посты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Категории
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.tag.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Тэги
              </p>
            </a>
          </li>
        </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
