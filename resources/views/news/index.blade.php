<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honkai Star Rail News</title>
    
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
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <h1 class="text-2xl sm:text-3xl font-bold text-primary">Daftar Berita</h1>
            
            @auth
                <a href="{{ route('dashboard') }}" class="bg-primary text-white px-4 py-2 rounded-full hover:bg-secondary transition duration-300">
                    Dashboard Admin
                </a>
            @endauth
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(count($news) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($news as $item)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-gray-200 transform hover:-translate-y-1 cursor-pointer">
                        <a href="{{ route('news.show', $item->id) }}" class="block">
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover hover:opacity-90 transition duration-300">
                            @endif

                            <div class="p-6">
                                <h2 class="text-xl font-bold mb-3 text-primary hover:text-secondary transition duration-300 line-clamp-2">
                                    {{ $item->judul }}
                                </h2>

                                <p class="text-gray-700 mb-4 line-clamp-3">
                                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}
                                </p>

                                @if($item->hashtag)
                                    <div class="mb-4 flex flex-wrap gap-2">
                                        @foreach(explode(' ', $item->hashtag) as $tag)
                                            @if(trim($tag) !== '')
                                                <span class="inline-block bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-full text-sm">
                                                    {{ $tag }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="flex justify-between items-center px-6 pb-6 pt-0 border-t border-gray-100">
                            <div class="text-sm text-gray-500">
                                {{ $item->created_at->format('d M Y') }}
                            </div>
                            
                            <div class="flex space-x-3">
                                <a href="{{ route('news.show', $item->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                
                                @auth
                                    <a href="{{ route('news.edit', $item->id) }}" class="text-indigo-500 hover:text-secondary transition duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <p class="text-xl text-gray-600">Belum ada berita yang tersedia.</p>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-block mt-4 text-primary hover:text-secondary transition duration-300">
                        Kembali ke Dashboard
                    </a>
                @endauth
            </div>
        @endif
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
                    <a href="#" class="inline-flex items-center text-white bg-primary px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
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
    <footer class="bg-dark text-white py-4 sm:py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm sm:text-base">
            <p>&copy; {{ date('Y') }} Honkai Star Rail News by Havizhanrhaiya.</p>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Make news card clickable but preserve the action buttons
        const newsCards = document.querySelectorAll('.news-card-link');
        newsCards.forEach(card => {
            card.addEventListener('click', function(e) {
                const target = e.target;
                // Don't trigger if clicking on buttons or links
                if (!target.closest('button') && !target.closest('a') && !target.closest('form')) {
                    window.location.href = this.getAttribute('data-href');
                }
            });
        });
    });
    </script>
</body>
</html>
