
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

            <li class="nav-item {{ Request::is('dokumentasi') ? 'active' : ''}}"><a href="/dokumentasi"><i class="ft-book"></i><span class="menu-title" data-i18n="">Dokumentasi cuy ☝</span></a>
            </li>

            @can('admin')
                
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Admin</span>
            </h6>
            
            <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : ''}}"><a href="/admin/dashboard"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Master</span>
            </h6>
            <li class="nav-item {{ Request::is('admin/master/user*') ? 'active' : ''}}"><a href="/admin/master/user"><i class="fas fa-user"></i><span class="menu-title" data-i18n="">User</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/master/kelas*') ? 'active' : ''}}"><a href="/admin/master/kelas"><i class="fas fa-university"></i><span class="menu-title" data-i18n="">Kelas</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/master/mapel*') ? 'active' : ''}}"><a href="/admin/master/mapel"><i class="fas fa-book"></i><span class="menu-title" data-i18n="">Mapel</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/master/rencana_penilaian*') ? 'active' : ''}}"><a href="/admin/master/rencana_penilaian"><i class="fas fa-tasks"></i><span class="menu-title" data-i18n="">Rencana Penilaian</span></a>
            </li>

            @endcan

            @can('guru')
                
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Guru</span>
            </h6>

            <li class="nav-item {{ Request::is('guru/dashboard*') ? 'active' : ''}}"><a href="/guru/dashboard"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Penilaian</span>
            </h6>

            <li class="nav-item {{ Request::is('guru/penilaian/nama_nilai*') ? 'active' : ''}}"><a href="/guru/penilaian/nama_nilai"><i class="fas fa-star-half-alt"></i><span class="menu-title" data-i18n="">Rencana Penilaian</span></a>
            </li>

            <li class="nav-item {{ Request::is('guru/penilaian/nilai_siswa*') ? 'active' : ''}}"><a href="/guru/penilaian/nilai_siswa"><i class="fas fa-plus-circle"></i><span class="menu-title" data-i18n="">Create Nilai Siswa</span></a>
            </li>

            <li class="nav-item {{ Request::is('guru/penilaian/data_nilai_siswa*') ? 'active' : ''}}"><a href="/guru/penilaian/data_nilai_siswa"><i class="fas fa-plus-circle"></i><span class="menu-title" data-i18n="">Data Nilai Siswa</span></a>
            </li>

            @endcan

            @can('siswa')

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-2 mt-1 text-muted text-uppercase">
              <span>Siswa</span>
            </h6>

            <li class="nav-item {{ Request::is('siswa/dashboard*') ? 'active' : ''}}">
              <a href="/siswa/dashboard"><i class="ft-home"></i><span class="menu-title">Dashboard</span></a>
            </li>

            <li class="nav-item {{ Request::is('siswa/show/nilai*') ? 'active' : ''}}">
              <a href="/siswa/show/nilai"><i class="ft-user"></i><span class="menu-title">Nilai Siswa</span></a>
            </li>

            @endcan

          </ul>
        </div>
        <div class="navigation-background"></div>
    </div>
  
  