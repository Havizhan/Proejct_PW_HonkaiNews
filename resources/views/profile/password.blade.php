<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password - Honkai Star Rail News</title>
    
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
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold text-primary mb-6">Ganti Password</h1>
            
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow p-6 mb-8">
                <form method="POST" action="{{ route('profile.password.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div class="mb-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                        <input id="current_password" 
                               type="password" 
                               name="current_password" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                        
                        @error('current_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                        
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('profile.edit') }}" class="text-primary hover:underline">
                            Kembali ke Profil
                        </a>
                        
                        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition duration-300">
                            Simpan Password Baru
                        </button>
                    </div>
                </form>
            </div>

            <div class="text-center">
                <a href="{{ route('news.index') }}" class="text-primary hover:underline">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container mx-auto px-4 text-center text-sm">
            <p>&copy; {{ date('Y') }} Honkai Star Rail News by Havizhanrhaiya.</p>
        </div>
    </footer>
</body>
</html> 