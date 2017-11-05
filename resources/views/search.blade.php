@if(!empty($products))
@foreach($products as $product)
      <div id="searchreload">
          <div class="uk-card uk-card-default uk-card uk-card-hover">

            <div class="uk-card-media-top">
              <a href="{{ route('shop.show', $product->id) }}">
                <canvas style="background-image: url(../{{$product->imageURL}}); background-size: 70%;" width="350px" height="300px" class="uk-background-center-center uk-background-cover uk-background-image">
                  
                </canvas>
              </a>
            </div>
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
@else
  NAN
@endif
