<!-- Aside Start-->
<aside class="left-panel">

    <!-- brand -->
    <div class="logo">
        <a href="index.html" class="logo-expanded">
            <i class="ion-social-buffer"></i>
            <span class="nav-label">LLBlog</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="active"><a href="{{ url('/') }}"><i class="zmdi zmdi-view-dashboard"></i> <span class="nav-label">控制台</span></a></li>

            <li class="has-submenu">
                <a href="#"><i class="zmdi zmdi-view-list"></i> <span class="nav-label">用户管理</span><span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ url('#') }}">超级管理员<span class="badge badge-info pull-right">50</span></a></li>
                    <li><a href="{{ url('#') }}">普通管理员<span class="badge badge-danger pull-right">50</span></a></li>
                    <li><a href="{{ url('#') }}">普通用户<span class="badge badge-info pull-right">50</span></a></li>
                    <li><a href="#">路人</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">文章管理</span><span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ url('#') }}" target="">文章列表</a></li>
                    <li><a href="{{ url('#') }}" target="">增加文章</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="nav-label">其他</span><span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ url('#') }}">其他1</a></li>
                    <li><a href="{{ url('#') }}">其他2</a></li>
                    <li><a href="{{ url('#') }}">其他3</a></li>
                </ul>
            </li>
        </ul>
    </nav>

</aside>
<!-- Aside Ends-->