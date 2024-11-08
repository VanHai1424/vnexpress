<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container-xl">
        <!-- Phần header -->
        @include('clients.blocks.header')
        <!-- Kết thúc header -->

        <!-- Phần banner -->
        @include('clients.blocks.banner')
        <!-- Kết thúc banner -->

        <!-- Main home -->
        @yield('content')
        
        <!-- Footer -->
        @include('clients.blocks.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('script')
</body>

</html>
