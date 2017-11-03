@extends('layouts.app')

@section('content')


<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent

<div class="uk-width-1-2">
    <div class="uk-card uk-card-default uk-card-body">
    <h1>Visi leidimai</h1>
    <div>
          <table class="uk-table uk-table-divider">
            <thead>
              <tr>
                <td>Permissions</td>
                <td>Operation</td>
              </tr>
            </thead>
          <tbody>
            @foreach ($permissions as $permission)
            <tr>
              <td>{{ $permission->name }}</td>
              <td>
                <ul class="uk-iconnav">
                  <!-- <li><a href="{{ route('permissions.edit', $permission->id) }}" uk-icon="icon: file-edit"></a></li> -->
                  <li><a href="{{ route('permissions_destroy', $permission->id) }}" uk-icon="icon: trash"></a></li>
                </ul>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
   </div>
  </div>
</div>

<div class="uk-width-1-4">
  <div class="uk-card uk-card-default uk-card-body uk-text-center">
    {{ Form::open(array('url' => 'permissions')) }}
    <h1>Pridėti leidimą</h1>
    <div class="uk-margin">
      <div class="uk-inline">
        <span class="uk-form-icon" uk-icon="icon: cog"></span>
        {{ Form::text('name', '', array('class' => 'uk-input')) }}
      </div>
    </div>
    @if(!$roles->isEmpty())
      <h4>Assign Permission to Roles</h4>
      @foreach ($roles as $role)
          {{ Form::checkbox('roles[]',  $role->id ) }}
          {{ Form::label($role->name, ucfirst($role->name)) }}<br>

      @endforeach
  @endif
  <br>
  {{ Form::submit('Add', array('class' => 'uk-button uk-button-primary')) }}

  {{ Form::close() }}
  </div>
  </div>
</div>
</body>


@endsection
