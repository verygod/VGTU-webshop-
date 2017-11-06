@extends('layouts.app')

@section('content')

<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

      <div class="uk-width-1-4@m ">
        <div class="uk-card uk-card-default uk-card-body uk-visible@m">
          <span class="">
            <h3 class="uk-card-title">Sveiki, {{ Auth::user()->name }}</h3>
            <p>Esate prisijungęs prie mūsų elektroininės parduotuvės!</p>
          </span>

        </div>

            <div class="uk-card uk-margin" uk-margin>
              <div class="uk-card uk-card-default uk-card-body ">
                <h3 class="uk-card-title uk-text-center uk-visible@m">
                  Kontaktinė informacija
                </h3>

                <span class="uk-hidden@m uk-align-center">
                  <button class="uk-button uk-button-text" type="button" uk-toggle="target: .toggle">Kontaktinė informacija</button>
                </span>

              <div class="toggle">
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

                <p uk-margin class="uk-text-center">
                 {{ Form::submit('Atnaujinti informaciją', array('class' => 'uk-button uk-button-secondary')) }}
               </p>
             </div>
              {{ Form::close() }}
              </div>
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
            <td >
              <a href="{!! route('removefromcart', $item->rowId) !!}" uk-icon="icon: close" onclick="return confirm('Ar tikrai trinti?')"></a>
            </td>
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
       <a class="uk-button uk-button-secondary" href="{{ route('checkout') }}">Apmokėti</a>
       <a class="uk-button uk-button-secondary" href="{{ route('clearcart') }}">Išvalyti krepšelį</a>
    </p>
  </div>


  @foreach($orders as $order)
    <div class="uk-margin">
        <div class="uk-card uk-card-default uk-card-large uk-card-body">

              <b>ORD:{{$order->id}}</b>

              @if($order->status = 1)
                <em style="color: #3498db">Užsakyta</em>
              @elseif($order->status = 2)
                <em style="color: #f1c40f">Paruošta</em>
              @elseif($order->status = 3)
                <em style="color: #1abc9c">Išsiųsta</em>
              @elseif($order->status = 4)
                <em style="color: #2ecc71">Įvykdyta</em>
              @else
                <em style="color: #e74c3c">Klaida! Kreiptis į administraciją.</em>
              @endif
                  
              <table class="uk-table">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Prekė</td>
                    <td>Kiekis</td>
                    <td>Kaina (vnt.)</td>
                    <td>Bendra kaina</td>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h6>Viso: <b>${{$order->totalprice}}</b></h6> </td>
                  </tr>
                </tfoot>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                @foreach($OrderedItems as $oi)

                  @if($order->id == $oi->orderID)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$oi->name}}</td>
                    <td>{{$oi->quantity}} vnt.</td>
                    <td>${{$oi->price}}</td>
                    <td>${{$oi->price * $oi->quantity}}</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
  @endforeach



</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>


@endsection
