@extends('dashboard.layouts.app')
@section('main')
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  	<div class="sidebar-sticky">
      	<ul class="nav flex-column">
         	<li class="nav-item">
         	<h5 class="display-5">
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
      	</ul>
      <!--Rest of Code if necessary later 'rest.blade.php'-->
  	</div>
</nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi {{ Auth::user()->name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
           <div class="btn-group mr-2">
              <button class="btn btn-sm btn-outline-secondary">Share</button>
              <button class="btn btn-sm btn-outline-secondary">Export</button>
           </div>
           <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
           <span data-feather="calendar"></span>
           This week
           </button>
        </div>
    </div>
	@include('dashboard.partials.chart')
	<h2>Poslednje porudžbine</h2>
	<div class="table-responsive">
        <table class="table table-striped table-sm">
             <thead>
                <tr>
                    <th>IME I PREZIME</th>
                    <th>ADRESA</th>
                    <th>BROJ TELEFONA</th>
                    <th>DATUM I VREME</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                   <td>{{ $order->firstname . ' ' . $order->lastname }}</td>
                   <td>{{ $order->address }}</td>
                   <td>{{ $order->phone }}</td>
                   <td>{{ $order->delivery_date . ' ' . $order->delivery_time }}</td>   
                </tr>     
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@include('dashboard.partials.charts')
@endsection

