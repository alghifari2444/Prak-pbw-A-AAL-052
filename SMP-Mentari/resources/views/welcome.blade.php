<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Mentari</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
    <!-- Header / Navbar -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold">SMP Mentari</h1>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="font-semibold hover:underline">Dashboard Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold hover:underline">Login Admin</a>
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- Section Kegiatan Sekolah -->
        <section class="mb-12">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Kegiatan Sekolah</h2>
            
            @if($kegiatans->isEmpty())
                <p class="text-gray-500 italic">Belum ada kegiatan yang ditampilkan.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($kegiatans as $kegiatan)
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold text-blue-600 mb-2">{{ $kegiatan->judul }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $kegiatan->deskripsi }}</p>
                            <span class="text-xs text-gray-400">{{ $kegiatan->created_at->format('d M Y') }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $kegiatans->links() }}
                </div>
            @endif
        </section>

        <!-- Section Buku Tamu / Form Pesan -->
        <section class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Buku Tamu / Hubungi Kami</h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('pesan-tamu.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea name="pesan" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                    Kirim Pesan
                </button>
            </form>
        </section>

    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-12 text-sm">
        &copy; {{ date('Y') }} SMP Mentari. All Rights Reserved.
    </footer>
</body>
</html>