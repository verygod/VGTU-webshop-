@extends('layouts.app')

@section('content')


<div class="uk-offcanvas-content" style="width: 80%; margin: 0 auto;">

<div class="uk-grid-small uk-child-width-expand@s uk-margin" uk-grid>
    <div class="uk-width-1-1">
      <form class="uk-search uk-search-large uk-align-center">
        <span uk-search-icon></span>
        <input class="uk-search-input" type="search" id="search" placeholder="...">
      </form>
    </div>
</div>

<div class="uk-grid-small uk-child-width-1-4@m" uk-grid id="searchbox" >
  @foreach($products as $product)
      <div id="searchreload">
          <div class="uk-card uk-card-default uk-card uk-card-hover">
            <a href="{{ route('shop.show', $product->id) }}">
              <div class="uk-card-media-top">
                <div class="uk-background-image uk-background-cover uk-background-center-center uk-background-muted uk-height-medium uk-width-1-1 uk-flex uk-flex-center uk-flex-middle"
                 style="background-image: url(../{{$product->imageURL}})">
                </div>
              </div>
            </a>
              <div class="uk-card-body">
                  <h3 class="uk-card-title"><a class="uk-link-muted" href="{{ route('shop.show', $product->id) }}">{{$product->name}}</a></h3>

                  <?php
                  $string = strip_tags($product->description);

                  if (strlen($string) > 40) {
                      $stringCut = substr($string, 0, 40);
                      $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                  }
                    echo '<p>'.$string.'</p>';
                   ?>
              </div>
              <div class="uk-card-footer uk-text-center">
                @if($product->price != $product->oldprice AND $product->price < $product->oldprice)
                <a href="{{ route('addtocart', $product->id)}}" class="uk-button uk-button-default">$ {{$product->price}} / <s>$ {{$product->oldprice}}</s></a>
                <br><span></span>
                @else
                <a href="{{ route('addtocart', $product->id)}}" class="uk-button uk-button-default">$ {{$product->price}}</a>
                @endif
              </div>
          </div>
      </div>
  @endforeach

</div>

<div class="uk-grid" uk-grid >
  <div class="uk-align-center uk-margin" id="pagination">
    {{ $products->links('layouts.pagination') }}
  </div>
</div>

</div>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keyup(function(){
      var str = $("#search").val();
        if(str == "") {
          console.log('Search is empty');
           $( "#searchbox" ).load(location.href + " #searchreload");
           $( "#pagination" ).show("#pagination");
        } else {
          $.get( "{{ url('/search?id=') }}"+str, function( data ) {
            $( "#searchbox" ).html( data );
            $( "#pagination" ).hide("#pagination");
          });
        };
    });
  });
</script>

@endsection
