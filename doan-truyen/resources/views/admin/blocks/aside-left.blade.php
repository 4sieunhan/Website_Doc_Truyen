<aside id="leftsidebar" class="sidebar">
	<!-- User Info -->
	@include('admin.blocks.user-info')
	<!-- #User Info -->
	<!-- Menu -->
	<div class="menu">
		<ul class="list">
			<li class="header">THANH ĐIỀU HƯỚNG</li>
			<li class="active">
				<a href="{{route('admin.home')}}">
				<i class="material-icons">home</i>
				<span>Home</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.category.list')}}">
				<i class="material-icons">folder</i>
				<span>Chuyên Mục</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.author.list')}}">
				<i class="material-icons">person_add</i>
				<span>Tác Giả</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="menu-toggle">
				<i class="material-icons">book</i>
				<span>Truyện</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="{{route('admin.story.list')}}">Danh Sách Truyện</a>
					</li>
					<li>
						<a href="{{route('admin.story.chapter.show')}}">Danh Sách Chương</a>
					</li>
					<li>
						<a href="{{route('admin.story.create')}}">Thêm Truyện Mới</a>
					</li>
				</ul>
            </li>
            <li>
				<a href="#">
				<i class="material-icons">person_pin</i>
				<span>Thành Viên</span>
				</a>
            </li>
            <li>
				<a href="#">
				<i class="material-icons">settings</i>
				<span>Cài Đặt</span>
				</a>
            </li>
            <li>
				<a href="#">
				<i class="material-icons">new_releases</i>
				<span>Chỉnh Sửa Điều Khoản</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- #Menu -->
	<!-- Footer -->
	<div class="legal">
		<div class="copyright">
			&copy; 2020 <a href="javascript:void(0);">Đồ Án Web Truyện</a>.
		</div>
		<div class="version">
			<b>Make By </b> <i>Team 8</i>
		</div>
	</div>
	<!-- #Footer -->
</aside>
