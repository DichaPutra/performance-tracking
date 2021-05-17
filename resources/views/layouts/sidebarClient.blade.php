<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<!--<div class="sidebar-heading">
    Main Function
</div>-->

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

<li class="nav-item @if($page=='okr')active @endif">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOKR" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>OKR</span>
    </a>
    <div id="collapseOKR" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Set OKR:</h6>
            <a class="collapse-item" href="{{route('client.okr.objective')}}">Objective</a>
            <a class="collapse-item" href="{{route('client.okr.keyresult')}}">Key Result</a>
        </div>
    </div>
</li>

<li class="nav-item @if($page=='target')active @endif">
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
        <span>KPI (OPT-2)</span>
    </a>
</li>

<!--<li class="nav-item @if($page=='kpi')active @endif">
    <a class="nav-link" href="{{route('client.target')}}">
        <i class="fas fa-fw fa-chart-line"></i>
        <span>Target</span></a>
</li>-->

<li class="nav-item @if($page=='laporan')active @endif">
    <a class="nav-link" href="{{route('client.report')}}">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Report</span></a>
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
<!--
 Divider 
<hr class="sidebar-divider">
 Heading 
<div class="sidebar-heading">
    Interface
</div>
 Nav Item - Pages Collapse Menu 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
       aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li>
 Nav Item - Utilities Collapse Menu 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
       aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
         data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li>
 Divider 
<hr class="sidebar-divider">
 Heading 
<div class="sidebar-heading">
    Addons
</div>
 Nav Item - Pages Collapse Menu 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
       aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>
 Nav Item - Charts 
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>
 Nav Item - Tables 
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>-->

<!--Minimize Sidebar-->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
