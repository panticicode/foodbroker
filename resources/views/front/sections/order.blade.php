@extends('front.layouts.app')
@section('main')
<section id="order" class="order">
	<div class="container">
		<h2 class="mt-5">
			<a href="{{ route('cart') }}">
				<i id="backToPrev" class="fas fa-undo-alt float-left"></i>
			</a>
			Detalji Porudžbine
		</h2>
		<form action="{{ route('order.store') }}" method="post" class="mb-3">
			{{ csrf_field() }}
		    <div class="form-row">
		        <div class="form-group col-md-6">
		         	<label for="inputName">
		         		Ime<span> *</span>
		         	</label>
		         	<input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="inputName" value="{{ old('firstname') }}">
		         	@error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
		      	</div>
			    <div class="form-group col-md-6">
			        <label for="inputLastname">
			        	Prezime<span> *</span>
			        </label>
			        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="inputLastname" value="{{ old('lastname') }}">
			        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			    </div>
		    </div>
		    <div class="form-group">
		      	<label for="inputKompanija">
		      		Ime Kompanije (opciono)
		      	</label>
		      	<input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="inputKompanija" value="{{ old('company') }}">
		      	@error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		    <div class="form-group">
		      	<label for="inputCountry">
		      		Country/Region<span> *</span>
		      	</label>
		      	<select id="inputCountry" name="country" class="form-control @error('country') is-invalid @enderror">
		      	@error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
					@foreach($countries as $country)
						<option value="{{ $country->id }}">
							{{ old('country', $country->name) }}
						</option>
					@endforeach
	         	</select>
		    </div>
		    <div class="form-group">
		      	<label for="inputAddress">
		      		Adresa<span> *</span>
		      	</label>
		      	<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputAddress" placeholder="Ulica i broj" value="{{ old('address') }}">
		      	@error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		    <div class="form-group">
			   <input type="text" name="apartment" class="form-control @error('apartment') is-invalid @enderror" placeholder="Apartment, suite, unit, etc. (optional)" value="{{ old('apartment') }}">
			   @error('apartment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		    <div class="form-row">
		        <div class="form-group col-md-6">
		         	<label for="inputDate">
		      		Datum isporuke<span> *</span>
			      	</label>
				   	<input id="inputDate" name="delivery_date" type="date" class="form-control @error('delivery_date') is-invalid @enderror" value="{{ old('delivery_date') }}">
				   	@error('delivery_date')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		      	</div>
			    <div class="form-group col-md-6">
			        <label for="inputTime">
			        	Vreme isporuke<span> *</span>
			        </label>
			        <select id="inputTime" name="delivery_time" class="form-control @error('delivery_time') is-invalid @enderror" value="{{ old('delivery_time') }}">
		        	@error('delivery_time')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	                	@php
							$times = ['09:00', '15:00', '20:00'];
	                	@endphp
	                	@foreach($times as $time)
							<option value="{{ $time }}">
				        		{{ old('delivery_time', $time) }}
				        	</option>
	                	@endforeach
			        </select>
			    </div>
		    </div>
		    <div class="form-group">
		        <label for="inputCity">
		        	Grad<span> *</span>
		        </label>
		        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="inputCity" value="{{ old('city') }}">
		        @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		    <div class="form-group">
		        <label for="inputZip">
		        	Postanski broj<span> *</span>
		        </label>
		        <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="inputZip" value="{{ old('postal_code') }}">
		        @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		   	<div class="form-group">
		        <label for="inputPhone">
		        	Kontakt Telefon<span> *</span>
		        </label>
		        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" value="{{ old('phone') }}">
		        @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		   	<div class="form-group">
		        <label for="inputEmail">
		        	Email adresa<span> *</span>
		        </label>
		        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{ old('email') }}">
		        @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		    </div>
		    <div class="form-group">
		        <label for="inputTextField">
		        	DODATNA PITANJA<span> *</span>
		        </label>
		        <textarea id="inputTextField" name="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="5">{{ old('content') }}</textarea>
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