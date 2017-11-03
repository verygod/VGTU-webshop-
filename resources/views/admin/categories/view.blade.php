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
            <td>Pavadinimas</td>
            <td>Statusas</td>
            <td>Funkcijos</td>
          </tr>
        </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->categoryname}}</td>
            <td>
              @if($category->status == 1)
                Pardavinėjama
              @elseif ($category->status == 0)
                Sustabdyta
              @endif
            </td>
            <td>
              <ul class="uk-iconnav">
                <li><a href="{{ route('category.edit', $category->id) }}" uk-icon="icon: file-edit"></a></li>
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
          {{ $categories->links('layouts.pagination') }}
        </div>
      </div>
    </p>
  </div>
</div>
</div>
</div>

</body>




@endsection
