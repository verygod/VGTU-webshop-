@extends('layouts.app')

@section('content')


  <div class="uk-offcanvas-content uk-margin" style="width: 80%; margin: 0 auto;">
      @foreach($products as $product)
      <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s" uk-grid>
          <div class="uk-card-media-left">
              @foreach($images as $image)
              <div uk-lightbox>
                <a href="../../{{$image->image}}" data-caption="{{$product->name}}">
                    <img src="../../{{$image->image}}" alt="{{$product->name}}">
                </a>
            </div>
              @endforeach
          </div>
          <div>
              <div class="uk-card-body">
                  <h3 class="uk-card-title">{{$product->name}}</h3>
                  <p>{{$product->description}}</p>

                  <p>
                    @if($product->price != $product->oldprice AND $product->price < $product->oldprice)
                    <a href="{{ route('addtocart', $product->id)}}" class="uk-button uk-button-default">Pirkti už <strong>$ {{$product->price}} </strong>/ <s>$ {{$product->oldprice}}</s></a>
                    <br><span></span>
                    @else
                    <a href="{{ route('addtocart', $product->id)}}" class="uk-button uk-button-default">Pirkti už <strong>$ {{$product->price}}</strong></a>
                    @endif
                  </p>
              </div>
          </div>
      </div>
  </div>

        @endforeach

@endsection
