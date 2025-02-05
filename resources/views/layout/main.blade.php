<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App</title>
    @vite('resources/css/app.css')
    <script
      src="https://kit.fontawesome.com/386b31f430.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    @yield('content')

    @stack('scripts')
</body>
</html>