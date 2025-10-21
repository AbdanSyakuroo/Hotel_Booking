<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Imperium Hotel - Experience luxury and elegance in the heart of the city">
    <meta name="keywords" content="hotel, luxury, jakarta, accommodation, suite">
    <title>Imperium Hotel - Luxury & Elegance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            scroll-behavior: smooth;
        }
        
        .hero-bg {
            background-image: url('Hotel.jpg');
            background-size: cover;
            background-position: center;
        }
        
        @media (min-width: 768px) {
            .hero-bg {
                background-attachment: fixed;
            }
        }
        
        .amber-gradient {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.15);
        }
        
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu.open {
            max-height: 400px;
        }
        
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        nav {
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .nav-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
        }
        
        .section-padding {
            padding: 4rem 1rem;
        }
        
        @media (min-width: 640px) {
            .section-padding {
                padding: 5rem 1.5rem;
            }
        }
        
        @media (min-width: 1024px) {
            .section-padding {
                padding: 6rem 2rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <div class="flex items-center">
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-amber-600 tracking-tight">
                        Imperium Hotel
                    </h1>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6 lg:space-x-10">
                    <a href="#home" class="text-sm lg:text-base font-medium text-gray-700 hover:text-amber-600 transition-colors duration-200">Beranda</a>
                    <a href="#about" class="text-sm lg:text-base font-medium text-gray-700 hover:text-amber-600 transition-colors duration-200">Tentang</a>
                    <a href="#rooms" class="text-sm lg:text-base font-medium text-gray-700 hover:text-amber-600 transition-colors duration-200">Kamar</a>
                    <a href="#facilities" class="text-sm lg:text-base font-medium text-gray-700 hover:text-amber-600 transition-colors duration-200">Fasilitas</a>
                    <a href="#contact" class="text-sm lg:text-base font-medium text-gray-700 hover:text-amber-600 transition-colors duration-200">Kontak</a>
                </div>
                
                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-bars text-xl text-gray-700"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-3 space-y-1">
                <a href="#home" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all">Beranda</a>
                <a href="#about" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all">Tentang</a>
                <a href="#rooms" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all">Kamar</a>
                <a href="#facilities" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all">Fasilitas</a>
                <a href="#contact" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-bg min-h-screen flex items-center justify-center text-white pt-16 md:pt-20">
        <div class="text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-4 sm:mb-6 tracking-tight drop-shadow-[0_0_2px_white]">
                Imperium Hotel
            </h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-8 sm:mb-10 font-light max-w-3xl mx-auto leading-relaxed">
                Experience Luxury and Elegance in the Heart of the City
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center max-w-lg mx-auto">
                <a href="{{ route('orders.create') }}" class="amber-gradient text-white px-8 py-3.5 rounded-lg text-base font-semibold hover:opacity-90 transition-all shadow-lg w-full sm:w-auto text-center">
                    <i class="fas fa-calendar-check mr-2"></i>Pesan Sekarang
                </a>
                <a href="{{ route('orders.index') }}" class="border-2 border-white text-white px-8 py-3.5 rounded-lg text-base font-semibold hover:bg-white hover:text-gray-800 transition-all w-full sm:w-auto">
                    Daftar Pesanan (Admin)
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding fade-in">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4 text-gray-800">Selamat Datang di Imperium Hotel</h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto px-4">
                    Dimana kemewahan bertemu kenyamanan, dan setiap momen dibuat dengan sempurna.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 px-4">
                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-star text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-semibold mb-3 text-gray-800">Pengalaman Mewah</h3>
                    <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                        Nikmati fasilitas premium dan layanan personal yang dirancang untuk wisatawan yang cerdas.
                    </p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-map-marker-alt text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-semibold mb-3 text-gray-800">Lokasi Prima</h3>
                    <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                        Terletak di pusat kota, dekat dengan atraksi utama dan distrik bisnis.
                    </p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-concierge-bell text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-semibold mb-3 text-gray-800">Layanan Terbaik</h3>
                    <p class="text-sm lg:text-base text-gray-600 leading-relaxed">
                        Staf dedicated kami memastikan masa menginap Anda tak terlupakan dengan layanan 24/7.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section id="rooms" class="section-padding bg-gradient-to-b from-gray-50 to-gray-100 fade-in">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 md:mb-16 px-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4 text-gray-800">Kamar & Suite</h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto">
                    Pilih dari seleksi kamar dan suite mewah kami yang telah dikurasi dengan cermat
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 px-4">
                <!-- Deluxe Room -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=600&h=400&fit=crop" alt="Deluxe Room" class="w-full h-56 sm:h-64 object-cover">
                        <span class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">Populer</span>
                    </div>
                    <div class="p-5 lg:p-6">
                        <div class="mb-4">
                            <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-1">Deluxe Room</h3>
                            <p class="text-amber-600 font-bold text-lg lg:text-xl">Rp 750.000<span class="text-sm font-normal text-gray-600">/malam</span></p>
                        </div>
                        <p class="text-sm lg:text-base text-gray-600 mb-5 leading-relaxed">Kamar elegan dengan pemandangan kota dan amenities modern.</p>
                        <ul class="space-y-2.5 mb-6">
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-wifi text-amber-600 mr-3 w-4"></i> Free WiFi High-Speed
                            </li>
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-snowflake text-amber-600 mr-3 w-4"></i> Air Conditioning
                            </li>
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-glass-martini text-amber-600 mr-3 w-4"></i> Mini Bar Premium
                            </li>
                        </ul>
                        <a href="{{ route('orders.create') }}" class="w-full amber-gradient text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-all shadow-md text-center block">
                            Pesan Kamar
                        </a>
                    </div>
                </div>

                <!-- Executive Suite -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&h=400&fit=crop" alt="Executive Suite" class="w-full h-56 sm:h-64 object-cover">
                        <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">Best Value</span>
                    </div>
                    <div class="p-5 lg:p-6">
                        <div class="mb-4">
                            <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-1">Executive Suite</h3>
                            <p class="text-amber-600 font-bold text-lg lg:text-xl">Rp 1.500.000<span class="text-sm font-normal text-gray-600">/malam</span></p>
                        </div>
                        <p class="text-sm lg:text-base text-gray-600 mb-5 leading-relaxed">Suite luas dengan living area terpisah dan amenities premium.</p>
                        <ul class="space-y-2.5 mb-6">
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-wifi text-amber-600 mr-3 w-4"></i> Free WiFi High-Speed
                            </li>
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-couch text-amber-600 mr-3 w-4"></i> Separate Living Room
                            </li>
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-hot-tub text-amber-600 mr-3 w-4"></i> Private Jacuzzi
                            </li>
                        </ul>
                        <a href="{{ route('orders.create') }}" class="w-full amber-gradient text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-all shadow-md text-center block">
                            Pesan Kamar
                        </a>
                    </div>
                </div>

                <!-- Luxury Suite -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover md:col-span-2 lg:col-span-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&h=400&fit=crop" alt="Presidential Suite" class="w-full h-56 sm:h-64 object-cover">
                        <span class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">Luxury</span>
                    </div>
                    <div class="p-5 lg:p-6">
                        <div class="mb-4">
                            <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-1">Luxury Suite</h3>
                            <p class="text-amber-600 font-bold text-lg lg:text-xl">Rp 3.000.000<span class="text-sm font-normal text-gray-600">/malam</span></p>
                        </div>
                        <p class="text-sm lg:text-base text-gray-600 mb-5 leading-relaxed">Suite mewah dengan pemandangan kota panorama dan layanan eksklusif.</p>
                        <ul class="space-y-2.5 mb-6">
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-user-tie text-amber-600 mr-3 w-4"></i> Private Butler Service
                            </li>
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-hot-tub text-amber-600 mr-3 w-4"></i> Luxury Jacuzzi
                            </li>
                            <li class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-city text-amber-600 mr-3 w-4"></i> Panoramic City View
                            </li>
                        </ul>
                        <a href="{{ route('orders.create') }}" class="w-full amber-gradient text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-all shadow-md text-center block">
                            Pesan Kamar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="section-padding fade-in">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 md:mb-16 px-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4 text-gray-800">Fasilitas Hotel</h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto">
                    Semua yang Anda butuhkan untuk masa menginap yang sempurna
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 px-4">
                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-wifi text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-semibold mb-2 text-gray-800">Free WiFi</h3>
                    <p class="text-sm lg:text-base text-gray-600">Internet cepat di seluruh area hotel</p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-parking text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-semibold mb-2 text-gray-800">Valet Parking</h3>
                    <p class="text-sm lg:text-base text-gray-600">Layanan parkir gratis 24 jam</p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-coffee text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-semibold mb-2 text-gray-800">Coffee Shop</h3>
                    <p class="text-sm lg:text-base text-gray-600">Kopi premium dan pastry segar</p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-utensils text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-semibold mb-2 text-gray-800">Restaurant</h3>
                    <p class="text-sm lg:text-base text-gray-600">Pengalaman fine dining eksklusif</p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-dumbbell text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-semibold mb-2 text-gray-800">Fitness Center</h3>
                    <p class="text-sm lg:text-base text-gray-600">Peralatan fitness modern terlengkap</p>
                </div>

                <div class="text-center p-6 lg:p-8 bg-white rounded-xl shadow-lg hover-lift">
                    <div class="w-16 h-16 lg:w-20 lg:h-20 amber-gradient rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-spa text-white text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-semibold mb-2 text-gray-800">Spa & Wellness</h3>
                    <p class="text-sm lg:text-base text-gray-600">Perawatan relaksasi dan massage</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding bg-gradient-to-b from-gray-100 to-gray-50 fade-in">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 md:mb-16 px-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4 text-gray-800">Hubungi Kami</h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami siap membuat masa menginap Anda tak terlupakan
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 px-4">
                <div class="space-y-6 lg:space-y-8">
                    <div class="flex items-start space-x-4 p-6 bg-white rounded-xl shadow-md">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 amber-gradient rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-lg lg:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg lg:text-xl mb-1">Alamat</h3>
                            <p class="text-sm lg:text-base text-gray-600 leading-relaxed">Jl. Luxury No. 123, Jakarta Pusat 12345</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-6 bg-white rounded-xl shadow-md">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 amber-gradient rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-white text-lg lg:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg lg:text-xl mb-1">Telepon</h3>
                            <p class="text-sm lg:text-base text-gray-600">+62 21 1234 5678</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-6 bg-white rounded-xl shadow-md">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 amber-gradient rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-white text-lg lg:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg lg:text-xl mb-1">Email</h3>
                            <p class="text-sm lg:text-base text-gray-600">info@imperiumhotel.com</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 lg:p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl lg:text-3xl font-semibold mb-6 text-gray-800">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input type="text" placeholder="Nama Anda" class="p-3 lg:p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm lg:text-base transition-all">
                            <input type="email" placeholder="Email Anda" class="p-3 lg:p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm lg:text-base transition-all">
                        </div>
                        <input type="text" placeholder="Subjek" class="w-full p-3 lg:p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm lg:text-base transition-all">
                        <textarea placeholder="Pesan Anda" rows="5" class="w-full p-3 lg:p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm lg:text-base resize-none transition-all"></textarea>
                        <button type="submit" class="w-full amber-gradient text-white py-3 lg:py-4 rounded-lg font-semibold hover:opacity-90 transition-all shadow-md text-sm lg:text-base">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-10">
                <div>
                    <h3 class="text-2xl lg:text-3xl font-bold mb-4 text-amber-500">Imperium Hotel</h3>
                    <p class="text-gray-400 text-sm lg:text-base leading-relaxed">
                        Experience luxury and elegance in the heart of the city.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-base lg:text-lg text-white">Quick Links</h4>
                    <ul class="space-y-2.5 text-gray-400">
                        <li><a href="#about" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Tentang Kami</a></li>
                        <li><a href="#rooms" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Kamar</a></li>
                        <li><a href="#facilities" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Fasilitas</a></li>
                        <li><a href="#contact" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Galeri</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-base lg:text-lg text-white">Layanan</h4>
                    <ul class="space-y-2.5 text-gray-400">
                        <li><a href="#" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Room Service</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Spa & Wellness</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Restaurant</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors text-sm lg:text-base">Events</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-base lg:text-lg text-white">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 lg:w-12 lg:h-12 amber-gradient rounded-full flex items-center justify-center hover:opacity-90 transition-all shadow-lg">
                            <i class="fab fa-facebook-f text-base lg:text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 lg:w-12 lg:h-12 amber-gradient rounded-full flex items-center justify-center hover:opacity-90 transition-all shadow-lg">
                            <i class="fab fa-instagram text-base lg:text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 lg:w-12 lg:h-12 amber-gradient rounded-full flex items-center justify-center hover:opacity-90 transition-all shadow-lg">
                            <i class="fab fa-twitter text-base lg:text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400 text-sm lg:text-base">© 2024 Imperium Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            const icon = this.querySelector('i');
            mobileMenu.classList.toggle('open');
            
            if (mobileMenu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu
                    if (mobileMenu.classList.contains('open')) {
                        mobileMenu.classList.remove('open');
                        mobileMenuButton.querySelector('i').classList.remove('fa-times');
                        mobileMenuButton.querySelector('i').classList.add('fa-bars');
                    }
                }
            });
        });

        // Form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const button = this.querySelector('button[type="submit"]');
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check mr-2"></i>Terkirim!';
                button.classList.add('opacity-90');
                
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.classList.remove('opacity-90');
                    this.reset();
                }, 2500);
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;
        const nav = document.querySelector('nav');
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                nav.classList.add('nav-scrolled', 'shadow-xl');
            } else {
                nav.classList.remove('nav-scrolled', 'shadow-xl');
            }
            
            lastScroll = currentScroll;
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(section => {
            observer.observe(section);
        });

        // Button interactions
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!this.closest('form') && !this.id) {
                    const ripple = document.createElement('span');
                    ripple.style.position = 'absolute';
                    ripple.style.borderRadius = '50%';
                    ripple.style.background = 'rgba(255,255,255,0.6)';
                    ripple.style.width = ripple.style.height = '20px';
                    ripple.style.left = e.offsetX + 'px';
                    ripple.style.top = e.offsetY + 'px';
                    ripple.style.transform = 'translate(-50%, -50%)';
                    ripple.style.animation = 'ripple 0.6s ease-out';
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                }
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: translate(-50%, -50%) scale(10);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>