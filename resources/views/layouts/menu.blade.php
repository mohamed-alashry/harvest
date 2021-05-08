<li class="nav-item {{ Request::is('admin/employees*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.employees.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Employees</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/leads*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.leads.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Leads</span>
    </a>
</li>
