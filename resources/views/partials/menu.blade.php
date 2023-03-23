<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('informacion_personal_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.informacion-personals.index") }}" class="nav-link {{ request()->is("admin/informacion-personals") || request()->is("admin/informacion-personals/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-battery-three-quarters">

                            </i>
                            <p>
                                {{ trans('cruds.informacionPersonal.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('contenido_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.contenidos.index") }}" class="nav-link {{ request()->is("admin/contenidos") || request()->is("admin/contenidos/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-align-justify">

                            </i>
                            <p>
                                {{ trans('cruds.contenido.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('experience_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.experiences.index") }}" class="nav-link {{ request()->is("admin/experiences") || request()->is("admin/experiences/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-flask">

                            </i>
                            <p>
                                {{ trans('cruds.experience.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('university_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.universities.index") }}" class="nav-link {{ request()->is("admin/universities") || request()->is("admin/universities/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-university">

                            </i>
                            <p>
                                {{ trans('cruds.university.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('hability_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.habilities.index") }}" class="nav-link {{ request()->is("admin/habilities") || request()->is("admin/habilities/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-address-card">

                            </i>
                            <p>
                                {{ trans('cruds.hability.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('language_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.languages.index") }}" class="nav-link {{ request()->is("admin/languages") || request()->is("admin/languages/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-language">

                            </i>
                            <p>
                                {{ trans('cruds.language.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>