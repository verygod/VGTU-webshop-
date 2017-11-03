@extends('layouts.app')

@section('content')

<div class="uk-grid-medium uk-child-width-expand@s uk-margin" uk-grid>
  <div class="uk-child-width-expand@s uk-card uk-card-default uk-card-body" uk-grid style="max-width: 50rem; margin: 0 auto;">
    <div class="uk-grid-item-match">
      <h3>Prisijungti</h3>
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
            <input class="uk-input" type="email" name="email" id="email" placeholder="Vartotojo el.paštas">
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-inline{{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" type="password" name="password" id="password" placeholder="Slaptažodis">
          </div>
        </div>

        <p uk-margin>
         <button class="uk-button uk-button-default uk-button-large">Prisijungti</button>
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
@endsection
