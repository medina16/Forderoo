<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <h2>Forderoo</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ms-auto">

            @if(session()->has('id_customer'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ session('name') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/history">Order History</a></li>
                        <li><a class="dropdown-item" href="/favorite">Favorite Menu</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                </li>
            @endif
        </ul>
        </div>
    </div>
</nav>
    