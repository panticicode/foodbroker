@extends('front.layouts.app')

@section('main')
<section id="register" class="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body mt-5">
                        <h4>{{ __('DOBRO DOŠAO NOVI KOMŠIJA') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">IME I PREZIME</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cardId">
                                            BROJ LIČNE KARTE(OPCIONALNO)
                                        </label>
                                        <input id="cardId" type="text" class="form-control" name="cardId" value="{{ old('cardId') }}" autocomplete="cardId" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="municipality">
                                            IZABERITE VASU OPŠTINU
                                        </label>
                                        <select class="form-control @error('municipality') is-invalid @enderror" id="municipality" required name="municipality">
                                            <option value="" selected="" disabled="">
                                                Izaberite opštinu
                                            </option>
                                        @foreach($municipalities as $municipality)
                                            <option value="{{ $municipality->name }}">
                                                {{ $municipality->name }}
                                            </option>
                                        @endforeach
                                        </select>
                                        @error('municipality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <!-- <select class="form-control" id="municipality" name="municipality">
                                            <option value="" selected="" disabled="">
                                                Izaberite opštinu
                                            </option>
                                            <option value="1">
                                                Čukarica
                                            </option>
                                            <option value="2">
                                                Novi Beograd
                                            </option>
                                            <option value="3">
                                                Palilula
                                            </option>
                                            <option value="4">
                                                Rakovica
                                            </option>
                                            <option value="5">
                                                Savski venac
                                            </option>
                                            <option value="6">
                                                Stari grad
                                            </option>
                                            <option value="7">
                                                Voždovac
                                            </option>
                                            <option value="8">
                                                Vračar
                                            </option>
                                            <option value="9">
                                                Zemun
                                            </option>
                                            <option value="10">
                                                Zvezdara
                                            </option>
                                        </select> -->  
                                    </div>
                                    <div class="form-group">
                                        <label for="address">
                                            ADRESA I BROJ STANA:
                                        </label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">
                                            BROJ TELEFONA:
                                        </label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">LOZINKA</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">
                                            POTVRDITE LOZINKU
                                        </label>
                                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div> 
                            </div> 
                            <a href="{{ route('login') }}">
                                <p>IMATE PROFIL? ULOGUJTE SE OVDE</p>
                            </a>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
