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
      @if ($errors->has('password_confirmation'))
      <div uk-alert>
        <a class="uk-alert-close" uk-close> </a>
            {{ $errors->first('password_confirmation') }}
          </div>
      @endif
      <form method="POST" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="uk-margin">
          <div class="uk-inline{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" type="email" name="email" id="email" value="{{ $email or old('email') }}" placeholder="Vartotojo el.paštas">
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-inline{{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" id="password" type="password" name="password"  placeholder="Naujas slaptažodis" required>
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-inline{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" id="password_confirm" type="password" name="password_confirmation" placeholder="Naujas slaptažodis x2" required>
          </div>
        </div>

        <p uk-margin>
         <button class="uk-button uk-button-default uk-button-large" type="submit">Pakeisti slaptažodį</button>
       </p>
      </form>
     </div>
   </div>
</div>




<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password_confirm" type="password" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
