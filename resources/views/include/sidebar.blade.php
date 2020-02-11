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
        @if(Auth::user()->name == "Administrador")
        {{--
            * AQUI ES EL SHOW DEL ADMINISTRADOR *
        --}}
        <a href="{{route('admin.index')}}" class="d-block">{{Auth::user()->name}}</a>
        @else
        <a href="{{route('docente.index')}}" class="d-block">{{Auth::user()->name}}</a>
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
          @if(Auth::user()->name == "Administrador")
          <li class="nav-item has-treeview">
            <a href="{{route('docente.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Docente
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              @if(Auth::user()->name == "Administrador")
              <p>
                Tabla del docente
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Ingreso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Egreso</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Ingreso Formularios
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Registrar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../forms/advanced.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Roles</p>
                    </a>
                  </li>
                </ul>
              </li>
            @else
            <p>
                Tabla de registro
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Período Escolar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                  <p>Sección</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Ingreso Formularios
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                      <p>Registrar</p>
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
