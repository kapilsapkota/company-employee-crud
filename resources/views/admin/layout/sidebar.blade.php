<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-light-purple">

    <a href="{{url('/home')}}" class="brand-link navbar-gray">
        <img src="{{asset('backend/assets/dist/img/AdminLTELogo.png')}}" alt="{{ env('APP_NAME') }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text white font-weight-light"> {{ env('APP_NAME') }} </span>
    </a>

    <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ \App\Facades\ViewHelper::getImagePath('user',auth()->user()->photo??'no-image.png') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{ route('admin.user.profile') }}" class="d-block">{{ auth()->user()->name?? 'User'}}</a>
                        </div>
                    </div>

         <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="{{ $dashboard_url??'#' }}" class="nav-link {{ request()->is('home') || request()->is('admin/dashboard') ? 'active':''}}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            @can(['role-create','role-index'])
                                <li class="nav-item {{request()->is('admin/role*')?'menu-open':''}}">
                                    <a href="{{route('admin.role.index')}}" class="nav-link {{request()->is('admin/role*')?'active':''}}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Role
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can(['permission-create','permission-index'])
                                <li class="nav-item {{request()->is('admin/permission*')?'menu-open':''}}">
                                    <a href="{{route('admin.permission.index')}}" class="nav-link {{request()->is('admin/permission*')?'active':''}}">
                                        <i class="nav-icon fas fa-lock"></i>
                                        <p>
                                            Permission
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can(['user-create','user-index'])
                                <li class="nav-item">
                                    <a href="{{route('admin.user.index')}}" class="nav-link {{request()->is('admin/user*')?'active':''}}">
                                        <i class="nav-icon fas fa-user-cog"></i>
                                        <p>
                                            User
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can(['company-create','company-index'])
                                <li class="nav-item">
                                    <a href="{{route('admin.company.index')}}" class="nav-link {{request()->is('admin/company*')?'active':''}}">
                                        <i class="nav-icon fas fa-building"></i>
                                        <p>
                                            Company
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can(['employee-create','employee-index'])
                                <li class="nav-item">
                                    <a href="{{route('admin.employee.index')}}" class="nav-link {{request()->is('admin/employee*')?'active':''}}">
                                        <i class="nav-icon fas fa-user-astronaut"></i>
                                        <p>
                                            Employee
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            <li class="nav-item nav-header"></li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                   class="nav-link">
                                    <i class="nav-icon fas fa-backspace"></i>
                                    <p>
                                        Log Out
                                    </p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
    </div>
</aside>
