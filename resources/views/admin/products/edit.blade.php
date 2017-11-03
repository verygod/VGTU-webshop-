@extends('layouts.app')

@section('content')

<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent

    <div class="">
      <div class="uk-card uk-card-body uk-card-default">
        <div class="uk-card-header">
           <legend class="uk-legend">Legend</legend>
        </div><br>
        {!! Form::model($products, array('route' => array('products.update', $products->id), 'method' => 'PUT', 'files' => true)) !!}

        <span class="uk-label" for="name">Produkto pavadinimas</span>
        <div class="uk-margin">
            {!! Form::text('name', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="price">Kaina</span>
        <div class="uk-margin">
            {!! Form::text('price', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="quantity">Kiekis</span>
        <div class="uk-margin">
            {!! Form::text('quantity', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="supplier">Tiekėjas</span>
        <div class="uk-margin" >
            <select class="uk-select" name="supplierID">
              @if(!empty($suppliers))
              @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{$supplier->supplierName}}</option>
              @endforeach
              @else
                Nėra tiekėjų
              @endif
            </select>
        </div>


        <span class="uk-label" for="categoryID">Kategorija</span>
        <div class="uk-margin">
            <select class="uk-select" name="categoryID">
              @if(!empty($categories))
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{$category->categoryname}}</option>
              @endforeach
              @else
                Nėra kategorijų
              @endif
            </select>
        </div>

        <span class="uk-label" for="description">Aprašymas</span>
        <div class="uk-margin">
            {!! Form::textarea('description', null,['class' => 'uk-textarea']) !!}
        </div>

        <span class="uk-label" for="imageURL">Nuotraukos įkelimas</span>
        <div class="uk-margin" uk-margin>
          <div uk-form-custom="target: true">
            <input type="file" name="imageURL" >
            <input class="uk-input uk-form-width-large" type="text" placeholder="" name="imageURL" disabled>
          </div>
        </div>


        <span class="uk-label" for="status">Statusas</span>
        <div class="uk-margin">
            {!! Form::select('status', ['1' => 'Aktyvi', '0' => 'Neaktyvi'], null, ['class' => 'uk-select']); !!}
        </div>

          {!! Form::submit('Pridėti', array('class' => 'uk-button uk-button-default uk-align-center')) !!}
          {!! Form::close() !!}


      </div>
    </div>

  </div>
</div>

@endsection
