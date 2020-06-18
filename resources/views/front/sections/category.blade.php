<section id="category" class="category">
	<div class="row">
		<div id="cat-1" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 bordered mt-5 mb-3">
			@foreach($catAll as $category)
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
				<button type="button" class="btn btn-success float-right">
					KORPA
					<span class="count">4</span>
				</button>

				</div>	
			</div>	
			<hr class="ml-3">
			<!--DEFAULT PRODUCT WITH FIRST CATEGORY-->
			<div id="main-default" class="row ml-1 main-default">
				@foreach($defaults as $product)
				<div class="col-4">
					<div class="img-thumbnail">
						<figure class="figure">
				  			<img src="{{ $product->getImage($product->image) }}" class="figure-img img-fluid rounded-circle" alt="placeholder">
						  	<figcaption class="figure-caption">
						  		<h3>{{ $product->title }}</h3>	
						  	</figcaption>
						</figure>
					</div>
				</div>
				@endforeach
			</div>
			<!--DEFAULT PRODUCT WITH FIRST CATEGORY-->
			<div class="row ml-1">
				@foreach($products as $product)
				<div id="{{ $product->cat_id }}" class="col-4 content">
					<div class="img-thumbnail">
						<figure class="figure">
				  			<img src="{{ $product->getImage($product->image) }}" class="figure-img img-fluid rounded-circle" alt="placeholder">
						  	<figcaption class="figure-caption">
						  		<h3>{{ $product->title }}</h3>	
						  	</figcaption>
						</figure>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>	
	
</section>
@section('script')
<script>
	$(function() {
	   	$(".content").each(function() {
	        $(this).hide();
		    if($(this).attr('id') == 'main') {
		        $(this).show();
		    }
		});
		$('#block-thumbnail a img').on( "click", function(e) {
		    // e.preventDefault();
		    var id = $(this).attr('data-id'); 
		    $(".content").each(function(){
		        $(this).hide();
		        $('.main-default').hide();
		        if($(this).attr('id') == id) {
		            $(this).show();
		        }
		    });
		});
	});
</script>
@endsection