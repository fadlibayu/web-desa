<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Dusun Gatak') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <style>
            body { font-family: 'Inter', sans-serif; background-color: #F8F3E1; color: #41431B; }
            .admin-header {
                background: #F8F3E1;
                border-bottom: 1px solid #f0f0f0;
                box-shadow: 0 1px 2px rgba(0,0,0,0.02);
            }
            .admin-card {
                background: #F8F3E1;
                border-radius: 12px;
                box-shadow: 0 8px 24px rgba(65, 67, 27, 0.08), 0 4px 8px rgba(65, 67, 27, 0.04);
                border: 1px solid #E3DBBB;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }
            .admin-card:hover {
                box-shadow: 0 12px 32px rgba(65, 67, 27, 0.12), 0 4px 12px rgba(65, 67, 27, 0.06);
            }
            .admin-input {
                background: #F8F3E1;
                border: 1px solid #E3DBBB;
                border-radius: 8px;
                padding: 10px 14px;
                transition: all 0.2s ease;
            }
            .admin-input:focus {
                outline: none;
                border-color: #41431B;
                box-shadow: 0 0 0 3px rgba(47, 133, 90, 0.1);
            }
            .btn-primary {
                background-color: #41431B;
                color: white;
                border-radius: 8px;
                padding: 8px 20px;
                font-weight: 500;
                transition: all 0.2s ease;
                font-size: 14px;
            }
            .btn-primary:hover {
                background-color: #41431B;
            }
            .btn-danger {
                background-color: #fff5f5;
                color: #c53030;
                border-radius: 8px;
                padding: 8px 20px;
                font-weight: 500;
                transition: all 0.2s ease;
                font-size: 14px;
            }
            .btn-danger:hover {
                background-color: #fed7d7;
            }
            .text-primary { color: #41431B; }
            .text-secondary { color: #AEB784; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="pt-24 pb-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
                    {{ $header }}
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
