<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - Jayyid Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    @include('components.navigation')

    <!-- Main Content - Full Width -->
    <main class="w-full">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- JavaScript untuk konfirmasi delete -->
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product?');
        }
    </script>
</body>
</html>