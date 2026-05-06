<!DOCTYPE html>
<html>
<head>
    <title>App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('layouts.navigation')

<div class="p-6">
    @yield('content')
</div>

</body>
</html>