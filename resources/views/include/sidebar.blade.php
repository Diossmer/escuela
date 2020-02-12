<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset("assets/img/AdminLTELogo.png")}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app_name','Laravel')}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("assets/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @if(Auth::user()->hasAnyRole('administrador'))
        <a href="{{route('admin.show',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>
        @else
        <a href="{{route('docente.show',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>
        @endif
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{url('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <span class="badge badge-info right">100</span>
              </p>
            </a>
          </li>
          {{-- @if(Auth::user()->name == "Administrador")
          @endif --}}
          @if(Auth::user()->hasAnyRole('administrador'))
            <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Visualizar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Administrador</p>
                    </a>
                  </li>
                <li class="nav-item">
                <a href="{{route('admin.user')}}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                  <p>Docente</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tablet-alt"></i>
                  <p>
                    Tabla
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <i class="fas fa-table nav-icon"></i>
                      <p>Roles</p>
                    </a>
                  </li>
                </ul>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Registros de datos
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('roles.create')}}" class="nav-link">
                            <i class="fas fa-file-alt nav-icon"></i>
                          <p>Roles</p>
                        </a>
                      </li>
                    <li class="nav-item">
                    <a href="{{route('admin.create')}}" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Docente</p>
                    </a>
                  </li>
                </ul>
              </li>
            @else
            <li class="nav-item">
                <a href="{{route('docente.index')}}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                  <p>Docente</p>
                </a>
              </li>
            <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
                <p>
                Tabla de registro
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Período escolar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Sección escolar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Representante</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Alumno escolar</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Registros de datos
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Período escolar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Sección escolar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Representante</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Alumno escolar</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          <li class="nav-header">Archivo</li>
          <li class="nav-item">
            <a href="{{route("pdf")}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documento</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
