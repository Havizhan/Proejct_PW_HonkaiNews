<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Honkai Star Rail News</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#4F46E5",
                        secondary: "#3730A3",
                        accent: "#F59E0B",
                        dark: "#1F2937",
                        light: "#F3F4F6",
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-light min-h-screen flex flex-col">
    
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="container mx-auto px-8 sm:px-12 lg:px-16 py-8 flex-grow">
        <h1 class="text-3xl font-bold text-primary mb-6">Dashboard Admin</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-primary">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Total Berita</p>
                        <h3 class="text-2xl font-bold">{{ \App\Models\News::count() }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-accent">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Akun Admin</p>
                        <h3 class="text-2xl font-bold">{{ \App\Models\User::count() }}</h3>
                    </div>
                    <div class="bg-accent bg-opacity-10 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Hari Ini</p>
                        <h3 class="text-2xl font-bold">{{ date('d M Y') }}</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Manajemen Berita Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-6 text-white">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold">Manajemen Berita</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <p class="mt-2 opacity-80">Kelola berita website Honkai Star Rail</p>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('news.create') }}" class="inline-flex items-center px-4 py-2 bg-accent text-white rounded-lg hover:bg-amber-500 transition duration-300 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Berita Baru
                        </a>
                        <a href="{{ route('news.index') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition duration-300 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Lihat Semua Berita
                        </a>
                    </div>
                    
                    <!-- Recent News -->
                    <div class="mt-6">
                        <h4 class="text-lg font-medium text-gray-700 mb-4">Berita Terbaru</h4>
                        @if(\App\Models\News::count() > 0)
                            <div class="space-y-3">
                                @foreach(\App\Models\News::latest()->take(3)->get() as $item)
                                    <a href="{{ route('news.show', $item->id) }}" class="flex items-start space-x-3 p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition duration-300">
                                        @if($item->gambar)
                                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="w-12 h-12 object-cover rounded">
                                        @else
                                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="flex-grow">
                                            <h5 class="font-medium line-clamp-1">{{ $item->judul }}</h5>
                                            <p class="text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('news.show', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('news.edit', $item->id) }}" class="text-indigo-500 hover:text-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-sm">Belum ada berita yang ditambahkan.</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Panduan Penggunaan -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-accent to-amber-500 p-6 text-white">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold">Panduan Penggunaan</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="mt-2 opacity-80">Langkah-langkah menggunakan aplikasi</p>
                </div>
                <div class="p-6">
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <div class="bg-accent bg-opacity-10 p-2 rounded-full">
                                <span class="font-bold text-accent">1</span>
                            </div>
                            <div>
                                <h5 class="font-medium text-gray-800">Tambah Berita</h5>
                                <p class="text-sm text-gray-500">Buat berita baru dengan mengklik tombol 'Tambah Berita Baru'</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div class="bg-accent bg-opacity-10 p-2 rounded-full">
                                <span class="font-bold text-accent">2</span>
                            </div>
                            <div>
                                <h5 class="font-medium text-gray-800">Edit Berita</h5>
                                <p class="text-sm text-gray-500">Ubah konten berita dengan mengklik ikon edit pada berita</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div class="bg-accent bg-opacity-10 p-2 rounded-full">
                                <span class="font-bold text-accent">3</span>
                            </div>
                            <div>
                                <h5 class="font-medium text-gray-800">Hapus Berita</h5>
                                <p class="text-sm text-gray-500">Hapus berita dengan mengklik ikon hapus pada berita</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section class="bg-indigo-50 dark:bg-indigo-900 py-12 border-t border-indigo-100 dark:border-indigo-800">
        <div class="container-fluid px-4 sm:px-6">
            <div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-primary mb-4">Tentang Honkai Star Rail News</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    Honkai Star Rail News adalah portal berita terdepan yang menyediakan informasi terbaru dan terlengkap dari dunia game Honkai Star Rail. Kami berdedikasi untuk menyajikan berita terupdate, tips & trik, panduan karakter, strategi pertarungan, dan info event terbaru untuk para Trailblazer.
                </p>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    Sebagai admin, Anda bertanggung jawab untuk memastikan konten berita selalu terupdate dan berkualitas tinggi untuk para penggemar Honkai Star Rail.
                </p>
                <div class="flex flex-wrap gap-4 mt-6">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center text-white bg-primary px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Update Terbaru
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Honkai Star Rail News by Havizhanrhaiya.</p>
        </div>
    </footer>
</body>
</html> 