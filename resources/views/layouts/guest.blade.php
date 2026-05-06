<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Dusun Gatak') }} - Masuk Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            body { font-family: 'Inter', sans-serif; background-color: #F8F3E1; }
            h1, h2, h3, .font-serif { font-family: 'Playfair Display', serif; }
            
            .auth-card {
                background: #F8F3E1;
                border: 1px solid #E3DBBB;
                border-top: 4px solid #41431B;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }
            .auth-input {
                background: #F8F3E1;
                border: 1px solid #cbd5e1;
                border-radius: 6px;
                padding: 10px 14px;
                transition: all 0.2s ease;
                width: 100%;
            }
            .auth-input:focus {
                outline: none;
                border-color: #41431B;
                box-shadow: 0 0 0 3px rgba(47, 133, 90, 0.1);
            }
            .btn-primary {
                background-color: #41431B;
                color: white;
                border-radius: 6px;
                padding: 10px 24px;
                font-weight: 500;
                transition: all 0.2s ease;
                width: 100%;
                text-align: center;
                display: block;
            }
            .btn-primary:hover {
                background-color: #41431B;
                transform: translateY(-1px);
            }
        </style>
    </head>
    <body class="font-sans text-[#41431B] antialiased relative">
        <!-- Background accents -->
        <div class="absolute inset-0 bg-[#F8F3E1] z-0"></div>
        <div class="absolute top-0 left-0 w-full h-64 bg-[#41431B] z-0 opacity-10"></div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
            <div class="mb-8 text-center">
                <a href="/" class="flex flex-col items-center gap-3 group">
                    <img src="{{ asset('logo-dusun.png') }}" alt="Logo Dusun Gatak" class="w-16 h-16 rounded-full bg-[#F8F3E1] shadow-md transition-transform group-hover:scale-105">
                    <span class="font-serif font-bold text-3xl text-[#41431B] tracking-tight">Dusun Gatak</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-10 auth-card rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
