<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><strong>Administration</strong></a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-left">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           <i class="fa fa-caret-down"></i> <i class="fa fa-user fa-fw"></i> 
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ route('product.index') }}"> Back to Site</a>
            </li>
            <li><a href="{{ route('user.logout') }}"> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->