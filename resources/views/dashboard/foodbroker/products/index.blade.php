@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
@include('dashboard.partials.card-header')
  	<div class="form-group float-left">
    	<a href="{{ route('products.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
    	</a>
  	</div>
	<h2 class="text-center">Proizvodi</h2>
	<div class="table-responsive">
	   	<table class="table table-striped table-sm">
	      	<thead>
	        	<tr>
	              <th>#</th>
	              <th>NAZIV</th>
	              <th>KATEGORIJA</th>
	              <th>SLIKA</th>
	              <th>CENA</th>
	              <th>AŽURIRAJ CENU</th>
	              <th>NA STANJU</th>
	              <th>STOCK</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	        @foreach($products as $product)
	          	<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>
					{{$product->category->title}}
					</td>
					<td>
						<img class="img-fluid" src="{{ $product->getImage($product->image) }}" style="max-width:50px">
					</td>
					<form action="{{ route('foodbroker.product.update', $product) }}" method="post" class="d-inline">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
						<td id="priceOfProduct" style="position: relative;">
							<input type="number" class="form-control" name="price" id="priceValue" value="{{ $product->price }}" style="width: 42%; position: absolute; top: 17px; padding:0">
							<span class="float-right ml-4">RSD</span>
						</td>
						<td>
							<button class="btn btn-outline-info btn-sm">
								<i class="fas fa-edit"></i>
							</button>
						</td>
					</form>
					<td>
						{{ $product->visibility ? 'IN STOCK' : 'OUT OF STOCK' }}
					</td>
					<td>
						<a href="{{ route('foodbroker.product.stock', $product) }}" class="btn btn-outline-success btn-sm">
							<i class="fas fa-trash-alt"></i>
						</a>
					</td>
  				</tr>	
	        @endforeach
	      	</tbody>
	    </table>
	    
	    <div class="float-right">
	    	{{ $products->appends($_GET)->links() }}
	    </div>
  	</div>
</main>
@php
$data = 36
@endphp
@endsection
