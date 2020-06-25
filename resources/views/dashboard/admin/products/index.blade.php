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
	              <th>NA STANJU</th>
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
					<td>{{ $product->price }} RSD</td>
					<td>{{ $product->getCount()->count() }}</td>
					<td>
						<a href="{{ route('products.edit', $product) }}" class="btn btn-outline-success btn-sm rounded-3">
							<i class="fas fa-edit"></i>
						</a>
						<form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="hidden" name="image" value="{{ $product->image }}">
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
	    	{{ $products->appends($_GET)->links() }}
	    </div>
  	</div>
  
</main>
@endsection