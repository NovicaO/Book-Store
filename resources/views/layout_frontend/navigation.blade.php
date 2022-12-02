<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Bookstore</a>
            <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </div>
        <div class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                <li><a href="/books"><span class="glyphicon glyphicon-book"></span> Books</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span
                                class="badge">{{Cart::count()}}</span> </a></li>
            </ul>
        </div>
    </div>
</nav>