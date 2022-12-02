<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/administration">Administration</a>
            <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/administration/books"><span class="glyphicon glyphicon-book"></span> Books</a></li>
                    <li><a href="/administration/categories"><span class="glyphicon glyphicon-tags"></span> Categories</a></li>
                    <li><a href="/administration/publishers"><span class="glyphicon glyphicon-erase"></span> Publishers</a></li>
                    <li><a href="/administration/authors"><span class="glyphicon glyphicon-education"></span> Authors</a></li>
                    <li><a href="/administration/orderStatus"><span class="glyphicon glyphicon-pencil"></span> Order status</a></li>
                    @if(Auth::user()->isAdmin())
                    <li><a href="/administration/users"><span class="glyphicon glyphicon-user"></span> Users </a></li>
                    <li><a href="/administration/roles"><span class="glyphicon glyphicon-eye-open"></span> Roles </a></li>
                     <li><a href="/administration/currencies"><span class="glyphicon glyphicon-usd"></span> Currencies </a></li>

                    @endif
                </ul>
            </li>


        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/administration/orders"><span class="glyphicon glyphicon-flag"></span> Manage Orders</a></li>
                    <li><a href="/administration/finance"><span class="glyphicon glyphicon-usd"></span> Finance</a></li>

                </ul>

            </li>



        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span>
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/administration/user/edit"><span  class="glyphicon glyphicon-user"></span> Change personal data</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-out"></span>  Logout {{\Auth::user()->name}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>

            </li>

        </ul>
        </div>
    </div>
</nav>