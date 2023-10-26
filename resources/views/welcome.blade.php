<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <script crossorigin="anonymous"></script>
    <head>
        <meta name="user-id" content="{{Auth::user()}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Polytourisme</title>
    </head>
    <body style="margin: 0; min-height: 100vh; display: grid; grid-template-rows: auto 1fr auto;">
        <div id="app">
            <router-view style="height: auto; min-height:83.9vh;"></router-view>
        </div>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </body>
</html>