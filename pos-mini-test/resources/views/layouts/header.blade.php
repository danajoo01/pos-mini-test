<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
    data-class="c-sidebar-show">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>
<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
    <span><i class="cil-cart"></i> {{ config('app.name') }}</span>
</a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
    data-class="c-sidebar-lg-show" responsive="true">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>
<ul class="c-header-nav mfs-auto">
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            <div class="c-avatar">
                <i class="cil-list-rich"></i>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0 mr-3">
            <div class="dropdown-header bg-light py-2"><strong>Pengguna</strong></div>
            <div class="px-4 pt-3 pb-2">
                <div class="font-weight-bold font-sm">{{ Auth::user()->name ?? '-' }}</div>
                <div>{{ Auth::user()->email ?? '-' }}</div>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="c-icon mfe-2 cil-account-logout"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>
<div class="c-subheader justify-content-between px-3">
    @yield('breadcrumb')
</div>
