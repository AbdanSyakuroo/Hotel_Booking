<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan - Imperium Hotel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            scroll-behavior: smooth;
        }
        
        .amber-gradient {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .input-focus:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
            outline: none;
        }
        
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23f59e0b' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .success-animation {
            animation: slideDown 0.5s ease-out;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .error-shake {
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        .card-shadow {
            box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50 hero-pattern min-h-screen">

<!-- Header -->
<header class="bg-white shadow-lg border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-amber-600 tracking-tight">Imperium Hotel</h1>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">Luxury & Elegance Experience</p>
            </div>
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="{{ route('orders.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-amber-600 transition-all transform hover:scale-110" title="Lihat Daftar Pemesanan">
                    <i class="fas fa-list-alt text-xl sm:text-2xl"></i>
                   
                </a>
                <a href="/" class="text-gray-600 hover:text-amber-600 transition-all transform hover:scale-110" title="Kembali ke Home">
                    <i class="fas fa-home text-xl sm:text-2xl"></i>
                </a>
            </div>
        </div>
    </div>
</header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        <!-- Success Message -->
        @if(session('success'))
        <div class="success-animation mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 rounded-xl shadow-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500 text-3xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-green-800 mb-1">Pemesanan Berhasil!</h3>
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-shadow">
            
            <!-- Form Header -->
            <div class="amber-gradient px-6 sm:px-10 py-8 sm:py-10">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-2xl flex items-center justify-center shadow-xl transform hover:rotate-6 transition-transform">
                        <i class="fas fa-bed text-amber-600 text-3xl sm:text-4xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white tracking-tight">Form Pemesanan Kamar</h2>
                        <p class="text-amber-100 text-sm sm:text-base mt-1">Lengkapi data pemesanan dengan benar</p>
                    </div>
                </div>
            </div>

            <!-- Form Body -->
            <form action="{{ route('orders.process') }}" method="POST" id="orderForm" class="p-6 sm:p-10">
                @csrf

                <div class="space-y-8">
                    
                    <!-- Section 1: Personal Information -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 sm:p-8 border-2 border-gray-200">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-user-circle text-amber-600 mr-3 text-2xl"></i>
                            Informasi Pribadi
                        </h3>
                        
                        <!-- Nama Lengkap -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400 text-lg"></i>
                                </div>
                                <input type="text" name="nama_pemesan" id="nama_pemesan" value="{{ old('nama_pemesan') }}" 
                                    class="input-focus w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-xl transition-all text-base"
                                    placeholder="Masukkan nama lengkap sesuai identitas">
                            </div>
                        </div>

                        <!-- Jenis Kelamin & Nomor Identitas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Jenis Kelamin <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-venus-mars text-gray-400 text-lg"></i>
                                    </div>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="input-focus w-full pl-12 pr-10 py-4 border-2 border-gray-300 rounded-xl transition-all appearance-none text-base">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Nomor Identitas (KTP/SIM) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-id-card text-gray-400 text-lg"></i>
                                    </div>
                                    <input type="text" name="nomor_identitas" id="nomor_identitas" value="{{ old('nomor_identitas') }}" 
                                        maxlength="16" 
                                        class="input-focus w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-xl transition-all text-base"
                                        placeholder="16 digit nomor identitas">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-xs text-gray-400" id="identity-counter">0/16</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Booking Details -->
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 sm:p-8 border-2 border-amber-200">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-calendar-check text-amber-600 mr-3 text-2xl"></i>
                            Detail Pemesanan
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tipe Kamar -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Tipe Kamar <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-bed text-gray-400 text-lg"></i>
                                    </div>
                                    <select name="room_id" id="room_id"
                                        class="input-focus w-full pl-12 pr-10 py-4 border-2 border-gray-300 rounded-xl transition-all appearance-none text-base bg-white">
                                        <option value="">-- Pilih Tipe Kamar --</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ old('room_id')==$room->id?'selected':'' }}>
                                                {{ $room->name }} - Rp {{ number_format($room->price, 0, ',', '.') }}/malam
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggal Check-in -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Tanggal Check-in <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-calendar text-gray-400 text-lg"></i>
                                    </div>
                                    <input type="date" name="tanggal_pesan" id="tanggal_pesan" value="{{ old('tanggal_pesan') }}"
                                        class="input-focus w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-xl transition-all text-base">
                                </div>
                            </div>

                            <!-- Durasi Menginap -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Durasi Menginap <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-moon text-gray-400 text-lg"></i>
                                    </div>
                                    <input type="number" name="durasi_menginap" id="durasi_menginap" value="{{ old('durasi_menginap') }}" 
                                        min="1" 
                                        class="input-focus w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-xl transition-all text-base"
                                        placeholder="Masukkan jumlah hari menginap">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Additional Services -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 sm:p-8 border-2 border-blue-200">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-concierge-bell text-amber-600 mr-3 text-2xl"></i>
                            Layanan Tambahan
                        </h3>
                        
                        <div class="bg-white border-2 border-amber-300 rounded-xl p-5 hover:border-amber-500 transition-all cursor-pointer">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox" name="breakfast" id="breakfast" value="1" {{ old('breakfast') ? 'checked' : '' }}
                                    class="w-6 h-6 text-amber-600 border-2 border-gray-300 rounded-lg focus:ring-amber-500 mt-1">
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <span class="text-base sm:text-lg font-bold text-gray-800">
                                            <i class="fas fa-coffee text-amber-600 mr-2"></i>Breakfast Package
                                        </span>
                                        <span class="text-amber-600 font-bold text-lg">+ Rp 80.000 / hari</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-2">
                                        Nikmati sarapan buffet premium dengan berbagai pilihan menu internasional dan lokal
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Total Payment Display -->
                    <div class="bg-gradient-to-br from-amber-100 via-orange-100 to-yellow-100 rounded-2xl p-8 border-4 border-amber-300 shadow-2xl">
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <div>
                                <p class="text-lg text-gray-700 mb-2 font-semibold">Total Pembayaran</p>
                                <p class="text-4xl sm:text-5xl lg:text-5xl font-bold text-amber-600">
                                    @if(session('totalBayar'))
                                        Rp {{ number_format(session('totalBayar'), 0, ',', '.') }}
                                    @else
                                        Rp 0
                                    @endif
                                </p>
                            </div>
                            <div class="text-right">
                                <i class="fas fa-wallet text-6xl text-amber-400 opacity-40"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button type="submit" name="action" value="hitung"
                            class="amber-gradient text-white py-4 sm:py-5 rounded-xl text-base sm:text-lg font-bold shadow-xl hover:shadow-2xl hover:opacity-90 transition-all transform hover:-translate-y-1 flex items-center justify-center space-x-2">
                            <i class="fas fa-calculator text-xl"></i>
                            <span>Hitung Total</span>
                        </button>
                        
                        <button type="submit" name="action" value="simpan"
                            class="bg-gradient-to-r from-green-600 to-green-700 text-white py-4 sm:py-5 rounded-xl text-base sm:text-lg font-bold shadow-xl hover:shadow-2xl hover:from-green-700 hover:to-green-800 transition-all transform hover:-translate-y-1 flex items-center justify-center space-x-2">
                            <i class="fas fa-check-circle text-xl"></i>
                            <span>Konfirmasi</span>
                        </button>
                        
                        <button type="submit" name="action" value="cancel"
                            class="bg-gradient-to-r from-gray-500 to-gray-600 text-white py-4 sm:py-5 rounded-xl text-base sm:text-lg font-bold shadow-xl hover:shadow-2xl hover:from-gray-600 hover:to-gray-700 transition-all transform hover:-translate-y-1 flex items-center justify-center space-x-2">
                            <i class="fas fa-times-circle text-xl"></i>
                            <span>Cancel</span>
                        </button>
                    </div>

                    <p class="text-center text-sm text-gray-500 mt-4">
                        <i class="fas fa-shield-alt mr-1 text-amber-600"></i>
                        Data Anda dijamin aman dan terenkripsi
                    </p>
                </div>
            </form>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-12">
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 amber-gradient rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-lock text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 text-lg mb-2">Pembayaran Aman</h4>
                    <p class="text-sm text-gray-600">Transaksi terenkripsi SSL</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 amber-gradient rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 text-lg mb-2">Support 24/7</h4>
                    <p class="text-sm text-gray-600">Siap membantu kapan saja</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2">
                <div class="text-center">
                    <div class="w-16 h-16 amber-gradient rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 text-lg mb-2">Best Price</h4>
                    <p class="text-sm text-gray-600">Harga terbaik terjamin</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400">© 2024 Imperium Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Counter untuk nomor identitas
        document.getElementById('nomor_identitas').addEventListener('input', function(e) {
            const counter = document.getElementById('identity-counter');
            counter.textContent = e.target.value.length + '/16';
            
            if(e.target.value.length === 16) {
                counter.classList.add('text-green-600', 'font-bold');
                counter.classList.remove('text-gray-400');
            } else {
                counter.classList.remove('text-green-600', 'font-bold');
                counter.classList.add('text-gray-400');
            }
        });

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_pesan').setAttribute('min', today);

        // Form validation
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            const action = e.submitter.value;
            
            // Skip validation for cancel
            if(action === 'cancel') {
                return true;
            }

            let errors = [];
            
            // Validasi Nama
            const nama = document.getElementById('nama_pemesan').value.trim();
            if(!nama) {
                errors.push('Nama lengkap harus diisi');
                document.getElementById('nama_pemesan').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('nama_pemesan').classList.remove('error-shake');
                }, 500);
            }
            
            // Validasi Jenis Kelamin
            const jenisKelamin = document.getElementById('jenis_kelamin').value;
            if(!jenisKelamin) {
                errors.push('Jenis kelamin harus dipilih');
                document.getElementById('jenis_kelamin').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('jenis_kelamin').classList.remove('error-shake');
                }, 500);
            }
            
            // Validasi Nomor Identitas
            const nomorIdentitas = document.getElementById('nomor_identitas').value.trim();
            if(!nomorIdentitas) {
                errors.push('Nomor identitas harus diisi');
                document.getElementById('nomor_identitas').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('nomor_identitas').classList.remove('error-shake');
                }, 500);
            } else if(nomorIdentitas.length !== 16) {
                errors.push('Nomor identitas harus 16 digit lengkap');
                document.getElementById('nomor_identitas').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('nomor_identitas').classList.remove('error-shake');
                }, 500);
            }
            
            // Validasi Tipe Kamar
            const roomId = document.getElementById('room_id').value;
            if(!roomId) {
                errors.push('Tipe kamar harus dipilih');
                document.getElementById('room_id').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('room_id').classList.remove('error-shake');
                }, 500);
            }
            
            // Validasi Tanggal
            const tanggal = document.getElementById('tanggal_pesan').value;
            if(!tanggal) {
                errors.push('Tanggal check-in harus diisi');
                document.getElementById('tanggal_pesan').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('tanggal_pesan').classList.remove('error-shake');
                }, 500);
            }
            
            // Validasi Durasi
            const durasi = document.getElementById('durasi_menginap').value;
            if(!durasi || durasi < 1) {
                errors.push('Durasi menginap harus diisi minimal 1 hari');
                document.getElementById('durasi_menginap').classList.add('border-red-500', 'error-shake');
                setTimeout(() => {
                    document.getElementById('durasi_menginap').classList.remove('error-shake');
                }, 500);
            }
            
            // Tampilkan error jika ada
            if(errors.length > 0) {
                e.preventDefault();
                alert('Mohon lengkapi data berikut:\n\n' + errors.map((err, i) => (i+1) + '. ' + err).join('\n'));
                return false;
            }
            
            return true;
        });

        // Remove red border on input
        const inputs = document.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.classList.remove('border-red-500');
            });
        });
    </script>
</body>
</html>