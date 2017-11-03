@extends('layouts.app')

@section('content')
<div class="uk-grid-medium uk-child-width-expand@s uk-margin" uk-grid>
  <div class="uk-child-width-expand@s uk-card uk-card-default uk-card-body" uk-grid style="max-width: 50rem; margin: 0 auto;">
    <div class="uk-grid-item-match">
      <h3>Registracija</h3>

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
       </p>
      </div>
      </form>
     </div>
   </div>
</div>
@endsection
