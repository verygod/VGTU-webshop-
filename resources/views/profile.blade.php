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

      @foreach($orders as $order)
    <div class="uk-margin">
        <div class="uk-card uk-card-default uk-card-medium uk-card-body">

              <button class="uk-button uk-button-text" type="button" 
              uk-toggle="target: #orders{{$order->id}}">
              <b style="font-size: 1.5rem">OR:{{$order->id}}</b></button>
              

              @if($order->status = 1)
                <em style="color: #3498db" class="uk-align-right">Užsakyta</em>
              @elseif($order->status = 2)
                <em style="color: #f1c40f" class="uk-align-right">Paruošta</em>
              @elseif($order->status = 3)
                <em style="color: #1abc9c" class="uk-align-right">Išsiųsta</em>
              @elseif($order->status = 4)
                <em style="color: #2ecc71" class="uk-align-right">Įvykdyta</em>
              @else
                <em style="color: #e74c3c" class="uk-align-right">Klaida! Kreiptis į administraciją.</em>
              @endif
                  
              <table class="uk-table uk-visible" id="orders{{$order->id}}" hidden>
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
<div class="uk-grid" uk-grid >
  <div class="uk-align-center uk-margin" id="pagination">
    {{ $orders->links('layouts.pagination') }}
  </div>
</div>
    </div>
  </div>

</div>

</body>

@endsection
