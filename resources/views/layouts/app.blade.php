<!DOCTYPE html>
<?php
  $categories = DB::table('categories')->where('status', 1)->get();
?>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/uikit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uikit-rtl.css') }}" rel="stylesheet">
</head>

<body >

<div class="ui-kit">
  <nav class="uk-navbar-container uk-navbar-primary" uk-navbar >
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active">
              <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            </li>
            <li><a href="{{ url('/')}}">Parduotuvė</a></li>
            <li>
                <a href="#">Kategorijos</a>
                <div class="uk-navbar-dropdown" uk-dropdown="mode: click">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        @foreach($categories as $category)
                        <li><a href="{{route('category.show',$category->id)}}">{{$category->categoryname}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
        @guest
      <li>
        <ul class="uk-iconnav" style="margin-right: 2rem">
          <a href="#modal-login" class="uk-icon-link" uk-icon="icon: cart" style="margin-right: 1rem" uk-toggle></a>
          <a href="#" class="uk-icon-link" uk-icon="icon: users"></a>
          <div class="uk-navbar-dropdown"  uk-dropdown="mode: click">
              <ul class="uk-nav uk-navbar-dropdown-nav">
                  <li><a href="#modal-login" uk-toggle>Prisijungti</a></li>
                  <li><a href="#modal-register" uk-toggle>Registruotis</a></li>
              </ul>
          </div>
        </ul>
      </li>
      @else
      <li>
        <ul class="uk-iconnav" style="margin-right: 2rem">
          @if(Cart::count() > 0)
          <div title="
          Prekių: <strong> {{Cart::count()}} </strong><br>
          Kaina: <strong> $ {{Cart::total()}}</strong>" uk-tooltip="pos: bottom">
          <a href="{{url('home')}}" class="uk-icon-link" uk-icon="icon: cart" style="margin-right: 1rem">

          </a>
          </div>
          @else
          <a href="{{url('home')}}" class="uk-icon-link" uk-icon="icon: cart" style="margin-right: 1rem"></a>
          @endif


          <a href="#" class="uk-icon-link" uk-icon="icon: settings"></a>
          <div class="uk-navbar-dropdown" uk-dropdown="mode: click">
              <ul class="uk-nav uk-navbar-dropdown-nav">
                @role('Admin')
                  <li><a href="{{ route('admin') }}" ><b>Admin</b></a></li>
                @endrole
                  <li><a href="{{ route('profile') }}">Profilis</a></li>
                  <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Atsijungti
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
              </ul>
          </div>
        </ul>
      </li>
      @endguest
      </ul>
    </div>
  </nav>
</div>

<!-- OTHER -->

<div id="modal-login" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            <div class="uk-background-cover" style="background-image: url('https://images.unsplash.com/photo-1504274066651-8d31a536b11a?auto=format&fit=crop&w=1275&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D');" uk-height-viewport></div>
            <div class="uk-padding-large">
                <h1>Prisijungti</h1>
                <div class="uk-grid-item-match">
                  @if ($errors->has('email'))
                  <div uk-alert>
                    <a class="uk-alert-close" uk-close> </a>
                    {{ $errors->first('email') }}
                  </div>
                  @endif

                  @if ($errors->has('password'))
                  <div uk-alert>
                    <a class="uk-alert-close" uk-close> </a>
                    {{ $errors->first('password') }}
                  </div>
                  @endif
                  <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="uk-margin">
                      <div class="uk-inline{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="email" name="email" placeholder="Vartotojo el.paštas">
                      </div>
                    </div>

                    <div class="uk-margin">
                      <div class="uk-inline{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" name="password" placeholder="Slaptažodis">
                      </div>
                    </div>

                    <p uk-margin>
                     <button class="uk-button uk-button-default uk-button-large">Prisijungti</button>
                     <a href="#modal-register" class="uk-button uk-button-secondary uk-button-large" uk-toggle>Registruotis</a>
                   </p>
                   <p uk-margin>
                     <div class="uk-margin uk-link-muted">
                       <label><input class="uk-checkbox" type="checkbox"> Prisiminti duomenis...</label>
                     </div>
                     <a class="uk-link-muted" href="{{ route('password.request') }}">
                         Pamiršai slaptažodį?
                     </a>
                   </p>
                  </form>
                 </div>
            </div>
        </div>
    </div>
</div>


<div id="modal-register" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
          <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            <div class="uk-background-cover" style="background-image: url('https://images.unsplash.com/photo-1504355080015-bba52674577b?auto=format&fit=crop&w=1234&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D');" uk-height-viewport></div>
            <div class="uk-padding-large">
                <h1>Registracija</h1>
                <div class="uk-grid-item-match">

                  @if ($errors->has('name'))
                  <div uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ $errors->first('name') }}
                  </div>
                  @endif

                  @if ($errors->has('email'))
                  <div uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ $errors->first('email') }}
                  </div>
                  @endif

                  @if ($errors->has('password'))
                  <div uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ $errors->first('password') }}
                  </div>
                  @endif


                  <form class="uk-grid-small" method="POST" action="{{ route('register') }}" uk-grid>
                    {{ csrf_field() }}
                    <div class="uk-width-1-1">
                      <div class="uk-margin">
                          <input id="email" class="uk-input" type="email" name="email" value="{{ old('email') }}" placeholder="Vartotojo el.paštas" required>
                      </div>
                    </div>

                    <div class="uk-width-1-2@s">
                      <div class="uk-margin">
                        <input id="name" class="uk-input" type="text" name="name" value="{{ old('name') }}" placeholder="Vartotojo vardas" required>
                      </div>
                    </div>

                    <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                        <input class="uk-input" type="text" name="surname" placeholder="Pavardė" value="{{ old('surname') }}" required>
                    </div>
                  </div>

                  <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                      <input id="password" class="uk-input" type="password" name="password" placeholder="Slaptažodis" required>
                    </div>
                  </div>

                  <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                      <input id="password-confirm" class="uk-input" type="password" name="password_confirmation" placeholder="Slaptažodis x2" required>
                    </div>
                  </div>

                  <div class="uk-width-1-1">
                    <p uk-margin>
                     <button class="uk-button uk-button-secondary uk-button-large">Registruotis</button>
                     <a href="#modal-login" class="uk-button uk-button-default uk-button-large" uk-toggle>Prisijungti</a>
                   </p>
                  </div>
                  </form>
                 </div>
              </div>
            </div>
          </div>
        </div>


        @if(Session::has('flash_message'))
        <div uk-alert class="uk-alert-success uk-width-1-2 uk-align-center">
            <a class="uk-alert-close" uk-close></a>
            {!! session('flash_message') !!}
        </div>
        @endif


          @include ('layouts.error')

          </div>
        </div>


        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
</body>
</html>
