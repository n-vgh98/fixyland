<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 640px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('dashboard') }}" class="d-block">{{ auth()->user()->firstname }}
                        {{ auth()->user()->lastname }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->


                    {{-- users links --}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon ion ion-person-add"></i>
                            <p>
                                Users
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- if needed --}}

                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa  fa-graduation-cap"></i>
                                    <p>
                                        دانش آموزان
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                یازدهم
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p> یازدهم تجربی </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p> یازدهم ریاضی</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li> --}}

                            {{-- all users --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.users.all') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-users"></i>
                                    <p>
                                        All Users
                                    </p>
                                </a>
                            </li>

                            {{-- Super Admins --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.users.superadmins') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-users"></i>
                                    <p>
                                        Super Admins
                                    </p>
                                </a>
                            </li>

                            {{-- admins --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.users.admins') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-info"></i>
                                    <p>
                                        Admins
                                    </p>
                                </a>
                            </li>

                            {{-- technicians --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.users.technicians') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-wrench"></i>
                                    <p>
                                        Technicians
                                    </p>
                                </a>
                            </li>

                            {{-- customers --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.users.customers') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-user"></i>
                                    <p>
                                        Customers
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- notifications link --}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link bg-info active">
                            <i class="nav-icon fa  fa-bell"></i>
                            <p>
                                Notifications
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            {{-- all notifications --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.notifications.all') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-bell"></i>
                                    <p>
                                        All notifs
                                    </p>
                                </a>
                            </li>

                            {{-- superadmins notifications --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.notifications.superadmins') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-bell"></i>
                                    <p>
                                        Super Admins notifs
                                    </p>
                                </a>
                            </li>

                            {{-- Admins notifications --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.notifications.admins') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-bell"></i>
                                    <p>
                                        Admins notifs
                                    </p>
                                </a>
                            </li>

                            {{-- Customers notifications --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.notifications.customers') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-bell"></i>
                                    <p>
                                        Customers notifs
                                    </p>
                                </a>
                            </li>

                            {{-- Technicians notifications --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.notifications.technicians') }}" class="nav-link">
                                    <i class="nav-icon fa  fa-bell"></i>
                                    <p>
                                        Technicians notifs
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- link to jetstream --}}
                    <li class="nav-item has-treeview">

                        <a href="{{ route('admin.ads.index', 'en') }}" class="nav-link bg-primary active">
                            <i class="nav-icon fa fa-bullhorn"></i>
                            <p>
                                Advertisments
                            </p>
                        </a>
                    </li>

                    <!-- rules link -->
                    <li class="nav-item has-treeview">

                        <a href="{{ route('admin.rules.index', 'ar') }}" class="nav-link bg-primary active">
                            <i class="nav-icon fa fa-pencil-square-o"></i>
                            <p>
                            Rules
                            </p>
                        </a>
                    </li>

                    <!-- about us link -->
                    <li class="nav-item has-treeview">

                        <a href="{{ route('admin.about_us.index', 'ar') }}" class="nav-link bg-primary active">
                            <i class="nav-icon fa fa-vcard-o"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>


                    {{-- link to jetstream --}}
                    <li class="nav-item has-treeview mt-4 ">

                        <a href="{{ route('profile.show') }}" class="nav-link bg-warning active">
                            <i class="nav-icon fa fa-lock"></i>
                            <p>
                                Security Setting
                            </p>
                        </a>
                    </li>

                    {{-- logout button --}}
                    <li class="nav-item has-treeview mt-4 ">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link bg-danger active">
                                <i class="fa fa-times-circle"></i>
                                <p>
                                    Log Out
                                </p>
                                </a>
                        </form>

                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
