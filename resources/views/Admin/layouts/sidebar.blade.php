<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        @can('view-list-domain')
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Domains</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @can('create-domain')
                    <li>
                        <a href="{{route('domains.create')}}">
                            <i class="bi bi-circle"></i><span>Add domain</span>
                        </a>
                    </li>
                @endcan
                <li>
                <a href="{{route('domains.index')}}">
                    <i class="bi bi-circle"></i><span>All domains</span>
                </a>
                </li>
            </ul>
        @endcan
    </li><!-- End Components Nav -->
    @can('view-list-client')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-client" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-client" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.clients.index')}}">
                        <i class="bi bi-circle"></i><span>All clients</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
    @endcan

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @can('create-service')
                <li>
                    <a href="{{route('services.create')}}">
                        <i class="bi bi-circle"></i><span>Add Service</span>
                    </a>
                </li>
            @endcan
            @can('view-list-service')
            <li>
                <a href="{{route('services.index')}}">
                    <i class="bi bi-circle"></i><span>All services</span>
                </a>
            </li>
            @endcan
        </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#application-nav" data-bs-toggle="collapse" href="#">
            <i class="ri ri-align-bottom"></i><span>Applications</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="application-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @can('view-list-service')
            <li>
                <a href="{{route('admin.applications.index')}}">
                    <i class="bi bi-circle"></i><span>All Applications</span>
                </a>
            </li>
            @endcan
        </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#employee-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="employee-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @can('view-list-service')
            <li>
                <a href="{{route('employees.index')}}">
                    <i class="bi bi-circle"></i><span>All Employess</span>
                </a>
            </li>
            @endcan
        </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="order-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @can('view-list-service')
            <li>
                <a href="{{route('admin.order.index')}}">
                    <i class="bi bi-circle"></i><span>All Orders</span>
                </a>
            </li>
            @endcan
        </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#equipment-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Equipments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="equipment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @can('view-list-service')
            <li>
                <a href="{{route('equipments.index')}}">
                    <i class="bi bi-circle"></i><span>All Orders</span>
                </a>
            </li>
            @endcan
        </ul>
    </li><!-- End Forms Nav -->


    <li class="nav-heading">Pages</li>
    @can('view-profile')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.profile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
    @endcan
</ul>

</aside>
<!-- End Sidebar-->