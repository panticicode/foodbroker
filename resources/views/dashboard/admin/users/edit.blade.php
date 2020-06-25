@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	@include('dashboard.partials.card-header')
    <div class="grid">
    <p class="lead">{{ __(strtoupper('Ažuriraj Korisnika')) }}</p>
    <div class="grid-body">
        <div class="item-wrapper">
            <div class="row mb-3">
                <div class="col-md-8 mx-auto">
                    <form action="{{ route('users.update', $user) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                            <label for="inputType1" class="col-form-label">
	                           		{{ __(strtoupper('Ime i Prezime')) }}
	                       		</label>
	                        </div>
	                        <div class="col-md-9">
	                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('name', $user->name) }}">
	                            @if($errors->has('name'))
	                            <div class="invalid-feedback">
	                               {{ $errors->first('name') }}
	                            </div>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-md-3">
		                        <label for="inputType2" class=" col-form-label">
									{{ __(strtoupper('Email')) }}
	                            </label>
	                        </div>
	                        <div class="col-md-9">
	                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('email', $user->email) }}" >
	                            @if($errors->has('email'))
	                            <div class="invalid-feedback">
	                              {{ $errors->first('email') }}
	                            </div>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                           <label for="inputType4">
							   		{{ __(strtoupper('Lozinka')) }}
	                           </label>
	                        </div>
	                        <div class="col-md-9">
	                           <input type="password" name="password" id="inputType4" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
	                           @if($errors->has('password'))
	                           <div class="invalid-feedback">
	                             {{ $errors->first('password') }}
	                           </div>
	                           @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                           <label for="inputType5">
							   		{{ __(strtoupper('Telefon')) }}
	                           </label>
	                        </div>
	                        <div class="col-md-9">
	                           <input type="text" name="phone" id="inputType5" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone', $user->phone) }}">
	                           @if($errors->has('phone'))
	                           <div class="invalid-feedback">
	                             {{ $errors->first('phone') }}
	                           </div>
	                           @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                           <label for="inputType6">
									{{ __(strtoupper('Privilegije')) }}
	                           </label>
	                        </div>
	                        <div class="col-md-9">
	                        	<select id="inputType6" name="role_id" class="form-control">
	                        		<option value="{{ $user->role_id }}">
	                        			Izmena privilegija
	                        		</option>
	                        		@foreach($roles as $role)
	                        		<option value="{{ $role->id }}">
	                        			{{ $role->name }}
	                        		</option>
	                        		@endforeach
	                        	</select>
	                            @if($errors->has('role'))
	                            <div class="invalid-feedback">
	                               {{ $errors->first('role') }}
	                            </div>
	                         @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-12">
	                            <button class="btn btn-success btn-block">
	                            	Ažuriraj
	                            </button>
	                        </div>
	                    </div>
                    </form>
             	</div>
            </div>
        </div>
    </div>
 </div>
</main>
@endsection