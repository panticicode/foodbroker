@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
@include('dashboard.partials.card-header')
  	<div class="form-group float-left">
    	<a href="#" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
    	</a>
  	</div>
	<h2 class="text-center">Porudžbine</h2>
	<div class="table-responsive">
	   	<table class="table table-striped table-sm">
	      	<thead>
	        	<tr>
	                <th>#</th>
	                <th>KUPAC</th>
	                <th>EMAIL</th>
                    <th>GRAD</th>
                    <th>TELEFON</th>
                    <th>DATUM</th>
                    <th>TERMIN</th>
                    <th>DRŽAVA</th>
                    <th>PITANJA</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	        @foreach($orders as $order)
	          	<tr>
					<td>{{ $order->id }}</td>
					<td>
						{{ $order->firstname . ' ' . $order->lastname }}
					</td>
					<td>{{ $order->email }}</td>
					<td>{{ $order->city }}</td>
					<td>{{ $order->phone }}</td>
					<td>
					{{ date_format(date_create($order->delivery_date), "m.d") }}
					</td>
					<td>
					{{ date_format(date_create($order->delivery_time), "H:i") }}
					</td>
					<td>{{ $order->country_id }}</td>
					<td>{{ substr($order->content,0, 20) }}..</td>
					<td>
						<a href="{{ route('details', $order) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
					</td>
					<td>
						<form action="{{ route('orders.destroy', $order) }}" method="post" class="d-inline">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="hidden" name="image" value="{{ $order->id }}">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fas fa-trash-alt"></i>
							</button>
						</form>
					</td>
  				</tr>	
	        @endforeach
	      	</tbody>
	    </table>
	    <div class="float-right">
	    	{{ $orders->appends($_GET)->links() }}
	    </div>
  	</div>
  
</main>
@endsection