<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GSB - Gestion de frais</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


</head>



<!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page introuvable</p>
        <p class="text-gray-500 mb-0">On dirait que vous avez trouvé un bug dans la matrice</p>
        <a href="/">&larr; Retour à l'acceuil</a>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>
