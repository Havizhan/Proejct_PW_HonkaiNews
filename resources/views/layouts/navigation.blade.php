@php
use Illuminate\Support\Facades\Auth;
@endphp

<nav class="bg-gradient-to-r from-primary to-secondary text-white py-4 shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
            <!-- Judul Website -->
            <a href="{{ route('news.index') }}" class="text-xl sm:text-2xl font-bold hover:text-accent transition duration-300 text-center sm:text-left">
                Honkai Star Rail News
            </a>
            
            <!-- Menu Navigasi -->
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('news.index') }}" class="hover:text-accent transition duration-300">Beranda</a>
                
                <!-- Menu untuk user yang sudah login -->
                @auth
                    @if(Auth::user()->is_admin ?? false)
                        <a href="{{ route('dashboard') }}" class="hover:text-accent transition duration-300">Dashboard</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="hover:text-accent transition duration-300">Profil</a>
                    
                    <div class="ml-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-accent transition duration-300">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Menu untuk user yang belum login -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="hover:text-accent transition duration-300">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="hover:text-accent transition duration-300 border border-white px-4 py-1.5 rounded-full">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav> 