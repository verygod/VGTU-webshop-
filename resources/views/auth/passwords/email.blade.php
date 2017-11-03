@extends('layouts.app')

@section('content')

<div class="uk-grid-medium uk-child-width-expand@s uk-margin" uk-grid>
  <div class="uk-child-width-expand@s uk-card uk-card-default uk-card-body" uk-grid style="max-width: 50rem; margin: 0 auto;">
    <div class="uk-grid-item-match">
      <h3>Atstatyti slaptažodį</h3>

      @if (session('status'))
      <div uk-alert>
        <a class="uk-alert-close" uk-close> </a>
              {{ session('status') }}
          </div>
      @endif

      @if ($errors->has('email'))
      <div uk-alert>
        <a class="uk-alert-close" uk-close> </a>
        {{ $errors->first('email') }}
      </div>
      @endif

      <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="uk-margin{{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" placeholder="Vartotojo el.paštas" id="email" type="email" name="email" value="{{ old('email') }}" required>
          </div>
        </div>

        <p uk-margin>
         <button class="uk-button uk-button-default uk-button-small" type="submit">Išsiųsti slaptažodžio keitimo patvirtinimą</button>
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
