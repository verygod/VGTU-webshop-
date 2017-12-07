@if (count($errors) > 0)
<div uk-alert class="uk-alert-warning uk-width-1-2 uk-align-center">
    <a class="uk-alert-close" uk-close></a>
    <ul class="uk-link-muted">
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif