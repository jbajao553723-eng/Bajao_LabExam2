<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rice System</title>

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Content -->
    <div class="container mx-auto p-6">

        @isset($header)
            <header class="mb-6">
                {{ $header }}
            </header>
        @endisset

        {{ $slot ?? '' }}

        @yield('content')

    </div>

</body>
</html>