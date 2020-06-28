 <!-- Brand Logo -->
 <a href="{{route('home')}}" class="brand-link">
  <img src="{{ asset('dist/img/AdminLTELogo.png') }}"alt="AdminLTE Logo"class="brand-image img-circle elevation-3"style="opacity: .8">
  <span class="brand-text font-weight-light">Trang Quản Trị</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
        <li class="nav-item">
          <a href="{{route('admin.category.list')}}" class="nav-link">
            <i class="nav-icon far fa-folder"></i>
            <p>
              Chuyên Mục
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.author.list')}}" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Tác Giả
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{route('admin.story.list')}}" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Truyện
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.story.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh Sách Truyện</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{route('admin.story.chapter.show')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh Sách Chương</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.story.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Truyện Mới</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fa fa-lock"></i>
            <p>
              Thành Viên
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon 	fas fa-cog"></i>
            <p>
              Cài Đặt Hệ Thống
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-pen"></i>
            <p>
              Chỉnh Sửa Điều Khoản
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->