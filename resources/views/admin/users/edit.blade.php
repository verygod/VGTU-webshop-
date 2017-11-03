@extends('layouts.app')

@section('content')


<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent


<div class="uk-width-2-3">
    <div class="uk-card uk-card-default uk-card-body uk-text-center">
    <h1>Redaguoti vartotoją</h1>
    <div class="uk-grid-item-match">

      {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
        {{ csrf_field() }}

        <div class="uk-margin">
          <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            {{ Form::text('name', null, array('class' => 'uk-input')) }}
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            {{ Form::email('email', null, array('class' => 'uk-input')) }}
          </div>
        </div>

        <div class="uk-section uk-section-muted uk-width-1-3@m uk-align-center">
          <div class="uk-container">
            <h5><b>Priskirti rolę</b></h5>
            @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
          </div>
        </div>


       <p uk-margin>
         {{ Form::submit('Redaguoti', array('class' => 'uk-button uk-button-secondary')) }}

         {{ Form::close() }}
       </p>
     </div>
   </div>
</div>

  </div>
</div>
</body>


@endsection
