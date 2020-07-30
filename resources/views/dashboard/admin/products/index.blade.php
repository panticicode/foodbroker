@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
@include('dashboard.partials.card-header')
  	<div class="form-group float-left">
    	<a id="create" href="javascript:void(0)" class="btn btn-outline-primary">
    		<i class="fas fa-plus-square"></i>
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
	      	<tbody class="content-table">
	        @foreach($products as $product)
	          	<tr id="row_{{ $product->id }}">
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>
					{{$product->category->title}}
					</td>
					<td>
						<img class="img-fluid" src="{{ $product->getImage($product->image) }}" style="max-width:50px">
					</td>
					<td>{{ $product->price }}</td>
					<td>
						{{ $product->visibility ? 'DA' : 'NE' }}
					</td>
					<!--FOR JQUERY ONLY-->
					<td style="display:none">
						{{ $product->visibility }}
					</td>
					<td style="display:none">
						{{ $product->quantity }}
					</td>
					<td style="display:none">
						{{ $product->description }}
					</td>
					<td style="display:none">
						{{ $product->cat_id - 1 }}
					</td>
					<!--FOR JQUERY ONLY-->
					<td>
						<a id="edit" href="javascript:void(0)" class="btn btn-outline-success btn-sm rounded-3">
					    	<i class="fas fa-edit"></i>
					    </a>
						<a id="delete" href="javascript:void(0)" class="btn btn-outline-danger btn-sm rounded-3">
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
@include('dashboard.modals.products.ajax')
@endsection