<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a class="active" href="{{ route('admin') }}"><strong> Dashboard</strong></a>
            </li>
            <li>
                <a href="#"> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.index') }}">See all</a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}">Add</a>
                    </li>                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"> Products<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('products.index') }}">See all</a>
                    </li>
                    <li>
                        <a href="{{ route('products.create') }}">Add</a>
                    </li>                
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('categories.index') }}">See all</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.create') }}">Add</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"> Transaction<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('purcasher.index') }}">Purcasher</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"> Contact<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('contact.index') }}">See all</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->