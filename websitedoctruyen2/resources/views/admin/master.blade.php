<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.blocks.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          @include('admin.blocks.header')
        </nav>
        <nav class="bottom-navbar">
          @include('admin.blocks.menu')
        </nav>
      </div>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              @yield('content')
            </div>
            @include('admin.blocks.footer')
          </div>
        </div>
      </div>
    </div>
    @include('admin.blocks.foot')
  </body>
</html>