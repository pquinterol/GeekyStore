
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">

            </ul>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!! trans('navbar.selectLanguage') !!}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('lang.setLanguage', 'es')}}">{!! trans('navbar.es') !!}</a>
                      <a class="dropdown-item" href="{{route('lang.setLanguage', 'en')}}">{!! trans('navbar.en') !!}</a>
                  </div>
              </li>
            </ul>
        </div>