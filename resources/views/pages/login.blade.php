<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proje Destek Sistemi</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form action="{{route("auth.signin")}}" method="post">
        <h1 class="h3 mb-3 fw-normal">Lütfen Giriş Yapınız</h1>
        @csrf
        <div class="form-floating">
            <input type="email" class="form-control" name="eposta" placeholder="Eposta adresi">
            <label for="floatingInput">Eposta Adresiniz</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="sifre" placeholder="Şifre">
            <label for="floatingPassword">Şifreniz</label>
        </div>

        <button class="w-100 btn btn-md btn-primary" type="submit">Giriş Yap</button>
    </form>
    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" class="w-100 btn btn-md btn-primary mt-2">Üye Ol</a>
    <p class="mt-5 mb-3 text-muted">&copy; 1978–2022</p>
</main>
{{--Üye Ol--}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Üye Ol</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Bilgilerinizi hemen girerek yeni bir üyelik oluşturabilirsiniz.
        </div>

        <form action="{{route("users.store")}}" method="post">
            @csrf
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="ad" placeholder="Ad">
                <label for="floatingInput">Ad</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control" name="soyad" placeholder="Soyad">
                <label for="floatingInput">Soyad</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="email" class="form-control" name="eposta" placeholder="Eposta adresi">
                <label for="floatingInput">Eposta Adresiniz</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="password" class="form-control" name="sifre" placeholder="Şifre">
                <label for="floatingPassword">Şifreniz</label>
            </div>

            <button class="w-100 btn btn-md btn-primary" type="submit">Kayıt Ol</button>
        </form>


    </div>
</div>
<script src="/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
