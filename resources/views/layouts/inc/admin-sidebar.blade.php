<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('admin/dashboard') ?'active':''}} " href="{{url('admin/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link {{Request::is('admin/category')||Request::is('admin/add-category')||Request::is('admin/edit-category/*') ?'collapse active':'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::is('admin/category')||Request::is('admin/add-category')||Request::is('admin/edit-category/*') ?'show':''}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-category') ?'active':''}}" href="{{url('admin/add-category')}}">Add Category</a>
                        <a class="nav-link {{ Request::is('admin/category')||Request::is('admin/edit-category/*') ?'active':''}}" href="{{url('admin/category')}}">View Category</a>
                    </nav>
                </div>

                <a class="nav-link {{Request::is('admin/add-post')||Request::is('admin/posts')||Request::is('admin/post/*') ?'collapse active':'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                   Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::is('admin/add-post')||Request::is('admin/posts')||Request::is('admin/post/*') ?'show':''}}" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-post') ?'active':''}}" href="{{url('admin/add-post')}}">Add Post</a>
                        <a class="nav-link {{ Request::is('admin/posts')||Request::is('admin/post/*') ?'active':''}}" href="{{url('admin/posts')}}">View Post</a>
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/users') ?'active':''}} "  href="{{url('admin/users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>





              
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>