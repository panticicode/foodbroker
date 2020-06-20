@extends('front.layouts.app')
@section('main')
<section id="order" class="order">
	<div class="container">
		<h2 class="mt-5">
			<a href="{{ route('cart') }}">
				<i id="backToPrev" class="fas fa-undo-alt float-left"></i>
			</a>
			Detalji Porudzbine
		</h2>
		<form class="mb-3">
		    <div class="form-row">
		        <div class="form-group col-md-6">
		         	<label for="inputName">
		         		Ime<span> *</span>
		         	</label>
		         	<input type="text" class="form-control" id="inputName">
		      	</div>
			    <div class="form-group col-md-6">
			        <label for="inputLastname">
			        	Prezime<span> *</span>
			        </label>
			        <input type="text" class="form-control" id="inputLastname">
			    </div>
		    </div>
		    <div class="form-group">
		      	<label for="inputKompanija">
		      		Ime Kompanije (opciono)
		      	</label>
		      	<input type="text" class="form-control" id="inputKompanija">
		    </div>
		    <div class="form-group">
		      	<label for="inputCountry">
		      		Country/Region<span> *</span>
		      	</label>
		      	<select id="inputCountry" class="form-control">
	            	<option selected>Srbija</option>
	            	<option>...</option>
	         	</select>
		    </div>
		    <div class="form-group">
		      	<label for="inputAddress">
		      		Adresa<span> *</span>
		      	</label>
		      	<input type="text" class="form-control" id="inputAddress" placeholder="Ulica i broj">
		    </div>
		    <div class="form-group">
			   <input type="text" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)">
		    </div>
		    <div class="form-group">
		    	<label for="inputDate">
		      		Datum i Vreme isporuke<span> *</span>
		      	</label>
			   	<input id="inputDate" type="datetime-local" class="form-control">
		    </div>
		    <div class="form-group">
		        <label for="inputCity">
		        	Grad<span> *</span>
		        </label>
		        <input type="text" class="form-control" id="inputCity">
		    </div>
		    <div class="form-group">
		        <label for="inputZip">
		        	Postanski broj<span> *</span>
		        </label>
		        <input type="text" class="form-control" id="inputZip">
		    </div>
		   	<div class="form-group">
		        <label for="inputPhone">
		        	Kontakt Telefon<span> *</span>
		        </label>
		        <input type="text" class="form-control" id="inputPhone">
		    </div>
		   	<div class="form-group">
		        <label for="inputEmail">
		        	Email adresa<span> *</span>
		        </label>
		        <input type="email" class="form-control" id="inputEmail">
		    </div>
		    <div class="form-group">
		        <label for="inputTextField">
		        	DODATNA PITANJA<span> *</span>
		        </label>
		        <textarea id="inputTextField" class="form-control" cols="30" rows="5"></textarea>
		    </div>
		    <button type="submit" class="btn btn-outline-dark btn-block">
		   		PORUCI
			</button>
		</form>
	</div>
</section>
@endsection
@section('script')
<script>
	$("#order").show(500)
	$(function(){
		$("#backToPrev").click(function(){
			$("#order").hide(750)
		})
	})
</script>
@endsection