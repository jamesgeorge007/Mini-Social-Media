<header>
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               @if(Auth::user() != null) 
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
               @endif
            </div>
        </div>
</nav>
</header>