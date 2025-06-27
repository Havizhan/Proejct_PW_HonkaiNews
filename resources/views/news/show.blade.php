<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->judul }} - Honkai Star Rail News</title>
    
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
<body class="bg-light text-dark min-h-screen font-sans flex flex-col">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="container mx-auto px-8 sm:px-12 lg:px-16 py-6 sm:py-10 flex-grow">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('news.index') }}" class="inline-flex items-center text-primary hover:text-secondary transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Berita
                </a>
            </div>
            
            <!-- News Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Featured Image -->
                @if($news->gambar)
                    <div class="relative">
                        <img src="{{ asset($news->gambar) }}" 
                             alt="{{ $news->judul }}" 
                             class="w-full h-64 sm:h-96 object-cover">
                    </div>
                @endif
                
                <!-- Content -->
                <div class="p-6 sm:p-8">
                    <!-- Title -->
                    <h1 class="text-2xl sm:text-3xl font-bold text-primary mb-6">
                        {{ $news->judul }}
                    </h1>
                    
                    <!-- Meta Info -->
                    <div class="flex items-center text-gray-500 mb-6">
                        <span class="mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $news->created_at->format('d M Y') }}
                        </span>
                    </div>
                    
                    <!-- Hashtags -->
                    @if($news->hashtag)
                        <div class="mb-6 flex flex-wrap gap-2">
                            @foreach(explode(' ', $news->hashtag) as $tag)
                                @if(trim($tag) !== '')
                                    <span class="inline-block bg-primary bg-opacity-10 text-primary px-3 py-1.5 rounded-full text-sm">
                                        {{ $tag }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    
                    <!-- Content -->
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($news->deskripsi)) !!}
                    </div>
                    
                    <!-- Admin Actions -->
                    @auth
                        <div class="mt-8 pt-6 border-t border-gray-100 flex space-x-4">
                            <a href="{{ route('news.edit', $news->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Berita
                            </a>
                            
                            <form action="{{ route('news.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @endauth
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
                    Sebagai sahabat setia para pemain Honkai Star Rail, kami selalu menyediakan konten yang akurat, cepat, dan terpercaya. Kami juga memiliki tim yang terus memantau perkembangan game untuk memastikan semua berita yang kami sajikan adalah yang terbaru dan paling relevan.
                </p>
                <div class="flex flex-wrap gap-4 mt-6">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center text-white bg-primary px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Berita Lainnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 sm:py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm sm:text-base">
            <p>&copy; {{ date('Y') }} Honkai Star Rail News by Havizhanrhaiya.</p>
        </div>
    </footer>
</body>
</html> 