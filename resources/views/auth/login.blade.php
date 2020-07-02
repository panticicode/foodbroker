@extends('front/layouts.app')

@section('main')
<section id="login" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5 mb-5">
                    <div class="card-body mt-4">
                        <h4>{{ __('ULOGUJ SE') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Lozinka">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <a href="{{ route('register') }}">
                                <p>JOS UVEK NISTE REGISTROVANI?</p>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
