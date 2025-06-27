<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Honkai Star Rail News</title>
    
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
    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-primary">Honkai Star Rail News</h1>
                <p class="mt-2 text-gray-600">Masuk ke akun admin</p>
            </div>
            
            <!-- Login Card -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-6" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition duration-300">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                            Ingat saya
                        </label>
                    </div>

                    <div class="flex flex-col space-y-4">
                        <button type="submit" class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-secondary transition duration-300">
                            Login
                        </button>
                        
                        <div class="flex justify-between">
                            <a href="{{ route('register') }}" class="text-sm text-primary hover:underline">
                                Belum punya akun? Daftar
                            </a>
                            <a href="{{ route('news.index') }}" class="text-sm text-gray-600 hover:underline">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="mt-4 text-center text-sm text-gray-500">
                <p>Gunakan admin@gmail.com / admin123 untuk login sebagai admin.</p>
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