<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<!-- loader spinner -->
<svg class="spinner" id="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
    <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg>


<div id="app">
    <app></app>
</div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>