@php
    $user = auth()->user();
@endphp
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> <!--begin::Brand Image--> <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header"></li>
                <li class="nav-item"> 
                    <a href="{{ route('dashboard') }}" class="nav-link"> 
                    <i class="nav-icon bi bi-circle text-info"></i>
                        <p>DASHBOARD</p>
                    </a> </li>
                <li class="nav-item">
                    <a href="{{ route('complaints.index') }}" class="nav-link"> 
                        <i class="nav-icon bi bi-circle text-warning"></i>
                        <p>COMPLAINTS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.index') }}" class="nav-link"> 
                        <i class="nav-icon bi bi-circle text-danger"></i>
                        <p>REPORTES</p>
                    </a>
                </li>
                @if ($user->isAdmin())
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link"> 
                            <i class="nav-icon bi bi-circle text-info"></i>
                            <p>USERS</p>
                        </a>
                    </li>
                @endif
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->