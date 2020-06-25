@extends('front.layouts.app')

@section('main')
<section id="home" class="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        DOBRO DOŠLI {{ Auth::user()->name }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Ovde mozete ažurirati Vaš profil!</p>
                    </div>
                    <p class="lead">
                        <a href="#" class="show-me">Prikaži</a>
                        <a href="#" class="hide-me">Zatvori</a>
                    </p>
                </div>
                <div id="form-profile" class="card-body">
                    <form method="POST" action="{{ route('profile.update', $user->id) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">IME I PREZIME</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ empty($user) ? old('name') : $user->name }}" required autocomplete="name" autofocus>
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
                                    <input id="cardId" type="text" class="form-control" name="cardId" value="{{ empty($user) ? old('cardId') : $user->cardId }}" autocomplete="cardId" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="municipality">
                                        IZABERITE VASU OPŠTINU
                                    </label>
                                    <select class="form-control" id="municipality" name="municipality">
                                        <option value="" selected="" disabled="">
                                            {{ $user->municipality }}
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
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">
                                        ADRESA I BROJ STANA:
                                    </label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ empty($user) ? old('address') : $user->address }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">EMAIL</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ empty($user) ? old('email') : $user->email }}" required autocomplete="email">
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
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ empty($user) ? old('phone') : $user->phone }}" autocomplete="phone" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <p>Želite da izmenite lozinku?</p>
                                <p class="passwordField">
                                    <a href="#" class="show-pass">Prikaži</a>
                                    <a href="#" class="hide-pass">Zatvori</a>
                                </p> 
                            </div>
                            <div id="passwordField" class="col-md-12">
                                <div class="form-group">
                                    <label for="password">LOZINKA</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div> 
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>    
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection
@section('script')
<script>
    $(() => {
        $("#form-profile").hide()
        $(".hide-me").hide()
        $(".hide-pass").hide()
        $("#passwordField").hide()

        let bool = false
        $(".lead").on("click", () => {
            $("#form-profile").toggle(500)
            bool = !bool
            checkLogin()
        })
        let boolPass = false
        $(".passwordField").click(() => {
            $("#passwordField").toggle(500)
            boolPass = !boolPass
            passwordField()
        })
        let checkLogin = () => {
            if(bool)
            {
                
                $(".show-me").hide(350)
                $(".hide-me").show(500)
            }
            else
            {
                
                $(".hide-me").hide(350)
                $(".show-me").show(500)
            }
            
        }
        let passwordField = () => {
            if(boolPass)
            {
                
                $(".show-pass").hide(350)
                $(".hide-pass").show(500)
            }
            else
            {
                
                $(".hide-pass").hide(350)
                $(".show-pass").show(500)
            }
            
        }
    })
</script>
@endsection 
