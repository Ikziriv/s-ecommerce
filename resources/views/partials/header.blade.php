    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('product.index') }}"><strong>JUKO.com</strong></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
              <li>
                <a href="/forums"><i class="fa fa-comments" aria-hidden="true"></i></a>
              </li>
              @if(session('status') == 'customer')
              <li>
                <a href="{{ route('contact.create') }}"><i class="fa fa-envelope" aria-hidden="true"></i></a>
              </li>
              @endif
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i>
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                @if(Auth::check())
                      <li><a href="#"><strong>{{ Auth::user()->username }}</strong></a></li>
                    @if(session('status') == 'admin')
                      <li><a href="{{ route('admin') }}">Menu Administration</a></li>
                      <li class="divider"></li>
                      <li><a href="{{ route('user.logout') }}">Logout</a></li>
                    @elseif(session('status') == 'customer') 
                      <li><a href="{{ route('user.profile') }}">User Profile</a></li>
                      <li class="divider"></li>
                      <li><a href="{{ route('user.logout') }}">Logout</a></li>
                    @endif
                @else
                  <li><a href="{{ route('user.login') }}">Signin</a></li>
                @endif
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav">
              @if(session('status') == 'customer' || session('status') == 'visitor')
              <li>
                  <a href="{{ route('product.shoppingCart')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> 
                  <span>&nbsp;<strong>
                  {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</strong>
                  </span></a>
              </li>
              @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>