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
	   	<table id="foodbrokerProduct" class="table table-striped table-sm">
	      	<thead>
	        	<tr>
	              <th>#</th>
	              <th>NAZIV</th>
	              <th>KATEGORIJA</th>
	              <th>SLIKA</th>
	              <th style="position: relative; left: -1%">CENA</th>
	              <th>AŽURIRAJ CENU</th>
	              <th>NA STANJU</th>
	              <th>STOCK</th>
	        	</tr>
	      	</thead>
	      	<tbody>
      		<form id="formEdit" class="d-inline">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
				<input type="hidden" id="getId">
				<td id="singlePrice" style="position: relative; left:-1%; display:none;" class="productPrice">
					<input type="number" class="form-control" name="price" id="priceValue" style="width: 42%; position: absolute; top: 17px; padding:0">
					<span class="float-right ml-4">RSD</span>
				</td>
			</form>
	        @foreach($products as $product)
	          	<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>{{$product->category->title}}</td>
					<td>
						<img class="img-fluid" src="{{ $product->getImage($product->image) }}" style="max-width:50px; height: 60px">
					</td>
					<td class="priceOfProduct{{ $product->id }}">{{ $product->price }}</td>
					<td id="priceOfProduct{{ $product->id }}" style="position: relative; left:-1%; display:none;" class="productPrice">
						<input type="number" class="form-control" name="price" id="priceValue{{ $product->id }}" style="width: 42%; position: absolute; top: 17px; padding:0" value="{{ $product->price }}">
						<span class="float-right ml-4">RSD</span>
					</td>
					<td>
						<button id="changePriceBtn{{ $product->id }}" class="btn btn-outline-info btn-sm">
							<i class="fas fa-edit"></i>
						</button>
					</td>
					<td class="visibility{{ $product->id }}">
						{{ $product->visibility ? 'IN STOCK' : 'OUT OF STOCK' }}
					</td>
					<td>
						<a id="visibility" href="{{ route('foodbroker.product.stock', $product) }}" class="btn btn-outline-success btn-sm">
							<i class="fas fa-edit"></i>
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
@endsection
@section('script')
<script>
$(() => {
	//UPDATE PRICE
	$("button").on("click",(evt) => {
		let $this = evt.currentTarget
		
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        let id = data[0],
        	btn = $("#changePriceBtn" + id)

        	btn.toggleClass("btn-outline-info")
           .toggleClass("btn-outline-success")

        $("#getId").val(data[0])

        // $("#priceValue").val(data[4]) OVO MORA U BECKENDU NEKI IF KONDISN

        /**Put Price to #priceValue Input field**/
	    $("#priceValue" + id).change( (e) => {
	        let	changePrice = $(e.currentTarget).val()
	        $("#priceValue").val(changePrice)
	    })
	    /**Put Price to #priceValue Input field**/

		//$("#singlePrice").show()

        $("#priceOfProduct" + id).toggle()
		$(".priceOfProduct" + id).toggle()
		

        $("#priceValue" + id).focus(() => {
        	btn.addClass("ajaxReady")
        }) 
	})
	$("form").on("submit", (evt) => {
    	evt.preventDefault()
    })
    $("body").on("click", ".ajaxReady", (e) => {
    	let $this = e.currentTarget
		
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        let id = data[0],
        	btn = $("#changePriceBtn" + id)

    	$.ajax({
            type: 'POST',
            url: "{{ url('dashboard/foodbroker/product/update') }}/" + id,
            data: $("#formEdit").serialize(),
            success: (res) => {
                $(".priceOfProduct" + id).text(res.product.price)
                // console.log(res)
                
                btn.removeClass("ajaxReady")
                
                // $("#formEdit").trigger("reset")

                setTimeout(() => {
                  $(".alert-info").show()
                  $(".alert-info").html(res.edit)
                  $(".alert-info").fadeOut(2000)
                }, 500)
                // location.reload()
            },
            error: (err) => {
                console.log(err)
            }  
        })
    })
	//UPDATE PRICE
	//UPDATE VISIBILITY
	$("body").on("click", "#visibility", (evt) => {
		evt.preventDefault()
		let $this = evt.currentTarget,

        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        let id = data[0]
        // console.log(data)

		$.ajax({
            type: 'GET',
            url: "{{ url('dashboard/foodbroker/product/stock') }}/" + id,
            data: $("#visibility").serialize(),
           
            success: (res) => {
                //$("#formBtnEdit").text('Updated')
                // console.log(res)
                if(res.product.visibility == false)
                {
                	$(".visibility" + id).text('OUT OF STOCK')
                }
                else
                {
                	$(".visibility" + id).text('IN STOCK')
                }
                //console.log(res)
                
                setTimeout(() => {
                  $(".alert-info").show()
                  $(".alert-info").html(res.visibility)
                  $(".alert-info").fadeOut(2000)
                }, 500)
                // location.reload()
            },
            error: (err) => {
                console.log(err)
            }  
        })
	})
	//UPDATE VISIBILITY
})
</script>
@endsection
