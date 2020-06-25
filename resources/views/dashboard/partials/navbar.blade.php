<nav id="navbar" class="navbar navbar-expand-sm navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
<a class="navbar-brand" href="#"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarNav">
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
