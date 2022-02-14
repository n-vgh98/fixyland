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
                    <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&amp;d=mm&amp;r=g"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('dashboard') }}" class="d-block">test</a>
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
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- students --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa  fa-graduation-cap"></i>
                                    <p>
                                        دانش آموزان
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    {{-- 10th grade students --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                دهم
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p> دهم تجربی</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p> دهم ریاضی</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- 11th grade students --}}
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

                                    {{-- 12th grade students --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                دوازدهم
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>دوازدهم تجربی</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>دوازدهم ریاضی</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- math field students --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                ریاضی
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>دهم ریاضی</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>یازدهم ریاضی</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>دوازدهم ریاضی</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- science field students --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                تجربی
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>دهم تجربی</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>یازدهم تجربی</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa fa-dot-circle-o nav-icon"></i>
                                                    <p>دوازدهم تجربی</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- science field students --}}
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                همه دانش آموزان
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- moshaver --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa  fa-list"></i>
                                    <p>
                                        مشاوران
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- link to jetstream --}}
                    <li class="nav-item has-treeview mt-4 ">

                        <a href="{{ route('profile.show') }}" class="nav-link bg-warning active">
                            <i class="nav-icon fa fa-lock"></i>
                            <p>
                                تنظیمات امنیتی
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
                                    خروج
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
