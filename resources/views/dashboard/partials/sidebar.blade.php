<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
      <ul class="nav flex-column">
          @if(Auth::user()->isFoodBroker())
          <li class="nav-item">
            <h6 class="display-5">
                <a class="nav-link active" href="{{ route('foodbroker.index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    DASHBOARD <span class="sr-only">(current)</span>
                </a>
            </h5>
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
            <h6 class="display-5">
                <a class="nav-link active" href="{{ route('index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    DASHBOARD <span class="sr-only">(current)</span>
                </a>
            </h5>
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
      </ul>
      <!--Rest of Code if necessary later 'rest.blade.php'-->
  </div>
</nav>
