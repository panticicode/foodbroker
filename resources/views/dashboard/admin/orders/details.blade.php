@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
@include('dashboard.partials.card-header')
  	<div class="form-group float-left">
    	<a href="{{ route('orders.index') }}" class="btn btn-outline-primary">
    		<i class="fas fa-undo-alt xLeft"></i>
    	</a>
  	</div>
	<h2 class="text-center">Porudžbenica</h2>
	<div class="table-responsive">
	   	<table class="table table-striped table-sm">
	      	<thead>
	        	<tr>
	                <th>#</th>
			    	<th>Naziv</th>
			    	<th>Količina</th>
			    	<th>Težina</th>
			    	<th>Cena</th>
			    	<th>Ukupno</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	      	{{ $sum = null }}
	        @foreach($carts as $cart)
	          	<tr>
	          		<td>{{ $cart->id }}</td>
					<td>{{ $cart->name }}</td>
					<td>
						{{ $qty = $cart->qty == true && $cart->weight > 0 ? '/' :  $cart->qty . ' ' . 'kom' }}
					</td>
					<td>
						{{ $weight = !$cart->weight ? '/' : $cart->weight . ' ' . 'kg' }}
					</td>
					<td>{{ $cart->price }} rsd</td>
					<p style="display: none">
						@if($data = $qty)
							{{ $data = $cart->weight }}
						@endif
						@if($data == '/')
							{{ $data = $cart->qty }}
						@endif
					</p>
					
					<td>{{ $total = $cart->price * $data }} rsd</td>
					<td style="display: none">{{ $sum += $total }}</td>
  				</tr>	
	        @endforeach
	      	</tbody>
	      	<hr>
	      	<tr>
        		<th>TOTAL</th>
        		<td></td><td></td><td></td><td></td>
        		<td>{{ $sum }} RSD</td>
        	</tr>
	    </table>
	    <br><hr>
	    <h2 class="text-center">Kupac</h2>
	    <table class="table table-striped table-sm">
	      	<thead>
	        	<th>#</th>
	    		<td>{{ $order->id }}</td>
	      	</thead>
	      	<tbody>
	      		<tr>
			    	<th>Ime i Prezime</th>
			    	<td>{{ $order->firstname . ' ' . $order->lastname }}</td>
			  	</tr>
			  	<tr>
			    	<th>Kompanija</th>
			    	<td>{{ $order->company }}</td>
			  	</tr>
			  	<tr>
			    	<th>Region</th>
			    	<td>{{ $order->country_id }}</td>
			  	</tr>
			  	<tr>
			    	<th>Adresa</th>
			    	<td>{{ $order->address }}</td>
			  	</tr>
			  	<tr>
			    	<th>Stan</th>
			    	<td>{{ $order->apartment }}</td>
			  	</tr>
			  	<tr>
			    	<th>Datum isporuke</th>
			    	<td>
					{{ date_format(date_create($order->delivery_date), "m.d.Y") }}
					</td>
			  	</tr>
			  	<tr>
			    	<th>Termin isporuke</th>
			    	<td>
					{{ date_format(date_create($order->delivery_time), "H:i") }}
					</td>
			  	</tr>
			  	<tr>
			    	<th>Grad</th>
			    	<td>{{ $order->city }}</td>
			  	</tr>
			  	<tr>
			    	<th>Postanski broj</th>
			    	<td>{{ $order->postal_code }}</td>
			  	</tr>
			  	<tr>
			    	<th>Telefon</th>
			    	<td>{{ $order->phone }}</td>
			  	</tr>
			  	<tr>
			    	<th>Email</th>
			    	<td>{{ $order->email }}</td>
			  	</tr>
			  	<tr>
			    	<th>Dodatna pitanja</th>
			    	<td>{{ $order->content }}</td>
			  	</tr>
	      	</tbody>
	    </table>
  	</div>
</main>
@endsection