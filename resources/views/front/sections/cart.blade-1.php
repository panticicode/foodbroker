<section id="cart"	class="cart">
	<div class="container">
		<div class="table-responsive">
			<table class="table">
				<thead class="thead-light">
				    <tr>
				      	<th scope="col">
				      		<i id="backToPrev" class="fas fa-undo-alt"></i>
				      	</th>
				      	<th scope="col">Slika</th>
				      	<th scope="col">Proizvod</th>
				      	<th scope="col">Cena</th>
				      	<th scope="col">Kolicina</th>
				      	<th scope="col">Ukupno</th>
				    </tr>
				</thead>
				<tbody>
				@foreach(Cart::content() as $product)
				<tr>
			      	<th scope="row">
			      		<i class="fa fa-times-circle deleteRow" aria-hidden="true"></i>
					</th>
			      	<td>
			      		<a href="#">
							<img class="img-fluid" src="{{ asset($product->model->getImage($product->model->image)) }}" style="width: 70px; height: 100px">
						</a>
			      	</td>
			      	<td>{{ $product->name }}</td>
			      	<td>{{ $product->price }}</td>
			      	<td style="width: 10%">
			      		<input id="input-korpa" type="number" step="0.1" min="0" class="form-control" value="{{ $product->qty }}">	
			      	</td>
			      	<td>{{ $product->total }}Dinara</td>
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
				      		<span>{{ Cart::total() }}Dinara</span>   
				      	</td>
				    </tr>
				</tbody>
			</table>
		</div>
		<div id="small-screen">
			<div id="azuriraj" class="form-group">
				<button class="btn btn-outline-secondary">
					AZURIRAJ KORPU
				</button>
			</div>
			<div id="nastavi" class="form-group">
				<button class="btn btn-outline-dark">
					NASTAVI KA KUPOVINI
				</button>
			</div>	
		</div>
	</div>	
</section>