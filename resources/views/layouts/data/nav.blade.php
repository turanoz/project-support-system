<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
    <div class="container">
        <a class="navbar-brand" href="{{route("projects.me")}}">Proje Destek Sistemi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route("projects.index")}}" >
                        Projeler
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{\Illuminate\Support\Facades\Session::get("user")->ad." ".\Illuminate\Support\Facades\Session::get("user")->soyad}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route("projects.me")}}">Benim Projelerim</a></li>
                        <li><a class="dropdown-item" href="{{route("auth.signout")}}">Çıkış Yap</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
