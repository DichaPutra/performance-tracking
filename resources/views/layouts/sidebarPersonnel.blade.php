<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">


<li class="nav-item @if($page=='dashboard')active @endif">
    <a class="nav-link" href="{{route('personnel.home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

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

