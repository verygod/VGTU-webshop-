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

        {!! Form::open(['route' => 'supplier.store']) !!}
        <span class="uk-label" for="supplierName">Tiekėjo pavadinimas</span>
        <div class="uk-margin">
            {!! Form::text('supplierName', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="contact">Kontaktinis asmuo</span>
        <div class="uk-margin">
            {!! Form::text('contact', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="address">Adresas</span>
        <div class="uk-margin">
            {!! Form::text('address', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="phone_number">Telefono numeris</span>
        <div class="uk-margin">
            {!! Form::text('phone_number', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="email">El.Paštas</span>
        <div class="uk-margin">
            {!! Form::email('email', null,['class' => 'uk-input']) !!}
        </div>


        <span class="uk-label" for="status">Statusas</span>
        <div class="uk-margin">
            {!! Form::select('status', ['2' => 'Susidariusi skola', '1' => 'Tiekiama', '0' => 'Tiekimas sustabdytas'], null, ['class' => 'uk-select']); !!}
        </div>

          {!! Form::submit('Pridėti', array('class' => 'uk-button uk-button-default uk-align-center')) !!}
          {!! Form::close() !!}

      </div>
    </div>

  </div>
</div>

@endsection
