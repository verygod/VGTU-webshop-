    <div class="uk-width-1-4@m">
        <div class="uk-card uk-card-default uk-card-body uk-margin">
          <h3 class="uk-card-title uk-text-center">Admin funkcijos</h3>
              <!-- TODO jei tiekėjų nėra neleidžia daryti kategorijos, jei kategorijos nėra neleidžia produkto pridėti-->

              <p uk-margin>
                <ul class="uk-list uk-link-text">
                  <li><a href="{{ route('supplier.index') }}">Pridėti <u>tiekėją</u></a></li>
                  <li><a href="{{ route('category.index') }}">Pridėti <u>kategoriją</u></a></li>
                  <li><a href="{{ route('products.index') }}">Pridėti <u>prekę</u></a></li>
                  <li><hr></li>
                  <li><a href="{{ url('admin/suppliers') }}"><u>Tiekėjai</u></a></li>
                  <li><a href="{{ url('admin/categories') }}"><u>Kategorijos</u></a></li>
                  <li><a href="{{ url('admin/products') }}"><u>Prekės</u></a></li>
                  <li><hr></li>
                  <li><a href="{{ route('users.index') }}" uk-icon="icon: users">Vartotojai </a></li>
                  <li><a href="{{ route('roles.index') }}" uk-icon="icon: tag">Rolės </a></li>
                  <li><a href="{{ route('permissions.index') }}" uk-icon="icon: copy">Leidimai </a></li>
                </ul>
              </p>
        </div>
    </div>
