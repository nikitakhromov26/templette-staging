<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-avatar">
                <div class="dropdown">
                    <div>
                        <img alt="image" class="img-circle" width="100" src="{{ Auth::user()->present()->avatar }}">
                    </div>
                    <div class="name"><strong>{{ Auth::user()->present()->nameOrEmail }}</strong></div>
                </div>
            </li>
            <li class="{{ Request::is('/') ? 'active open' : ''  }}">
                <a href="{{ route('dashboard') }}" class="{{ Request::is('/') ? 'active' : ''  }}">
                    <i class="fa fa-dashboard fa-fw"></i> Dashboard
                </a>
            </li>
            @permission('users.manage')
                <li class="{{ Request::is('user*') ? 'active open' : ''  }}">
                    <a href="{{ route('user.list') }}" class="{{ Request::is('user*') ? 'active' : ''  }}">
                        <i class="fa fa-users fa-fw"></i> Users
                    </a>
                </li>
            @endpermission

            @permission('users.activity')
                <li class="{{ Request::is('activity*') ? 'active open' : ''  }}">
                    <a href="{{ route('activity.index') }}" class="{{ Request::is('activity*') ? 'active' : ''  }}">
                        <i class="fa fa-list-alt fa-fw"></i> Activity Log
                    </a>
                </li>
            @endpermission

            @permission(['roles.manage', 'permissions.manage'])
                <li class="{{ Request::is('role*') || Request::is('permission*') ? 'active open' : ''  }}">
                    <a href="#">
                        <i class="fa fa-user fa-fw"></i>
                        Roles & Permissions
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @permission('roles.manage')
                            <li>
                                <a href="{{ route('role.index') }}" class="{{ Request::is('role*') ? 'active' : ''  }}">
                                    Roles
                                </a>
                            </li>
                        @endpermission
                        @permission('permissions.manage')
                            <li>
                                <a href="{{ route('permission.index') }}"
                                   class="{{ Request::is('permission*') ? 'active' : ''  }}">Permissions</a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission

            @permission(['settings.general', 'settings.auth', 'settings.notifications'])
            <li class="{{ Request::is('settings*') ? 'active open' : ''  }}">
                <a href="#">
                    <i class="fa fa-gear fa-fw"></i>
                    Settings
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    @permission('settings.general')
                        <li>
                            <a href="{{ route('settings.general') }}"
                               class="{{ Request::is('settings') ? 'active' : ''  }}">
                                General
                            </a>
                        </li>
                    @endpermission
                    @permission('settings.auth')
                        <li>
                            <a href="{{ route('settings.auth') }}"
                               class="{{ Request::is('settings/auth*') ? 'active' : ''  }}">
                                Auth & Registration
                            </a>
                        </li>
                    @endpermission
                    @permission('settings.notifications')
                        <li>
                            <a href="{{ route('settings.notifications') }}"
                               class="{{ Request::is('settings/notifications*') ? 'active' : ''  }}">
                                Notifications
                            </a>
                        </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>