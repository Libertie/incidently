    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="/" >
                <img src="{{ asset('img/logo.svg') }}" width="30" height="30" class="d-inline-block align-top mr-1" alt="">
                Incidently
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incidents.index') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incidents.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">People</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>