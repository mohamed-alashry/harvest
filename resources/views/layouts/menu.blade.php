@can('leads view')
    <li class="nav-item {{ Request::is('admin/leads*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.leads.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Leads</span>
        </a>
    </li>
@endcan
@can('branches view')
    <li class="nav-item {{ Request::is('admin/branches*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.branches.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Branches</span>
        </a>
    </li>
@endcan
@can('offers view')
    <li class="nav-item {{ Request::is('admin/offers*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.offers.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Offers</span>
        </a>
    </li>
@endcan
@can('trainingServices view')
    <li class="nav-item {{ Request::is('admin/trainingServices*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.trainingServices.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Training Services</span>
        </a>
    </li>
@endcan
@can('departments view')
    <li class="nav-item {{ Request::is('admin/departments*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.departments.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Departments</span>
        </a>
    </li>
@endcan
@can('jobs view')
    <li class="nav-item {{ Request::is('admin/jobs*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.jobs.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Jobs</span>
        </a>
    </li>
@endcan
@can('leadSources view')
    <li class="nav-item {{ Request::is('admin/leadSources*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.leadSources.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Lead Sources</span>
        </a>
    </li>
@endcan
@can('knowChannels view')
    <li class="nav-item {{ Request::is('admin/knowChannels*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.knowChannels.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Know Channels</span>
        </a>
    </li>
@endcan
@can('labels view')
    <li class="nav-item {{ Request::is('admin/labels*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.labels.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Labels</span>
        </a>
    </li>
@endcan
@can('labelTypes view')
    <li class="nav-item {{ Request::is('admin/labelTypes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.labelTypes.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Label Types</span>
        </a>
    </li>
@endcan
@can('employees view')
    <li class="nav-item {{ Request::is('admin/employees*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.employees.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Employees</span>
        </a>
    </li>
@endcan
@can('rooms view')
    <li class="nav-item {{ Request::is('admin/rooms*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.rooms.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Rooms</span>
        </a>
    </li>
@endcan

@can('intervals view')
    <li class="nav-item {{ Request::is('admin/intervals*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.intervals.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Intervals</span>
        </a>
    </li>
@endcan

@can('tracks view')
    <li class="nav-item {{ Request::is('admin/tracks*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.tracks.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Tracks</span>
        </a>
    </li>
@endcan

@can('customerJobs view')
    <li class="nav-item {{ Request::is('admin/customerJobs*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.customerJobs.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Customer Jobs</span>
        </a>
    </li>
@endcan

@can('universities view')
    <li class="nav-item {{ Request::is('admin/universities*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.universities.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Universities</span>
        </a>
    </li>
@endcan

@can('paymentPlans view')
    <li class="nav-item {{ Request::is('admin/paymentPlans*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.paymentPlans.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Payment Plans</span>
        </a>
    </li>
@endcan

@can('paymentMethods view')
    <li class="nav-item {{ Request::is('admin/paymentMethods*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.paymentMethods.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Payment Methods</span>
        </a>
    </li>
@endcan

@can('roles view')
    <li class="nav-item {{ Request::is('admin/roles*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.roles.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Roles</span>
        </a>
    </li>
@endcan

@can('placementApplicants view')
    <li class="nav-item {{ Request::is('admin/placementApplicants*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.placementApplicants.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Placement Applicants</span>
        </a>
    </li>
@endcan

@can('placementQuestions view')
    <li class="nav-item {{ Request::is('admin/placementQuestions*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.placementQuestions.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Placement Questions</span>
        </a>
    </li>
@endcan

@can('courses view')
    <li class="nav-item {{ Request::is('admin/courses*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.courses.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Courses</span>
        </a>
    </li>
@endcan
@can('timeframes view')
    <li class="nav-item {{ Request::is('admin/timeframes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.timeframes.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Time Frames</span>
        </a>
    </li>
@endcan
@can('itemCategories view')
    <li class="nav-item {{ Request::is('admin/itemCategories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.itemCategories.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Item Categories</span>
        </a>
    </li>
@endcan

@can('extraItems view')
    <li class="nav-item {{ Request::is('admin/extraItems*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.extraItems.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Extra Items</span>
        </a>
    </li>
@endcan

@can('serviceFees view')
    <li class="nav-item {{ Request::is('admin/serviceFees*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.serviceFees.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Service Fees</span>
        </a>
    </li>
@endcan

@can('disciplineCategories view')
    <li class="nav-item {{ Request::is('admin/disciplineCategories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.disciplineCategories.index') }}">
            <i class="nav-icon fa fa-circle" style="color: #fff"></i>
            <span>Discipline Categories</span>
        </a>
    </li>
@endcan
