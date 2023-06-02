 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{ asset('back/images/download.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard Rs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('back/images/pp.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ @Auth::user()->name}} ( {{@Auth::user()->level}} )</a>
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
          <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-people-fill "></i>
              <p>
                News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{  url('news')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('news/form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-book"></i>
              <p>
                Kategori News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{  url('kategorinews')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{  url('kategorinews/form')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-book-half"></i>
              <p>
                Galeri foto
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('galeri_foto')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('galeri_foto/form')  }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-book-half"></i>
              <p>
                Galeri video
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('galeri_video')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('galeri_video/form')  }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>

              <li class="nav-item ">
              <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-tablet-landscape"></i>
              <p>
                profil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{   url('profile')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{  url('profile/form')  }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
            

            <li class="nav-item">
                <a href="{{route('signout')}}" class="nav-link text-danger">
                  <i class="bi bi-arrow-bar-right nav-icon"></i>
                  <p>Log out</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>