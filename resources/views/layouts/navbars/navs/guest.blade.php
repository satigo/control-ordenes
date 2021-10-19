<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">{{ __('Light Bootstrap Dashboard Laravel') }}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                
                <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div><input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="guest@gmail.com" required autocomplete="email" autofocus></div>
                <div><input id="password" type="hidden" class="form-control @error('email') is-invalid @enderror" name="password" value="guest" required autocomplete="password" autofocus></div>
                <div><button type="submit" class="btn btn-warning btn-wd">{{ __('Invitado') }}</button></div>
                </form>
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nc-icon nc-chart-pie-35"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item @if($activePage == 'register') active @endif">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="nc-icon nc-badge"></i> {{ __('Registrarse') }}
                    </a>
                </li>
                <li class="nav-item @if($activePage == 'login') active @endif">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nc-icon nc-mobile"></i> {{ __('Iniciar Sesion') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>