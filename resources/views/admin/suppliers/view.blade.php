@extends('layouts.app')

@section('content')

<body>
<div class="uk-offcanvas-content uk-margin" style="width: 99%">
  <div class="uk-grid-small uk-child-width-expand@m" uk-grid>

    @component('layouts.admin')
    @endcomponent


<div>
    <div class="uk-card uk-card-default uk-card-body uk-overflow-auto">
      <table class="uk-table uk-table-divider">
        <thead>
          <tr>
            <td><span uk-icon="icon: hashtag" title="Pavadinimas" uk-tooltip="pos: right"></span></td>
            <td><span uk-icon="icon: home" title="Adresas" uk-tooltip="pos: right"></span></td>
            <td><span uk-icon="icon: user" title="Kontaktinis asmuo" uk-tooltip="pos: right"></span></td>
            <td><span uk-icon="icon: phone" title="Telefono numeris" uk-tooltip="pos: right"></span></td>
            <td><span uk-icon="icon: mail" title="El.Paštas" uk-tooltip="pos: right"></span></td>
            <td><span uk-icon="icon: info" title="Statusas" uk-tooltip="pos: right"></span></td>
            <td></td>
          </tr>
        </thead>
      <tbody>
        @foreach($suppliers as $supplier)
        <tr>
            <td>{{$supplier->supplierName}}</td>
            <td>{{$supplier->address}}</td>
            <td>{{$supplier->supplierContact}}</td>
            <td>{{$supplier->supplierTelephone}}</td>
            <td>{{$supplier->supplierEmail}}</td>
            <td>
              @if($supplier->supplierStatus == 2)
                Susidariusi skola
              @elseif ($supplier->supplierStatus == 1)
                Tiekiama
              @elseif ($supplier->supplierStatus == 0)
                Tiekimas sustabdytas
              @endif
            </td>
            <td>
              <ul class="uk-iconnav">
                <li><a href="{{ route('supplier.edit', $supplier->id) }}" uk-icon="icon: file-edit"></a></li>
                <li>
                  <a href="{{ route('suppliers_destroy', $supplier->id) }}" uk-icon="icon: trash" onclick="return confirm('Ar tikrai trinti šį tiekėją {{ $supplier->supplierName }}?')"></a></li>
              </ul>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <p class="uk-margin">
      <div class="uk-grid" uk-grid >
        <div class="uk-align-center uk-margin" id="pagination">
          {{ $suppliers->links('layouts.pagination') }}
        </div>
      </div>
    </p>
    <!-- <p class="uk-margin">
       <button class="uk-button uk-button-secondary">Apmokėti</button>
       <button class="uk-button uk-button-secondary">Išvalyti krepšelį</button>
    </p> -->
  </div>
</div>
</div>
</div>

</body>




@endsection
