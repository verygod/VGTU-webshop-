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
           <legend class="uk-legend">Kategorijos</legend>
        </div><br>
        {!! Form::model($categories, array('route' => array('category.update', $categories->id), 'method' => 'PUT')) !!}
        <span class="uk-label" for="categoryname">Kategorijos pavadinimas</span>
        <div class="uk-margin">
            <!-- <input class="uk-input" type="text" placeholder="Tiekėjo pavadinimas" name="name"> -->
            {!! Form::text('categoryname', null,['class' => 'uk-input']) !!}
        </div>

        <span class="uk-label" for="status">Statusas</span>
        <div class="uk-margin">
            {!! Form::select('status', ['1' => 'Aktyvi', '0' => 'Neaktyvi'], null, ['class' => 'uk-select']); !!}
        </div>

          {!! Form::submit('Atnaujinti', array('class' => 'uk-button uk-button-default uk-align-center')) !!}

        {!! Form::close() !!}


      </div>
    </div>
  </div>
</div>

@endsection
