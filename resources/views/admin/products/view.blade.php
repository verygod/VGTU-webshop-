@extends('layouts.app')

@section('content')

<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent


<div>
    <div class="uk-card uk-card-default uk-card-body">
      <table class="uk-table uk-table-divider">
        <thead>
          <tr>
            <td>id</td>
            <td>Prekė</td>
            <td>Kiekis</td>
            <td>Kaina</td>
            <td>Kategorija</td>
            <td>Tiekėjas</td>
            <td>Funkcijos</td>
          </tr>
        </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->quantity}}</td>
            <td>$ {{$product->price}}</td>
            <td>{{$product->categoryname}}</td>
            <td><a href="{{ route('supplier.edit', $product->supplierID) }}" class="uk-link-reset uk-button-text">{{$product->supplierName}}</a></td>
            <td>
              <ul class="uk-iconnav">
                <li><a href="{{ route('products.edit', $product->id) }}" uk-icon="icon: file-edit"></a></li>
                <li><a href="#" uk-icon="icon: trash"></a></li>
              </ul>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p class="uk-margin">
      <div class="uk-grid" uk-grid >
        <div class="uk-align-center uk-margin" id="pagination">
          {{ $products->links('layouts.pagination') }}
        </div>
      </div>
    </p>
  </div>
</div>
</div>
</div>

</body>




@endsection
