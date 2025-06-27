<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Honkai Star Rail News</title>
    
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
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10 flex-grow">
        <div class="max-w-2xl mx-auto">
            <div class="flex items-center mb-6 sm:mb-8">
                <a href="{{ route('news.index') }}" class="text-primary hover:text-secondary transition duration-300 mr-4">
                    ←
                </a>
                <h1 class="text-2xl sm:text-3xl font-bold text-primary">Tambah Berita Baru</h1>
            </div>

            <!-- Show errors if any -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Form -->
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-md p-6 sm:p-8">
                @csrf
                <div class="space-y-6">
                    <!-- Form Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                        <input type="text" 
                               id="judul" 
                               name="judul" 
                               value="{{ old('judul') }}" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                    </div>

                    <!-- Form Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea id="deskripsi" 
                                  name="deskripsi" 
                                  rows="6" 
                                  required 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300"
                                  style="white-space: pre-wrap;">{{ old('deskripsi') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">Deskripsi berita yang akan ditampilkan</p>
                    </div>

                    <!-- Form Hashtag -->
                    <div>
                        <label for="hashtag" class="block text-sm font-medium text-gray-700 mb-2">Hashtag</label>
                        <input type="text" 
                               id="hashtag" 
                               name="hashtag" 
                               value="{{ old('hashtag') }}" 
                               placeholder="Contoh: #HonkaiStarRail #News #Update"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                        <p class="mt-1 text-sm text-gray-500">Pisahkan hashtag dengan spasi, contoh: #HonkaiStarRail #News #Update</p>
                    </div>

                    <!-- Form Gambar dengan Preview -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                        <input type="file" 
                               id="gambar" 
                               name="gambar" 
                               accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300"
                               onchange="previewImage(this)">
                        <p class="mt-1 text-sm text-gray-500">Format yang didukung: JPG, JPEG, PNG, GIF</p>
                        
                        <!-- Preview Gambar -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
                            <img id="preview" class="max-w-full h-auto max-h-64 rounded-lg border border-gray-300" src="" alt="Preview Gambar">
                        </div>
                    </div>

                    <!-- Tombol Submit dan Kembali -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" 
                                class="bg-primary text-white px-6 py-2 rounded-full hover:bg-secondary transition duration-300 shadow-md hover:shadow-lg w-full sm:w-auto text-center">
                            Simpan Berita
                        </button>
                        <a href="{{ route('news.index') }}" 
                           class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300 transition duration-300 shadow-md hover:shadow-lg w-full sm:w-auto text-center">
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 sm:py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm sm:text-base">
            <p>&copy; {{ date('Y') }} Honkai Star Rail News by Havizhanrhaiya.</p>
        </div>
    </footer>

    <!-- JavaScript untuk Preview Gambar -->
    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
