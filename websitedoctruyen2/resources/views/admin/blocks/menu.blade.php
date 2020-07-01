<div class="container">
    <ul class="nav page-navigation">
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="mdi mdi-home-variant menu-icon"></i>
          <span class="menu-title">Home</span>
        </a>
      </li>
      <li class="nav-item">
          <a href="{{route('admin.category.list')}}" class="nav-link">
            <i class="mdi mdi-cube-outline menu-icon"></i>
            <span class="menu-title">Chuyên Mục</span>
            <i class="menu-arrow"></i>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{route('admin.author.list')}}" class="nav-link">
            <i class="mdi mdi-face menu-icon"></i>
            <span class="menu-title">Tác Giả</span>
            <i class="menu-arrow"></i>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{route('admin.story.list')}}" class="nav-link">
            <i class="mdi mdi-book-open-variant menu-icon"></i>
            <span class="menu-title">Truyện</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="submenu">
            <ul>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.story.list')}}">Danh Sách Truyện</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.story.chapter.show')}}">Danh Sách Chương</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.story.create')}}">Thêm Mới Truyện</a></li>
            </ul>
        </div>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="mdi mdi-lock menu-icon"></i>
            <span class="menu-title">Thành Viên</span>
            <i class="menu-arrow"></i>
          </a>
      </li>
    </ul>
</div>