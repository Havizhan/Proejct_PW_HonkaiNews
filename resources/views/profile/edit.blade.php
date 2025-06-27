<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Honkai Star Rail News</title>
    
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
            <h1 class="text-2xl font-bold text-primary mb-6">Edit Profil</h1>
            
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow p-6 mb-8">
                <div class="flex items-center mb-6">
                    <div class="bg-primary rounded-full w-16 h-16 flex items-center justify-center text-white text-xl font-bold">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                        <p class="text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input id="name" 
                               type="text" 
                               name="name" 
                               value="{{ old('name', $user->name) }}" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                        
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                        
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('profile.password') }}" class="text-primary hover:underline">
                            Ganti Password
                        </a>
                        
                        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition duration-300">
                            Simpan Perubahan
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