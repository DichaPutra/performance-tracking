<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<!--<div class="sidebar-heading">
    Main Function
</div>-->

<li class="nav-item @if($page=='adminHome') active @endif">
    <a class="nav-link" href="{{route('admin.home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Registrasi</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item @if($page=='dataLibrary') active @endif">
    <a class="nav-link" href="" data-toggle="collapse" data-target="#collapseDataLibrary">
        <i class="fas fa-fw fa-book"></i>
        <span>Library</span>
    </a>
    <div id="collapseDataLibrary" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('admin.datalibrary.businesscategories')}}">Business Categories</a>
            <a class="collapse-item" href="{{route('admin.datalibrary.datalibrary')}}">Data Library</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!--<div class="sidebar-heading">
    Account Management
</div>-->

<!--Change Password-->
<li class="nav-item @if($page=='changepass')active @endif">
    <a class="nav-link" href="{{route('change.password')}}">
        <i class="fas fa-fw fa-lock"></i>
        <span>Change Password</span></a>
</li>
<!-- Logout -->
<li class="nav-item" style="margin-top: -10px; margin-left: 4px;">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <span>{{ __('Logout') }}</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </a>
</li>

<!--Minimize Sidebar-->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

