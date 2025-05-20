 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- 02-Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- 01-Brand Logo -->
    <a href="/" class=" brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="Evinsto Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="text-xl text-green-300  font-weight-bold">GRH</span>
    </a>

    <!-- 02Sidebar -->
    <div class="sidebar ">
      <!-- 03-Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile.edit')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @if(auth()->check() && auth()->user()->usertype === 'admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

          <li class="nav-item">
            <a href="{{ route('admin.employees')}}" class="nav-link {{ Request::segment(2) === 'employees' ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Employees</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('admin.emplois')}}" class="nav-link {{ Request::segment(2) === 'emplois' ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Jobs</p>
            </a>
        </li>
        {{-- Jobs  History --}}
          <li class="nav-item">
            <a href="{{ route('admin.emplois_histories')}}" class="nav-link {{ Request::segment(2) === 'emplois_histories' ? 'active' : '' }}">
                <i class="nav-icon fas fa-history"></i>
                <p>Jobs  History</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-star"></i>
                <p>Jobs  Grades</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-asterisk "></i>
              <p>Regions</p>
          </a>
       </li>
       <li class="nav-item">
        <a href="{{ route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-flag"></i>
            <p>Countries</p>
        </a>
    </li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Locations</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Departement</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Manager</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Pay Roll</p>
            </a>
        </li>
        

         


      @endif
      @if(auth()->check() && auth()->user()->usertype === 'employees')
      <li class="nav-item">
        {{-- <a href="{{ route('admin.dashboard')}}" class="nav-link"> --}}
            <i class="nav-icon fas fa-asterisk "></i>
            <p>employees 1</p>
        </a>
      </li>
      <li class="nav-item">
        {{-- <a href="{{ route('admin.dashboard')}}" class="nav-link"> --}}
            <i class="nav-icon fas fa-asterisk "></i>
            <p>employees 2</p>
        </a>
     </li
      <li class="nav-item">
        {{-- <a href="{{ route('admin.dashboard')}}" class="nav-link"> --}}
            <i class="nav-icon fas fa-asterisk "></i>
            <p>employees 3</p>
        </a>
     </li
      @endif
            @if (Auth::user()->user_type === 1) {{-- Admin --}}
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
    
                {{-- 03-Gestion des Administrateurs --}}
                <li class="nav-item">
                    <a href="{{ url('admin/admin/list') }}" class="nav-link {{ Request::segment(2) === 'admin' ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>Admin</p>
                    </a>
                </li>
                {{-- 02-Gestion des Student --}}
                <li class="nav-item">
                    <a href="{{ url('admin/student/list') }}" class="nav-link {{ Request::segment(2) === 'student' ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>Student</p>
                    </a>
                </li>
    
                {{-- 03-Gestion des Filières --}}
                <li class="nav-item">
                    <a href="{{ url('admin/filiere/list') }}" class="nav-link {{ Request::segment(2) === 'filiere' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Filières</p>
                    </a>
                </li>
    
                {{-- 04-Gestion des Spécialités --}}
                <li class="nav-item">
                    <a href="{{ url('admin/specialite/list') }}" class="nav-link {{ Request::segment(2) === 'specialite' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Spécialités</p>
                    </a>
                </li>
    
                {{-- 05-Gestion des Intitulés --}}
                <li class="nav-item">
                    <a href="{{ url('admin/intitule/list') }}" class="nav-link {{ Request::segment(2) === 'intitule' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Intitulés</p>
                    </a>
                </li>
    
                {{-- 06-Gestion des Unités d'Enseignement --}}
                <li class="nav-item">
                    <a href="{{ url('admin/ue/list') }}" class="nav-link {{ Request::segment(2) === 'ue' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Attribuer UE</p>
                    </a>
                </li>
    
                {{-- 07-Gestion de l'Année Scolaire --}}
                <li class="nav-item">
                    <a href="{{ url('admin/annee-scolaire/list') }}" class="nav-link {{ Request::segment(2) === 'annee-scolaire' ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Année Scolaire</p>
                    </a>
                </li>
    
                {{-- 08-Gestion des Niveaux --}}
                <li class="nav-item">
                    <a href="{{ url('admin/niveau/list') }}" class="nav-link {{ Request::segment(2) === 'niveau' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Niveaux</p>
                    </a>
                </li>
    
                {{-- 09-Gestion des Semestres --}}
                <li class="nav-item">
                    <a href="{{ url('admin/semestre/list') }}" class="nav-link {{ Request::segment(2) === 'semestre' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Semestres</p>
                    </a>
                </li>
    
                {{-- 10-Modifier Password --}}
                <li class="nav-item">
                    <a href="{{ url('admin/change_password') }}" class="nav-link {{ Request::segment(2) === 'change-pass' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Modifier Password</p>
                    </a>
                </li>
    
            @elseif (Auth::user()->user_type === 2) {{-- Teacher --}}
                <li class="nav-item">
                    <a href="{{ url('teacher/dashboard') }}" class="nav-link {{ Request::segment(2) === 'teacher' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
    
                {{-- Modifier Password --}}
                <li class="nav-item">
                    <a href="{{ url('teacher/change_password') }}" class="nav-link {{ Request::segment(2) === 'change-pass' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Modifier Password</p>
                    </a>
                </li>
    
            @elseif (Auth::user()->user_type === 3) {{-- Student --}}
                <li class="nav-item">
                    <a href="{{ url('student/dashboard') }}" class="nav-link {{ Request::segment(2) === 'student' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
    
                {{-- Modifier Password --}}
                <li class="nav-item">
                    <a href="{{ url('student/change_password') }}" class="nav-link {{ Request::segment(2) === 'change-pass' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Modifier Password</p>
                    </a>
                </li>
    
            @elseif (Auth::user()->user_type === 4) {{-- Parent --}}
                <li class="nav-item">
                    <a href="{{ url('parent/dashboard') }}" class="nav-link {{ Request::segment(2) === 'parent' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
    
                {{--01- Modifier Password --}}
                <li class="nav-item">
                    <a href="{{ url('parent/change_password') }}" class="nav-link {{ Request::segment(2) === 'change-pass' ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>Modifier Password</p>
                    </a>
                </li>
            @endif
            
            {{-- 02-Lien de Déconnexion --}}
            
            <li class="nav-item ">
                     <a href="{{ route('profile.edit')}}" class="nav-link {{ Request::segment(2) === 'Profile' ? 'active' : '' }}">
                      <i class="text-green-400 nav-icon fas fa-pencil-alt"></i> 
                      <p class="text-white">Profile</p>
                   </a>
             </li>

            <li class="nav-item ">
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}"  class="nav-link {{ Request::segment(2) === 'Logout' ? 'active' : '' }}  hover:bg-gray-600 "
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <i class="text-red-600 nav-icon fas fa-power-off"></i>
                    <p class="text-white ">Logout</p>
                </a>
            </form>
                {{-- <a href="{{ route('logout') }}" class="nav-link">
                    <i class="text-red-600 nav-icon fas fa-power-off"></i>
                    <p class="text-white">Logout</p>
                </a> --}}
            </li>
    
        </ul>
      </nav>
    
    
    
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>