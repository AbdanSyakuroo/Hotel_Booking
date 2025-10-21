<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan - Imperium Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            scroll-behavior: smooth;
        }
        
        .amber-gradient {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23f59e0b' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.2);
        }
        
        .status-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }
        
        .table-row {
            transition: all 0.2s ease;
        }
        
        .table-row:hover {
            background-color: rgba(251, 191, 36, 0.05);
            transform: scale(1.01);
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
                <div class="flex items-center space-x-4">
                    <a href="{{ route('orders.create') }}" class="text-gray-600 hover:text-amber-600 transition-all">
                        <i class="fas fa-plus-circle text-2xl"></i>
                    </a>
                    <a href="/" class="text-gray-600 hover:text-amber-600 transition-all">
                        <i class="fas fa-home text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        <!-- Page Title -->
        <div class="mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-list-alt text-amber-600 mr-3"></i>
                        Daftar Pemesanan
                    </h2>
                    <p class="text-gray-600 mt-2">Kelola dan pantau semua pemesanan kamar hotel</p>
                </div>
                <a href="{{ route('orders.create') }}" class="amber-gradient text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:opacity-90 transition-all flex items-center space-x-2">
                    <i class="fas fa-plus-circle"></i>
                    <span>Pemesanan Baru</span>
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Total Pemesanan</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $orders->count() }}</p>
                    </div>
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-clipboard-list text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Check-in Hari Ini</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $orders->where('tanggal_pesan', now()->format('Y-m-d'))->count() }}</p>
                    </div>
                    <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-check text-green-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover border-l-4 border-amber-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Total Revenue</p>
                        <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($orders->sum('total_bayar'), 0, ',', '.') }}</p>
                    </div>
                    <div class="w-14 h-14 bg-amber-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-amber-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Rata-rata Durasi</p>
                        <p class="text-3xl font-bold text-gray-800">{{ number_format($orders->avg('durasi_menginap'), 1) }}</p>
                    </div>
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-moon text-purple-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="hidden lg:block bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="amber-gradient text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold">No</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Nama Pemesan</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Jenis Kelamin</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">No. Identitas</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Tipe Kamar</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Check-in</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Durasi</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Breakfast</th>
                            <th class="px-6 py-4 text-left text-sm font-bold">Total Bayar</th>
                            {{-- <th class="px-6 py-4 text-center text-sm font-bold">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($orders as $index => $order)
                        <tr class="table-row">
                            <td class="px-6 py-4 text-sm text-gray-700 font-semibold">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-amber-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">{{ $order->nama_pemesan }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if($order->jenis_kelamin == 'Laki-laki')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        <i class="fas fa-mars mr-1"></i> Laki-laki
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-pink-100 text-pink-800">
                                        <i class="fas fa-venus mr-1"></i> Perempuan
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 font-mono">{{ $order->nomor_identitas }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                    <i class="fas fa-bed mr-1"></i> {{ $order->room->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <i class="fas fa-calendar text-amber-600 mr-1"></i>
                                {{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <span class="font-semibold">{{ $order->durasi_menginap }}</span> hari
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($order->breakfast)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i> Ya
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                        <i class="fas fa-times-circle mr-1"></i> Tidak
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-amber-600">
                                Rp {{ number_format($order->total_bayar, 0, ',', '.') }}
                            </td>
                            {{-- <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg text-xs font-semibold transition-all">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg text-xs font-semibold transition-all">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-xs font-semibold transition-all">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 text-lg font-semibold">Belum ada data pemesanan</p>
                                    <p class="text-gray-400 text-sm mt-2">Klik tombol "Pemesanan Baru" untuk membuat pemesanan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile Card View -->
        <div class="lg:hidden space-y-4">
            @forelse($orders as $index => $order)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="amber-gradient px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <span class="text-amber-600 font-bold">{{ $index + 1 }}</span>
                        </div>
                        <div>
                            <p class="text-white font-bold text-lg">{{ $order->nama_pemesan }}</p>
                            <p class="text-amber-100 text-xs">{{ $order->nomor_identitas }}</p>
                        </div>
                    </div>
                    @if($order->jenis_kelamin == 'Laki-laki')
                        <i class="fas fa-mars text-white text-2xl"></i>
                    @else
                        <i class="fas fa-venus text-white text-2xl"></i>
                    @endif
                </div>
                
                <div class="p-4 space-y-3">
                    <div class="flex items-center justify-between pb-3 border-b">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-bed text-amber-600"></i>
                            <span class="text-sm font-semibold text-gray-700">Tipe Kamar</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">{{ $order->room->name ?? '-' }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between pb-3 border-b">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-calendar text-amber-600"></i>
                            <span class="text-sm font-semibold text-gray-700">Check-in</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d/m/Y') }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between pb-3 border-b">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-moon text-amber-600"></i>
                            <span class="text-sm font-semibold text-gray-700">Durasi</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">{{ $order->durasi_menginap }} hari</span>
                    </div>
                    
                    <div class="flex items-center justify-between pb-3 border-b">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-coffee text-amber-600"></i>
                            <span class="text-sm font-semibold text-gray-700">Breakfast</span>
                        </div>
                        @if($order->breakfast)
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                <i class="fas fa-check-circle mr-1"></i> Ya
                            </span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">
                                <i class="fas fa-times-circle mr-1"></i> Tidak
                            </span>
                        @endif
                    </div>
                    
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl p-4 border-2 border-amber-200">
                        <p class="text-xs text-gray-600 mb-1">Total Pembayaran</p>
                        <p class="text-2xl font-bold text-amber-600">Rp {{ number_format($order->total_bayar, 0, ',', '.') }}</p>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-2 pt-3">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold transition-all">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg text-sm font-semibold transition-all">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg text-sm font-semibold transition-all">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg font-semibold">Belum ada data pemesanan</p>
                <p class="text-gray-400 text-sm mt-2 mb-6">Klik tombol di bawah untuk membuat pemesanan baru</p>
                <a href="/order.create" class="inline-block amber-gradient text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:opacity-90 transition-all">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Buat Pemesanan
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination (if needed) -->
        @if($orders->hasPages())
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400">© 2024 Imperium Hotel. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>