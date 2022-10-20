
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" >
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">       
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="https://i.pinimg.com/originals/59/6a/9b/596a9bc5581001c529d95120615c7802.jpg"/>
                <h3 class="brand-text">Beliau 😅☝</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
          </ul>
        </div>
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Admin</span>
            </h6>
            <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : ''}}"><a href="/admin/dashboard"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class="nav-item {{ Request::is('dokumentasi') ? 'active' : ''}}"><a href="/dokumentasi"><i class="ft-book"></i><span class="menu-title" data-i18n="">Dokumentasi cuy ☝</span></a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Master</span>
            </h6>
            <li class="nav-item {{ Request::is('admin/master/user') ? 'active' : ''}}"><a href="/admin/master/user"><i class="fas fa-user"></i><span class="menu-title" data-i18n="">User</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/master/kelas') ? 'active' : ''}}"><a href="/admin/master/kelas"><i class="fas fa-university"></i><span class="menu-title" data-i18n="">Kelas</span></a>
            </li>
            <li class="nav-item"><a href="buttons.html"><i class="fas fa-book"></i><span class="menu-title" data-i18n="">Mapel</span></a>
            </li>
            <li class="nav-item"><a href="typography.html"><i class="fas fa-tasks"></i><span class="menu-title" data-i18n="">Assign Guru Mapel</span></a>
            </li>
          </ul>
        </div>
        <div class="navigation-background"></div>
    </div>
  
  