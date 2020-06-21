@extends('front.layouts.app')
@section('main')
<section id="category" class="category">
	<div class="row">
		<div id="cat-1" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 bordered mt-5 mb-3">
			@foreach($categories as $category)
			<div id="block-thumbnail">
				<a href="#">
					<img class="img-fluid rounded-circle" src="{{ $category->getImage($category->image) }}" data-id="{{ $category->id }}">
				</a>
			</div>
			@endforeach
		</div>
		<div id="cat-10" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 fruit mt-3">
			<div class="row ml-3">
				<div>
					<h2 class="float-left">
						Voce:
					</h2>
				</div>	
				 <div class="ml-auto mr-3">
				<a href="#" class="btn btn-success float-right">
					KORPA
					<span class="count">{{ Cart::content()->count() }}</span>
				</a>

				</div>	
			</div>	
			<hr class="ml-3">
			<div class="row ml-1" data-counter="{{ $defaults }}">
				@foreach($products as $product)
				<div id="{{ $product->cat_id }}" class="col-4 content">
					<div class="img-thumbnail">
						<figure class="figure">
				  			<img src="{{ $product->getImage($product->image) }}" class="figure-img img-fluid rounded-circle" alt="placeholder">
						  	<figcaption class="figure-caption">
						  		<h3>{{ $product->title }}</h3>	
						  		<div class="row seek">
									<form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
									{{ csrf_field() }}
										<hr class="mt-4">
										<div class="form-group" style="margin-bottom: 0" id="input-container">
											<input type="hidden" name="quantity" value="{{ $product->quantity }}">
										@if(!$product->quantity)
											<label for="input">ODABERITE TEZINU:</label>
											<input type="hidden" name="qty">
								            <input type="number" class="form-control input" name="weight" step="0.1" min="0" value="0.0">
											<span id="kg">KG</span>
								        @else
								            <label for="input">ODABERITE KOLICINU:</label>
								            <input type="hidden" name="weight">
								            <input type="number" class="form-control input" name="qty" min="1" value="1">
								            <span id="kom">KOM</span>
										@endif
								        </div>
								        <button class="btn btn-danger btn-block mt-4">
					                		<i class="fas fa-shopping-cart" style="position:relative; margin-right:40%"><span>Dodaj</span>
					                		</i>
					                	</button>
				                	</form>
				                </div>
						  	</figcaption>
						</figure>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<section id="cart"	class="cart">
	<form action="{{ route('cart.create') }}" method="post">
	{{ csrf_field() }}
		<div class="container">
			<div class="table-responsive">
				<table class="table">
					<thead class="thead-light">
					    <tr>
					      	<th scope="col">
						      	<a href="#">
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
							{{ $qty = $product->price * $product->qty }} RSD
						@else
							{{ $weight = Cart::weight() * $product->price }} RSD
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
									@if(isset($qty) && isset($weight))
										{{ $qty + $weight }} RSD 
									@endif	
					      		</span>   
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
	$(function() {
		var defaultProduct = $(".content").parent().data('counter')
	   	$(".content").each(function() {
	        $(this).hide();
		    if($(this).attr('id') == 'main') {
		        $(this).show();
		    }
		});
		$.each(defaultProduct, function(id){
			$(".content").eq(id).show()
		});
		$('#block-thumbnail a img').on( "click", function(e) {
		    e.preventDefault();
		    var id = $(this).attr('data-id'); 
		    $(".content").each(function(){
		        $(this).hide();
		        $('.main-default').hide();
		        if($(this).attr('id') == id) {
		            $(this).show();
		        }
		    });
		}); 
		$(".btn-success").click(function (){
			$("#category").hide()
			$("#cart").show(500) 
		})
		$("#backToPrev").click(function(){
			$("#cart").hide()
			$("#category").show()
		})
	});
</script>
@endsection