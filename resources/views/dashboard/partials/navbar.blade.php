<nav id="navbar" class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
<a class="navbar-brand" href="#"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse text-center" id="navbarNav">
        <a class="navbar-brand col-sm-3 col-md-2" href="{{ url('/') }}">
            <h5 class="display-5">
            {{ env('APP_NAME') }}
            </h5>
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                </a>
            </li>
            <span class="nav-dashboard">    
                @if(Auth::user()->isFoodBroker())    
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('foodbroker.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            DASHBOARD <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">
                            <span data-feather="bar-chart-2"></span>
                            PROIZVODI
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders') }}">
                            <span data-feather="file"></span>
                            PORUDŽBINE
                        </a>
                    </li>  
                @endif
                @if(Auth::user()->isAdmin())  
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            DASHBOARD <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <span data-feather="bar-chart-2"></span>
                            PROIZVODI
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="fas fa-align-justify"></i>
                            CATEGORIJE
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">
                          <span data-feather="file"></span>
                            PORUDŽBINE
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                          KORPA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <span data-feather="users"></span>
                          KORISNICI
                        </a>
                    </li>
                @endif 
            </span>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap ml-auto">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>    
</nav>
