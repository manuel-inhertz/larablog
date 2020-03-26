@extends('layouts.app')

@section('content')
  <!--Intro Section-->
  <section class="view intro-2">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!--Form with header-->
              <div class="card">
                <div class="card-body p-0">

                  <!--Header-->
                  <div class="form-header purple-gradient p-2 text-center text-white mb-4">
                    <h3><i class="fas fa-user mt-2 mb-2"></i> Log in:</h3>
                  </div>

                  <!--Form-->
                  <form method="POST" action="{{ route('login') }}">
                      @csrf

                      <div class="md-form row">
                          <div class="col-md-8 offset-md-2">
                              <input id="email" placeholder="{{__('Email')}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="md-form row">
                          <div class="col-md-8 offset-md-2">
                              <input id="password" placeholder="{{__('Password')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-8 offset-md-2">
                              <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                  <label class="custom-control-label" for="remember">
                                      {{ __('Remember Me') }}
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="md-form row mb-0">
                          <div class="col-md-8 offset-md-2 text-center">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Login') }}
                              </button>

                              @if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                  </a>
                              @endif
                          </div>
                      </div>
                  </form>

                </div>
              </div>
              <!--/Form with header-->

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
