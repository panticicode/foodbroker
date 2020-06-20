@extends('front.layouts.app')
@section('main')
<section id="cart"	class="cart">
	<form action="{{ route('cart.create') }}" method="post">
	{{ csrf_field() }}
		<div class="container">
			<div class="table-responsive">
				<table class="table">
					<thead class="thead-light">
					    <tr>
					      	<th scope="col">
						      	<a href="{{ route('product') }}">
						      		<i class="fas fa-undo-alt xLeft"></i>
						      	</a>
					      	</th>
					      	<th scope="col">Slika</th>
					      	<th scope="col">Proizvod</th>
					      	<th scope="col">Cena</th>
							<th scope="col"></th>
					      	<th scope="col">Kolicina</th>
					      	<th scope="col"></th>
					      	<th scope="col">Ukupno</th>
					    </tr>
					</thead>
					<tbody>
					@foreach(Cart::content() as $product)
					<tr>
				      	<th scope="row">
				      		<a href="{{ route('cart.delete', ['id' => $product->rowId]) }}">
					      		<i class="fa fa-times-circle deleteRow" aria-hidden="true"></i>
					      	</a>
						</th>
				      	<td>
				      		<a href="#">
								<img class="img-fluid" src="{{ asset($product->model->getImage($product->model->image)) }}" style="width: 70px; height: 80px">
							</a>
				      	</td>
				      	<td>{{ $product->name }}</td>
				      	<td>{{ $product->price }}</td>
				      	<td>
				      		<a href="{{ route('cart.reduce', ['id' => $product->rowId, 'qty' => $product->qty]) }}">
				      			<i class="fa fa-minus-circle" aria-hidden="true"></i>
				      		</a>
				      	</td>
				      	<td style="width: 10%">
				      		<input type="hidden" name="rowId[]" value="{{ $product->rowId }}">
				      		<input id="input-korpa" type="number" name="qty[]" step="0.1" min="0" class="form-control" value="{{ $product->qty }}">	
				      	</td>
				      	<td>
				      		<a href="{{ route('cart.increase', ['id' => $product->rowId, 'qty' => $product->qty]) }}">
				      			<i class="fa fa-plus-circle" aria-hidden="true"></i>
				      		</a>
				      	</td>
				      	<td>{{ $product->subtotal() }} Dinara</td>
				    </tr>
					@endforeach
					    <tr>
					      	<th scope="row">
					      		TOTAL:
							</th>
					      	<td></td>
					      	<td></td>
					      	<td></td>
					      	<td></td>
					      	<td></td>
					      	<td></td>
					      	<td>
					      		<span>{{ Cart::subtotal() }} Dinara</span>   
					      	</td>
					    </tr>
					</tbody>
				</table>
			</div>
			<div id="small-screen">
				<div id="azuriraj" class="form-group">
					<button class="btn btn-outline-secondary">
						NASTAVI KA KUPOVINI
					</button>
				</div>	
			</div>
		</div>	
	</form>	
</section>
@endsection
@section('script')
<script>
	$("#cart").show(500)
</script>
@endsection