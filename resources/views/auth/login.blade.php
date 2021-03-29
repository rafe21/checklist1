<!DOCTYPE html>
<html lang="eg">
    <head>
        <!-- Basics HTML5 -->
        <meta charset="UTF-8">
        <meta name="author" content="Nour Homsi">
         <meta name="description" content="learn web desige">
          <meta http-equiv="x-UA-Compatidle" content="IE-edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <script src="js/login.js" ></script>
          <link rel="shortcut icon"href="imgs/favicon.ico"> 
      <!-- My code -->
      <title> login </title>
        <link href="{{asset('/css/stylelogin.css')}}"  rel="stylesheet"/>
      </head>
      <body>
          <div class="container">
        <!-- WEBSITE BODY -->
     <div class="login-wrap row">
        <div class="login-html col-sm-12">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form class="sign-in-htm"  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                   
                    <div class="group">
                        
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                
                    <div class="hr"></div>
                   </a>
                </form>
                <form class="sign-up-htm" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
         <!-- SCRIBT -->..
         @push('login')
        <script src="{{ asset('js/login.js') }}" ></script>
        @endpush

         <script src="https://ajax.googleapis.com/ajax/libs/mootools/1.6.0/mootools.min.js"></script>
        
     </body>
</html>