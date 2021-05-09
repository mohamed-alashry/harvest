@can('employees view')
    <li class="nav-item {{ Request::is('admin/employees*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.employees.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Employees</span>
        </a>
    </li>
@endcan
@can('leads view')
    <li class="nav-item {{ Request::is('admin/leads*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.leads.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Leads</span>
        </a>
    </li>
@endcan
@can('branches view')
    <li class="nav-item {{ Request::is('admin/branches*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.branches.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Branches</span>
        </a>
    </li>
@endcan
@can('offers view')
    <li class="nav-item {{ Request::is('admin/offers*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.offers.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Offers</span>
        </a>
    </li>
@endcan
@can('trainingServices view')
    <li class="nav-item {{ Request::is('admin/trainingServices*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.trainingServices.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Training Services</span>
        </a>
    </li>
@endcan
@can('departments view')
    <li class="nav-item {{ Request::is('admin/departments*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.departments.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Departments</span>
        </a>
    </li>
@endcan
@can('jobs view')
    <li class="nav-item {{ Request::is('admin/jobs*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.jobs.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Jobs</span>
        </a>
    </li>
@endcan
@can('leadSources view')
    <li class="nav-item {{ Request::is('admin/leadSources*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.leadSources.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Lead Sources</span>
        </a>
    </li>
@endcan
@can('knowChannels view')
    <li class="nav-item {{ Request::is('admin/knowChannels*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.knowChannels.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Know Channels</span>
        </a>
    </li>
@endcan
@can('labels view')
    <li class="nav-item {{ Request::is('admin/labels*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.labels.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Labels</span>
        </a>
    </li>
@endcan
@can('labelTypes view')
    <li class="nav-item {{ Request::is('admin/labelTypes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.labelTypes.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Label Types</span>
        </a>
    </li>
@endcan
