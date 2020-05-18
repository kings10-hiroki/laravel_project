<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                    href="{{ route('contact') }}">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact/messages') ? 'active' : '' }}"
                    href="{{ route('get-messages') }}">See messages</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Listing</a>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}"
                    href="{{ route('listings.index') }}">Listing</a>
            </li>
            @endguest
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('todo') ? 'active' : '' }}" href="#"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Todo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/todo">List</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/todo/create">Create</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('/photoshow') ? 'active' : '' }}" href="#"
                    id="AlbumNavbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Photo Show
                </a>
                <div class="dropdown-menu" aria-labelledby="AlbumNavbarDropdown">
                    <a class="dropdown-item" href="{{ route('photoshow-index') }}">Home</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('album-create') }}">Create</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('/request') ? 'active' : '' }}" href="#"
                    id="RequestNavbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Request
                </a>
                <div class="dropdown-menu" aria-labelledby="RequestNavbarDropdown">
                    <a class="dropdown-item" href="/request">Home</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/request/create">Insert request</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('/request') ? 'active' : '' }}" href="#"
                    id="MailNavbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Mail
                </a>
                <div class="dropdown-menu" aria-labelledby="MailNavbarDropdown">
                    <a class="dropdown-item" href="{{ route('mail-index') }}">Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('mail-create') }}">Send Mail</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('sent') }}">Sent Mail</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('deleted') }}">Deleted Mail</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('address') ? 'active' : '' }}" href="/address">Address</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @guest
            <li class="nav-item">
                <a class="nav-link navbar-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link navbar-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
</nav>