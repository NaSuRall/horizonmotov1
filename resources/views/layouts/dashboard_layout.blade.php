<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('custom_css')
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="row">
                <div class="column left">
                   @include('partials.sidebar')
                </div>
                <div class="column right">
                    @yield('content')
                </div>
            </div>
        </main>


                <script>
        function openModal() {
            document.getElementById('userModal').style.display = 'block';
        }
        
        function closeModal() {
            document.getElementById('userModal').style.display = 'none';
            document.getElementById('userForm').reset();
        }
        
        // Fermer la modale en cliquant à l'extérieur
        window.onclick = function(event) {
            var modal = document.getElementById('userModal');
            if (event.target == modal) {
                closeModal();
            }
        }
        </script>
    </div>
</body>
</html>
