<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" style="color: #007bff">Fx Intense Investment Management Admin Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


    

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    {{--   <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}


<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="color: #23a9e1">
          <i class="far fa-user">&nbsp;</i><span>Faisal Mia</span>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.logout') }}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Logout
          </a>
        
        </div>
      </li>



    </ul>
  </nav>