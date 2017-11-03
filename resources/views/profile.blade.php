@extends('layouts.app')

@section('content')

<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
<div class="uk-grid-small uk-child-width-expand@m" uk-grid>
    <div class="uk-width-1-4@m">
      <div class="uk-card uk-card-default">
          <div class="uk-card-header">
              <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                      <img class="uk-border-circle" width="40" height="40" src="https://getuikit.com/docs/images/avatar.jpg">
                  </div>
                  @foreach($profile as $info)
                  <div class="uk-width-expand">
                      <h3 class="uk-card-title uk-margin-remove-bottom">{{ $info->name }}</h3>
                      <p class="uk-text-meta uk-margin-remove-top"><time datetime="{{$info->created_at}}">{{$info->created_at}}</time></p>
                  </div>
              </div>
          </div>
          <div class="uk-card-body">
              <p>
                <ul class="uk-list">
                  <li>{{$info->city}}</li>
                  <li>{{$info->address}}</li>
                  <li>LT-{{$info->postcode}}</li>
                  <li>{{$info->telephone}}</li>
                  <li>{{$info->email}}</li>
                </ul>
              </p>
          </div>
      </div>
        <!-- <div class="uk-card uk-card-default uk-card-body uk-margin">
          <h3 class="uk-card-title uk-text-center">Kontaktinė informacija</h3>

        </div> -->
    </div>
      @endforeach
  <div>
    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-header">
          Užsakymai
      </div>

    </div>
  </div>

</div>

</body>

@endsection
