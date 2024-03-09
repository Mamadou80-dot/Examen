<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'SB Admin 2 - Dashboard')</title>
    <link href="{{ asset('Themes/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('Themes/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Themes/css/styles.css') }}" rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">
    @include('layouts.partials.sidebar') <!-- Inclure la barre latérale comme un composant -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('layouts.partials.topbar') <!-- Inclure la barre supérieure comme un composant -->
            <div class="container-fluid">
                @yield('content') <!-- Contenu spécifique de chaque page -->
            </div>
        </div>
        @include('layouts.partials.footer') <!-- Inclure le pied de page comme un composant -->
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include('layouts.partials.logout_modal') <!-- Inclure le modal de déconnexion comme un composant -->
<script src="{{ asset('Themes/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('Themes/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Themes/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('Themes/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('Themes/vendor/chart.js/Chart.min.js') }}"></script>
@yield('scripts') <!-- Scripts spécifiques de chaque page -->
</body>

</html>
