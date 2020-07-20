@extends('front.layouts.app')
@section('main')
<section id="category" class="category">
	<div class="row">
		<div id="cat-12" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
			<div class="hr">
				<hr class="ml-4">
			</div>
			<form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
			<div id="hr-line" class="row">
				<div class="col letter">
					<input type="text" placeholder="Email" name="email" class="btn btn-block letter @error('email') is-invalid @enderror">
					@error('email')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
				<div class="col padlock">
					<input type="password" placeholder="Password" name="password" class="btn btn-block padlock @error('password') is-invalid @enderror">
					@error('password')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
				<input type="submit" style="display:none">
			</div>
			</form>	
		</div>
		<div id="cat-1" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 bordered">
			@include('front.partials.cat_modal')
			<div class="layout-img">
				@foreach($categories as $category)
				<div id="block-left-thumbnail">
					<a href="#">
						<img class="img-fluid rounded-circle" src="{{ $category->getImage($category->image) }}" data-id="{{ $category->id }}">
					</a>
				</div>
				@endforeach
			</div>	
		</div>
		<div id="cat-10" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 fruit mt-3">
			<!--OVDE JE BILO-->
			<div id="grid-layout" class="row ml-4" data-counter="{{ $defaults }}">
				@foreach($products as $product)
				<div id="gridModal" class="modal">
				     
				</div>
				<div id="{{ $product->cat_id }}" class="col-4 content">
					<div class="img-thumbnail">
						<figure class="figure">
							<div class="layout-img" data-id="{{ $product->id }}" data-stock="{{ $product->visibility }}" data-img="{{ $product->getImage($product->image) }}" data-name="{{ $product->title }}" data-price="{{ $product->price }}" data-check="{{ $product->quantity }}">
								<img src="{{ $product->getImage($product->image) }}" class="figure-img" alt="placeholder">
						  	</div>
						  	<h3 data-stock="{{ $product->visibility }}">
							{!!
							$product->visibility ? strtoupper($product->title) : "OUT OF <br>STACK" 
							!!}
					  		</h3>
						</figure>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	$(function() {
		$(".layout-img").click(function(evt){
			var id    = $(this).attr("data-id"),
				img   = $(this).attr("data-img"),
				name  = $(this).attr("data-name"),
				price = $(this).attr("data-price"),
				stock = $(this).attr("data-stock"),
				check = $(this).attr("data-check"),
				type  = check == false ? 'KG' : 'KOM',
				chose = check == false ? 'ODABERITE TEŽINU' : 'ODABERITE KOLIČINU';
				input = check == false ? '<input type="number" class="form-control input" name="weight" step="0.1" min="0" value="0.0"><input type="hidden" name="quantity" value="0"><span id="kg">KG</span>' : '<input type="number" class="form-control input" name="qty" min="1" value="1"><input type="hidden" name="quantity" value="1"><span id="kom">KOM</span>'
				
			$("#gridModal").html(`
			<div id="layout-modal" class="layout-img">
				<img src="${img}" class="figure-img" alt="">
				<h3>${name.toUpperCase()}</h3>
				<p class="lead">${price} RSD/${type}</p>
			  	<figcaption class="figure-caption">
			  		<form action="cart/add/${id}" method="POST">
					{{ csrf_field() }}	
						<div class="form-group" style="margin-bottom: 0" id="input-container">
							<label for="input">${chose}:</label>
							${input}
						</div>
				        <button class="btn btn-block mt-4">
	                		DODAJ U KORPU
	                	</button>
                	</form>
			  	</figcaption>
		  	</div>
			`)
			if(stock == true)
			{
				$("#gridModal").modal({
				  	fadeDuration: 500,
				  	fadeDelay: 0.50
				});
			}

		});
		$("#cat-1").on('click', function(){
			$("nav #hideOnSmallScreen").fadeOut(750)
			$("#categoryModal").modal({
			  	fadeDuration: 500,
			  	fadeDelay: 0.50
			});
		});
		$("#categoryModal #block-thumbnail").on('click', function(){
			$("nav #hideOnSmallScreen").fadeIn(500)
		})
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

			// $("#block-thumbnail a img").each(function(){
		 //       	$(this).removeClass("cat-Border");
		 //    });
			// $(this).addClass("cat-Border");

		    $(".content").each(function(){
		        $(this).hide();
		        $('.main-default').hide();
		        if($(this).attr('id') == id) {
		            $(this).show();
		        }
		    });
		}); 
		$(".btn-success").click(function (){
			$("#category").hide(500)
		})
		$(window).scroll(function(){
			if ($(this).scrollTop() > 0) {
			    $("nav .hideOnSmallScreen").fadeOut(750)
			} else {
			    $("nav .hideOnSmallScreen").fadeIn(500)
			}
		})
		// $("#backToPrev").click(function(){
		// 	$("#cart").hide()
		// 	$("#category").show()
		// })
	});
</script>
@endsection

