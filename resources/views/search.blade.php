@if(!empty($products))
@foreach($products as $product)
    <div id="searchreload">
        <div class="uk-card uk-card-default uk-card uk-card-hover">
            <div class="uk-card-media-top">
              <div class="uk-background-image@m uk-background-cover uk-background-muted uk-height-medium uk-width-large uk-flex uk-flex-center uk-flex-middle"
               style="background-image: url(../{{$product->imageURL}})" uk-parallax="bgy: -200" >
              </div>
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">{{$product->name}}</h3>

                <?php
                $string = strip_tags($product->description);

                if (strlen($string) > 40) {
                    $stringCut = substr($string, 0, 40);
                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                }
                  echo '<p>'.$string.'</p>';
                 ?>
            </div>
            <div class="uk-card-footer">
              <a href="#" class="uk-button uk-button-text">$ {{$product->price}}</a>
            </div>
        </div>
    </div>
@endforeach
@else
  Bybis
@endif
