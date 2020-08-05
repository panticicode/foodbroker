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
	          	<tr id="row_{{ $order->id }}">
					<td>{{ $order->id }}</td>
					<td>
						{{ $order->firstname . ' ' . $order->lastname }}
					</td>
					<td>{{ $order->email }}</td>
					<td>{{ $order->city }}</td>
					<td>{{ $order->address }}</td>
					<td>{{ $order->phone }}</td>
					<td>
					{{ date_format(date_create($order->delivery_date), "m.d") }}
					</td>
					<td>
					{{ date_format(date_create($order->delivery_time), "H:i") }}
					</td>
					<td>{{ $order->country_id }}</td>
					<td style="display: none">{{ $order->company }}</td>
					<td style="display: none">{{ $order->apartment }}</td>
					<td style="display: none">{{ $order->postal_code }}</td>
					<td style="display: none">{{ $order->user_id }}</td>
					<td style="display: none">{{ $order->content }}</td>
					<td>
						<a id="edit" href="javascript:void(0)" class="btn btn-outline-primary btn-sm">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td>
						<a id="delete" href="javascript:void(0)" class="btn btn-outline-danger btn-sm">
							<i class="fas fa-trash-alt"></i>
						</a>
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
@include('dashboard.modals.foodbroker.orders.ajax')
@endsection