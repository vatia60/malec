<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('pages.index') }}">01300771076</a>
            </div>
            <div class="col-md-4">
             <form class="form-inline my-2 my-lg-0" action="{{ route('pages.search') }}" method="get">
                    <input class="form-control mr-sm-2" name="search" type="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
            <div class="col-md-4">
                <div class="right-top-header">

                        <!-- Authentication Links -->
                        @guest
                                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
