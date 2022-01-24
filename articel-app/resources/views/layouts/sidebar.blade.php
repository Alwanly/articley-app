<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if (Helper::getPermission('admin'))
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link {{ request()->is('*dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">CMS Management</li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.list.reporter')}}" class="nav-link {{ request()->is('*reporter/list') ? 'active' : '' }} ">
                        <i class="fas fa-user-edit"></i>
                        <p>
                            List of Repoter
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.list.editor')}}" class="nav-link {{ request()->is('*editor/list') ? 'active' : '' }} ">
                        <i class="fas fa-user-check"></i>
                        <p>
                            List of Editor
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.add.user')}}" class="nav-link {{ request()->is('*user') ? 'active' : '' }} ">
                        <i class="fas fa-user-plus"></i>
                        <p>
                            Add User
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.list.categories')}}" class="nav-link {{ request()->is('*categories') ? 'active' : '' }} ">
                        <i class="fas fa-briefcase"></i>
                        <p>List Category</p>
                    </a>
                </li>
                @endif
                <li class="nav-header">Articles Management</li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.list.article')}}" class="nav-link {{ request()->is('*articles') ? 'active' : '' }} ">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            List of Article
                        </p>
                    </a>
                </li>
                @if (Helper::getPermission('reporter'))
                <li class="nav-item ">
                    <a href="{{route('dashboard.write.article')}}" class="nav-link {{ request()->is('*write/article') ? 'active' : '' }} ">
                        <i class="fas fa-edit"></i>
                        <p>
                            Write Article
                        </p>
                    </a>
                </li>
                @endif
                @if (Helper::getPermission('admin','editor'))
                <li class="nav-item ">
                    <a href="{{route('dashboard.edit-list.article')}}" class="nav-link {{ request()->is('*edit/article') ? 'active' : '' }} ">
                        <i class="fas fa-folder-open"></i>
                        <p>
                            Edit Article
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>