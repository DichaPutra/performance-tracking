<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">


<li class="nav-item @if($page=='dashboard')active @endif">
    <a class="nav-link" href="{{route('personnel.home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<li class="nav-item @if($page=='target')active @endif">
    <a class="nav-link" href="{{route('personnel.target')}}">
        <i class="fas fa-fw fa-bullseye"></i>
        <span>Target</span></a>
</li>

<li class="nav-item @if($page=='capaian')active @endif">
    <a class="nav-link" href="{{route('personnel.capaian')}}">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>Capaian</span></a>
</li>

<li class="nav-item @if($page=='performancereport')active @endif">
    <a class="nav-link" href="{{route('personnel.performancereport')}}">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Performance Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item @if($page=='initiative')active @endif">
    <a class="nav-link" href="{{route('personnel.initiative.kpi')}}">
        <i class="fas fa-fw fa-lightbulb"></i>
        <span>Initiative</span></a>
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

