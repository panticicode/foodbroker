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
						      		<i id="backToPrev" class="fas fa-undo-alt xLeft"></i>
						      	</a>
					      	</th>
					      	<th scope="col">Slika</th>
					      	<th scope="col">Proizvod</th>
					      	<th scope="col">Cena</th>
					      	<th scope="col">Tezina / Kolicina</th>
					      	<th scope="col">Ukupno</th>
					    </tr>
					</thead>
					<tbody>
					@php
						$qty = 0;
						$weight = 0;
						$total = 0;
					@endphp
					
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
						@if($product->options->quantity)	
                            <a href="{{ route('quantity.reduce', ['id' => $product->rowId, 'qty' => $product->qty]) }}">
				      			<i class="fa fa-minus-circle" aria-hidden="true"></i>
				      		</a>
				      		<input type="hidden" name="qty[]" value="{{ $product->qty }}">
				      		<span class="qty">
							{{ $product->qty }}
				     		</span>
                            <a href="{{ route('quantity.increase', ['id' => $product->rowId, 'qty' => $product->qty]) }}">
				      			<i class="fa fa-plus-circle" aria-hidden="true"></i>
				      		</a>
						@else
                            <a href="{{ route('weight.reduce', ['id' => $product->rowId, 'weight' => $product->weight]) }}">
				      			<i class="fa fa-minus-circle" aria-hidden="true"></i>
				      		</a>
				      		<input type="hidden" name="weight[]" value="{{ $product->weight }}">
				      		<span class="qty">
							{{ $product->weight }}
				     		</span>
                            <a href="{{ route('weight.increase', ['id' => $product->rowId, 'weight' => $product->weight]) }}">
				      			<i class="fa fa-plus-circle" aria-hidden="true"></i>
				      		</a> 
						@endif
				      	</td>
				      	<td>
						@if($product->options->quantity)
							<p style="display: none;">Total {{ $total += $product->qty * $product->price }}</p>
							<p style="display: none;">Pojedinacno </p>{{ $product->qty * $product->price  }} RSD
						@else
							<p style="display: none;">Total {{ $total +=  $product->weight * $product->price  }} </p>
							<p style="display: none;">Pojedinacno </p>{{ $product->weight * $product->price }} RSD
						@endif
				      	</td>
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
					      	<td>
					      		<span>
							
									
										{{ $total }} RSD 
										
					      		</span>   
					      	</td>
					    </tr>
					</tbody>
				</table>
			</div>
			<div id="small-screen">
				<div id="azuriraj" class="form-group">
					<button class="btn btn-default">
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
	$("#cart").show(750)
	$("#backToPrev").click(function(){
		$("#cart").hide(500)
	})
	$(window).scroll(function(){
		if ($(this).scrollTop() > 0) {
		    $("nav .hideOnSmallScreen").fadeOut(750)
		} else {
		    $("nav .hideOnSmallScreen").fadeIn(500)
		}
	})
</script>
@endsection