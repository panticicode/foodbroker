<nav id="navbar" class="navbar navbar-expand-sm navbar-light bg-light">
	<a class="navbar-brand" href="#"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
	  	<ul class="navbar-nav mr-auto">
             <li class="nav-item">
             	<a class="nav-link" href="#">
             	</a>
             </li>  
        </ul>
        @if(Auth::user())
            <div class="navbar-nav pt-3 mr-5">
                <h3 class="display-5 mr-5">
                    <a href="{{ route('index') }}">KOMSIJAVIP</a>
                </h3>
            </div>
        @else
            <div class="navbar-nav pt-3">
                <h3 class="display-5">
                    <a href="{{ route('index') }}">KOMSIJAVIP</a>
                </h3>
            </div>
        @endif
    	<ul class="navbar-nav ml-auto">
            @guest    
                @if (Route::has('register'))
                    <li class="nav-item">
                     	<a class="nav-link" href="{{ route('register') }}">
                     		{{ __('REGISTRACIJA') }}
                     	</a>
                    </li>
                @endif
            	    <li class="nav-item">
            	        <a class="nav-link" href="{{ route('login') }}">
            	        	{{ __('LOGIN') }}
            	        </a>
            	    </li>
                @else
                    <li class="nav-item">
                        <a id="profile-link" href="{{ route('profile') }}" class="nav-link">
                            {{ __('Profil') }}
                        </a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                       
                    </li>
            @endguest
        </ul>
	</div>
</nav>
