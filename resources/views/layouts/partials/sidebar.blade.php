<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('lte/index3.html')}}" class="brand-link">
      <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cibunut</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                  <i class="nav-icon  fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fas fa-th"></i>
              <p>
                Kelola Konten
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('lte/index.html')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/berita')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
             
             
              <li class="nav-item">
                <a href="{{asset('lte/index3.html')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu Landing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('lte/index2.html')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Header</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('lte/index2.html')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Tentang Kami</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fas fa-globe"></i>
              <p>
                Kelola Website
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('lte/index.html')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO</p>
                </a>
              </li>
         
             
              <li class="nav-item">
                <a href="{{asset('lte/index3.html')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu Landing</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/pengguna')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>