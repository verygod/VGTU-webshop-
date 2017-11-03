@extends('layouts.app')

@section('content')


<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent

<div>
    <div class="uk-card uk-card-default uk-card-body">
      <h1 class="uk-text-center"><u>Esami vartotojai</u></h1>
      <table class="uk-table uk-table-divider">
        <thead>
          <tr>
              <td>Name</td>
              <td>Email</td>
              <td>Date/Time Added</td>
              <td>User Roles</td>
              <td>Operations</td>
          </tr>
        </thead>
      <tbody>
        @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                      <ul class="uk-iconnav">
                        <li><a href="{{ route('users.edit', $user->id) }}" uk-icon="icon: file-edit"></a></li>
                        @if( Auth::user()->name  != $user->name)
                        <li><a href="{!! route('users_destroy', $user->id) !!}" uk-icon="icon: trash"></a></li>
                        @endif
                      </ul>
                    </td>
                </tr>
                @endforeach
      </tbody>
    </table>
    <p class="uk-margin">
       <a href="{{ route('users.create')}}" class="uk-button uk-button-secondary">Sukurti vartotoją</a>
    </p>
  </div>
</div>






    </div>
  </div>
</body>



@endsection
