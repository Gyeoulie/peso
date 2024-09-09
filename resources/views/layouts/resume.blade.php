<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/PESO-Logo.png') }}">

    <title>{{ config('app.name', 'PESO') }}</title>


</head>

<body>

    {{ $slot }}
    <script>
        // Listen for storage events
        window.addEventListener('storage', function(event) {
            if (event.key === 'user-logged-out' && event.newValue === 'true') {
                localStorage.removeItem('user-logged-out'); // Clean up
                window.location.href = '/'; // Redirect to the welcome page
            }
        });

        // Check local storage on page load
        function checkSessionOnLoad() {
            if (localStorage.getItem('user-logged-out')) {
                localStorage.removeItem('user-logged-out'); // Clean up
                window.location.href = '/'; // Redirect to the welcome page
            }
        }

        // Run check on page load
        checkSessionOnLoad();
    </script>
</body>

</html>
