<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">


<li class="nav-item @if($page=='clientHome')active @endif">
    <a class="nav-link" href="{{route('client.home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item @if($page=='personnel')active @endif">
    <a class="nav-link" href="{{route('client.personnel')}}">
        <i class="fas fa-fw fa-user-alt"></i>
        <span>Personnel</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item @if($page=='target')active @endif">
    <a class="nav-link" href="{{route('client.target')}}">
        <i class="fas fa-fw fa-bullseye"></i>
        <span>Target</span></a>
</li>

<!--<li class="nav-item @if($page=='target2')active @endif">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTarget" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>Target</span>
    </a>
    <div id="collapseTarget" class="collapse" aria-labelledby="headingUtilities"
         data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Set Targets:</h6>
            <a class="collapse-item" href="{{route('client.target.strategicobjective')}}">Strategic Objective</a>
            <a class="collapse-item" href="{{route('client.target.kpi')}}">KPI</a>
            <a class="collapse-item" href="{{route('client.target.actionplan')}}">Action Plan</a>
        </div>
    </div>
</li>

<li class="nav-item @if($page=='kpi')active @endif">
    <a class="nav-link" href="{{route('client.kpi')}}">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>KPI (alt)</span>
    </a>
</li>-->

<!--<li class="nav-item @if($page=='laporan')active @endif">
    <a class="nav-link" href="{{route('client.report.viewreport')}}">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Performance Report</span></a>
</li>-->

<li class="nav-item @if($page=='performancereport')active @endif">
    <a class="nav-link" href="{{route('client.performancereport')}}">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Performance Report</span></a>
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

