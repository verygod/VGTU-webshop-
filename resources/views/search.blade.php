@if(!empty($products))
@foreach($products as $product)
    <div id="searchreload">
        <div class="uk-card uk-card-default uk-card uk-card-hover">
          <a href="{{ route('shop.show', $product->id) }}">
            <div class="uk-card-media-top">
              <div class="uk-background-image@s uk-background-cover uk-background-muted uk-height-medium uk-width-large uk-flex uk-flex-center uk-flex-middle"
               style="background-image: url(../{{$product->imageURL}})" uk-parallax="bgy: -200" >
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
@else
  NAN
@endif
