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
           <legend class="uk-legend">Tiekėjai</legend>
        </div><br>

        {!! Form::model($suppliers, array('route' => array('supplier.update', $suppliers->id), 'method' => 'PUT')) !!}
        <span class="uk-label" for="supplierName">Tiekėjo pavadinimas</span>
        <div class="uk-margin">
            {!! Form::text('supplierName', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="supplierContact">Kontaktinis asmuo</span>
        <div class="uk-margin">
            {!! Form::text('supplierContact', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="address">Adresas</span>
        <div class="uk-margin">
            {!! Form::text('address', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="supplierTelephone">Telefono numeris</span>
        <div class="uk-margin">
            {!! Form::text('supplierTelephone', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="supplierEmail">El.Paštas</span>
        <div class="uk-margin">
            {!! Form::email('supplierEmail', null,['class' => 'uk-input']) !!}
        </div>

        <!-- TODO sutvarkyti, kad užsistatytų iš DB statusas -->
        <span class="uk-label" for="status">Statusas</span>
        <div class="uk-margin">
            {!! Form::select('supplierStatus', ['2' => 'Susidariusi skola', '1' => 'Tiekiama', '0' => 'Tiekimas sustabdytas'],null,['class' => 'uk-select']); !!}
        </div>

          {!! Form::submit('Atnaujinti', array('class' => 'uk-button uk-button-default uk-align-center')) !!}
          {!! Form::close() !!}

      </div>
    </div>

  </div>
</div>

@endsection
