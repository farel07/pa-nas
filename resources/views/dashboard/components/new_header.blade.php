<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">@yield('submenu')</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">@yield('menu')
                </li>
                <li class="breadcrumb-item active">@yield('submenu')
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>