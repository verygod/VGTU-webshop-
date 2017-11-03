@extends('layouts.app')

@section('content')

<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

      <div class="uk-width-1-4">
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title">Sveiki, {{ Auth::user()->name }}</h3>
          <p>Esate prisijungęs prie mūsų elektroininės parduotuvės!</p>
        </div>

            <div class="uk-card uk-margin" uk-margin>
              <div class="uk-card uk-card-default uk-card-body ">
                <h3 class="uk-card-title uk-text-center">Kontaktinė informacija</h3>

                {{ Form::model($user, array('route' => array('home.update', $user->id), 'method' => 'PUT')) }}


                <div class="uk-grid-small" uk-grid>
                <div class="uk-width-1-2@m">
                  <span class="uk-label" for="name">Vardas</span>
                  <div class="uk-margin">
                    {!! Form::text('name', null,['class' => 'uk-input']) !!}
                  </div>
                </div>



                <div class="uk-width-1-2@m">
                  <span class="uk-label" for="surname">Pavardė</span>
                  <div class="uk-margin">
                    {!! Form::text('surname', null,['class' => 'uk-input']) !!}
                  </div>
                </div>

                <div class="uk-width-1-1@m">
                  <span class="uk-label" for="city">Miestas</span>
                  <div class="uk-margin">
                    {!! Form::text('city', null,['class' => 'uk-input']) !!}
                  </div>
                </div>

                <div class="uk-width-1-2@m">
                  <span class="uk-label" for="address">Adresas</span>
                  <div class="uk-margin">
                    {!! Form::text('address', null,['class' => 'uk-input']) !!}
                  </div>
                </div>


                <div class="uk-width-1-2@m">
                  <span class="uk-label" for="postcode">Pašto kodas</span>
                  <div class="uk-margin">
                    {!! Form::text('postcode', null,['class' => 'uk-input']) !!}
                  </div>
                </div>

                <div class="uk-width-1-1@m">
                  <span class="uk-label" for="telephone">Telefonas</span>
                  <div class="uk-margin">
                    {!! Form::text('telephone', null,['class' => 'uk-input']) !!}
                  </div>
                </div>


                <!-- <div class="uk-width-1-1@m">
                    <span class="uk-label" for="postcode">El.Paštas</span>
                  <div class="uk-margin" >
                    {!! Form::text('email', null,['class' => 'uk-input uk-disabled']) !!}
                  </div>
                </div> -->

                <p uk-margin class="uk-text-center">
                 {{ Form::submit('Atnaujinti informaciją', array('class' => 'uk-button uk-button-secondary')) }}
               </p>
             </div>
              {{ Form::close() }}

              </div>
              </div>
            </div>

<div>
    <div class="uk-card uk-card-default uk-card-body">
      <table class="uk-table uk-table-divider">
        <thead>
          <tr>
            <td>Prekė</td>
            <td>Kiekis</td>
            <td>Kaina</td>
            <td>Išimti iš krepšelio</td>
          </tr>
        </thead>
      <tbody>
        {{ Form::open(array('route' => 'updatecart')) }}
        @foreach($cart as $item)
        <tr>
            <td><a href="{{route('shop.show', $item->id)}}" class="uk-button uk-button-text">{{$item->name}}</a></td>
            <td><input class="uk-input uk-form-blank uk-form-width-small" type="number" name="qty{{$item->id}}" value="{{$item->qty}}"></td>
            <td>$ {{$item->price}}</td>
            <td ><a href="" uk-icon="icon: close"></a></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td><button class="uk-button uk-button-text" type="submit" >Atnaujinti</button></td>
          {{ Form::close() }}
          <td>Bendras prekių kiekis: {{Cart::count()}}</td>
          <td>Bendra kaina: {{Cart::total()}}</td>
          <td></td>
        </tr>
      </tfoot>
    </table>
    <p class="uk-margin">
       <button class="uk-button uk-button-secondary">Apmokėti</button>
       <button class="uk-button uk-button-secondary">Išvalyti krepšelį</button>
    </p>
  </div>
</div>
</div>
</div>

</body>




@endsection
