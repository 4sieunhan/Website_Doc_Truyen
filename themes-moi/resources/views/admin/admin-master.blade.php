<!DOCTYPE html>
<html>
   <head>
      @include('admin.blocks.head')
   </head>
   <body class="theme-red">
      <!-- Page Loader -->
      <div class="page-loader-wrapper">
         @include('admin.blocks.page-loader')
      </div>
      <!-- #END# Page Loader -->
      <!-- Overlay For Sidebars -->
      <div class="overlay"></div>
      <!-- #END# Overlay For Sidebars -->
      <!-- Search Bar -->
      <div class="search-bar">
         @include('admin.blocks.search')
      </div>
      <!-- #END# Search Bar -->
      <!-- Top Bar -->
      <nav class="navbar">
         @include('admin.blocks.navbar')
      </nav>
      <!-- #Top Bar -->
      <section>
         <!-- Left Sidebar -->
         @include('admin.blocks.aside-left')
         <!-- #END# Left Sidebar -->
         <!-- Right Sidebar -->
         @include('admin.blocks.aside-right')
         <!-- #END# Right Sidebar -->
      </section>
      <section class="content">
         <div class="container-fluid">
            @yield('content')
         </div>
      </section>
      @include('admin.blocks.foot')
   </body>
</html>
