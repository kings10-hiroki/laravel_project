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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('contact/messages') ? 'active' : '' }}" href="#"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Todo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/todo">List</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/todo/create">Create</a>
                </div>
            </li>
        </ul>
    </div>
</nav>