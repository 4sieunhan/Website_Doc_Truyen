<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Trang Quản Trị</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user (optional) -->
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.category.list')}}" class="nav-link">
                      <i class="nav-icon fas fa-folder"></i>
                      <p>Chuyên Mục</p>
                    </a>
                </li>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user-alt"></i>
                      <p>Tác Giả</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                        Truyện
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-frown"></i>
                          <p>Danh Sách Truyện</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-meh"></i>
                          <p>Danh Sách Chương</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fas fa-frown"></i>
                          <p>Thêm Mới Truyện</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas far fa-id-badge"></i>
                    <p>Thành Viên</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-bars"></i>
                  <p>Cài Đặt Hệ Thống</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-cloud"></i>
                  <p>Chỉnh Sửa Điều Khoản</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>