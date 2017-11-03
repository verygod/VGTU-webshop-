@extends('layouts.app')

@section('content')


<body>


<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent

<div class="uk-width-1-2@m">
    <div class="uk-card uk-card-default uk-card-body uk-text-center">
    <h1>Pridėti rolę</h1>
    <div class="uk-grid-item-match">

      {{ Form::open(array('url' => 'roles')) }}
        {{ csrf_field() }}

        <div class="uk-margin">
          <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            {{ Form::text('name', null, array('class' => 'uk-input')) }}
          </div>
        </div>

            <h3><u>Esami leidimai</u></h3>
          @foreach ($permissions as $permission)
              {{ Form::checkbox('permissions[]',  $permission->id ) }}
              {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
          @endforeach
          <hr class="uk-divider-small">


       <p uk-margin>
         {{ Form::submit('Pridėti', array('class' => 'uk-button uk-button-secondary')) }}

         {{ Form::close() }}
       </p>
      </form>
     </div>
   </div>
 </div>

 <div class="uk-width-1-4@m">
  <div class="uk-card uk-card-default uk-card-body uk-text-center">
    <h3>Esamos rolės</h3>
    <table class="uk-table uk-table-small uk-table-divider">
      <thead>
        <tr>
          <td>Roles</td>
          <td>Operation</td>
        </tr>
      </thead>
    <tbody>
      @foreach ($roles as $role)
      <tr>
        <td>{{ $role->name }}</td>
        <td><a href="{!! route('role_destroy', $role->id) !!}" uk-icon="icon: trash"></a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
 </div>

  </div>
</div>
</body>


@endsection
