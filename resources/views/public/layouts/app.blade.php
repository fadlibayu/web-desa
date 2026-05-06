<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dusun Gatak - @yield('title', 'Beranda')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #F8F3E1; /* Off-white / warm background */
            color: #41431B; 
            -webkit-font-smoothing: antialiased;
        }
        
        h1, h2, h3, h4, h5, h6, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .navbar {
            /* Managed by Alpine and utility classes */
        }

        .btn-primary {
            background-color: #41431B; /* Forest Green */
            color: white;
            border-radius: 999px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #41431B;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(47, 133, 90, 0.2);
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 1px solid rgba(248, 243, 225, 0.5);
            border-radius: 999px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: white;
            color: #41431B;
            transform: translateY(-2px);
        }

        .nature-card {
            background: #F8F3E1;
            border-radius: 8px;
            border: 1px solid #E3DBBB;
            border-top: 4px solid #41431B;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .nature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="flex flex-col min-h-screen selection:bg-[#E3DBBB] selection:text-[#41431B]">
    
    <!-- Navbar -->
    <nav x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{ 'bg-[#F8F3E1] shadow-md': scrolled, 'bg-transparent border-b border-[#F8F3E1]/10': !scrolled }"
         class="fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24 transition-all duration-300" :class="{ 'h-20': scrolled }">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <img src="{{ asset('logo-dusun.png') }}" alt="Logo Dusun Gatak" class="h-10 w-10 rounded-full bg-[#F8F3E1] shadow-sm transition-transform group-hover:scale-105">
                        <span :class="{ 'text-[#41431B] drop-shadow-none': scrolled, 'text-[#F8F3E1] drop-shadow-md': !scrolled }" class="font-serif font-bold text-2xl tracking-tight transition-colors">Dusun Gatak</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8 text-[15px] font-medium transition-colors">
                    <a href="{{ route('home') }}" :class="{ 'text-[#41431B] hover:text-[#AEB784] drop-shadow-none': scrolled, 'text-[#F8F3E1] hover:text-[#E3DBBB] drop-shadow-md': !scrolled }" class="transition-colors">Beranda</a>
                    <a href="{{ route('profil') }}" :class="{ 'text-[#41431B] hover:text-[#AEB784] drop-shadow-none': scrolled, 'text-[#F8F3E1] hover:text-[#E3DBBB] drop-shadow-md': !scrolled }" class="transition-colors">Profil Dusun</a>
                    <a href="{{ route('album') }}" :class="{ 'text-[#41431B] hover:text-[#AEB784] drop-shadow-none': scrolled, 'text-[#F8F3E1] hover:text-[#E3DBBB] drop-shadow-md': !scrolled }" class="transition-colors">Album</a>
                    <a href="{{ route('berita') }}" :class="{ 'text-[#41431B] hover:text-[#AEB784] drop-shadow-none': scrolled, 'text-[#F8F3E1] hover:text-[#E3DBBB] drop-shadow-md': !scrolled }" class="transition-colors">Berita</a>
                    <a href="{{ route('infografis') }}" :class="{ 'text-[#41431B] hover:text-[#AEB784] drop-shadow-none': scrolled, 'text-[#F8F3E1] hover:text-[#E3DBBB] drop-shadow-md': !scrolled }" class="transition-colors">Infografis</a>
                    <a href="{{ route('login') }}" :class="{ 'border-[#41431B] text-[#41431B] hover:bg-[#41431B] hover:text-[#F8F3E1]': scrolled, 'border-[#F8F3E1]/50 text-[#F8F3E1] hover:bg-[#F8F3E1] hover:text-black': !scrolled }" class="px-5 py-2 border rounded-full transition-all">Masuk Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#41431B] text-[#F8F3E1] pt-16 pb-8 mt-auto border-t-[8px] border-[#AEB784]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-[#41431B] pb-12">
                <div class="md:col-span-2">
                    <h3 class="font-serif text-3xl font-bold mb-4 flex items-center gap-3">Dusun Gatak</h3>
                    <p class="text-[#E3DBBB] text-sm leading-relaxed max-w-md">Melestarikan tradisi, menjaga harmoni alam, dan terus berinovasi untuk kesejahteraan masyarakat bersama.</p>
                </div>
                <div>
                    <h3 class="font-serif text-lg font-bold mb-5 text-[#E3DBBB]">Navigasi</h3>
                    <ul class="space-y-3 text-[#E3DBBB] text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-[#F8F3E1] hover:underline transition">Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="hover:text-[#F8F3E1] hover:underline transition">Profil Dusun</a></li>
                        <li><a href="{{ route('album') }}" class="hover:text-[#F8F3E1] hover:underline transition">Album Kegiatan</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-[#F8F3E1] hover:underline transition">Berita Dusun</a></li>
                        <li><a href="{{ route('infografis') }}" class="hover:text-[#F8F3E1] hover:underline transition">Infografis & Statistik</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-serif text-lg font-bold mb-5 text-[#E3DBBB]">Kontak</h3>
                    <p class="text-[#E3DBBB] text-sm mb-2"><b>Kantor Kepala Dusun Gatak</b></p>
                    <p class="text-[#E3DBBB] text-sm mb-2 leading-relaxed">Jl. Gatak, Cancangan, Wukirsari, Kec. Cangkringan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55583</p>
                    <p class="text-[#E3DBBB] text-sm flex items-center gap-2 mt-4">
                        <svg class="w-4 h-4 text-[#AEB784]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        info@gatak.desa.id
                    </p>
                </div>
            </div>
            <div class="pt-8 text-sm text-[#AEB784] flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} Pemerintah Dusun Gatak. Seluruh hak cipta dilindungi.</p>
                <div class="mt-4 md:mt-0 flex gap-6">
                    <a href="#" class="hover:text-[#F8F3E1] transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-[#F8F3E1] transition">Ketentuan Layanan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Visitor Indicator -->
    <div class="fixed bottom-6 left-6 z-40">
        <div class="bg-[#F8F3E1]/90 backdrop-blur border border-[#AEB784] shadow-lg rounded-full px-4 py-2 flex items-center gap-3 transition-transform hover:scale-105">
            <div class="w-8 h-8 rounded-full bg-[#41431B] text-[#F8F3E1] flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-[#AEB784] uppercase tracking-wider leading-none mb-1">Kunjungan Hari Ini</p>
                <p class="text-sm font-bold text-[#41431B] leading-none">{{ isset($visitor_today) ? number_format($visitor_today) : 0 }} Pengunjung</p>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
