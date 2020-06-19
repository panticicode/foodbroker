<!--DEFAULT PRODUCT WITH FIRST CATEGORY-->
			<div id="main-default" class="row ml-1 main-default">
				@foreach($defaults as $product)
				<div class="col-4">
					<div class="img-thumbnail">
						<figure class="figure">
				  			<img src="{{ $product->getImage($product->image) }}" class="figure-img img-fluid rounded-circle" alt="placeholder">
						  	<figcaption class="figure-caption">
						  		<h3>{{ $product->title }}</h3>
						  		<div class="row seek">
									<form><hr class="mt-4">
										<div class="form-group" style="margin-bottom: 0" id="input-container">
											<label for="input">ODABERITE KOLICINU:</label>
								            <input type="number" class="form-control" step="0.1" min="0" value="0.0">
								            <span id="kg">KG</span>
								        </div>
								        <button id="dodaj" class="btn btn-danger btn-block mt-4" type="button">
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
			<!--DEFAULT PRODUCT WITH FIRST CATEGORY-->