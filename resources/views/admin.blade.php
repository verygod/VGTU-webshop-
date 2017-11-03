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
            <td>Užsakymas</td>
            <td>Pilna kaina</td>
            <td>Statusas</td>
            <td>Funkcijos</td>
          </tr>
        </thead>
      <tbody>
        <tr>
            <td>OR:123</td>
            <td>$1000.00</td>
            <td>
              <select class="uk-select uk-form-medium">
                <option>Užsakyta</option>
                <option>Paruošta</option>
                <option>Išsiųsta</option>
                <option>Pristatyta</option>
              </select>
            </td>
            <td>
              <ul class="uk-iconnav">
                <li><a href="#" uk-icon="icon: info"></a></li>
                <li><a href="#" uk-icon="icon: check"></a></li>
              </ul>
            </td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>

</div>

</body>

@endsection
