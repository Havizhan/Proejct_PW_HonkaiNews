# Honkai Star Rail News - Laravel Application

Aplikasi berita sederhana tentang game Honkai Star Rail dengan fitur CRUD, autentikasi admin dan user, menggunakan framework Laravel.

## Fitur

- Autentikasi (Admin dan User)
  - Login
  - Register
- CRUD Berita (Create, Read, Update, Delete)
- Upload Gambar
- Tampilan Responsif menggunakan Tailwind CSS
- Dashboard Admin untuk mengelola berita

## Implementasi Tugas

### Tugas 8 - Laravel 1 (MVC) Routes
- **Model**: `App\Models\News.php`, `App\Models\User.php`
- **View**: Halaman pada `resources/views/` termasuk news dan auth
- **Controller**: `App\Http\Controllers\NewsController.php`, `App\Http\Controllers\Auth\*`
- **Routes**: `routes/web.php` (web routes dengan middleware auth)

### Tugas 9 - Migration, Seeder & Factory, dan Authentication
- **Migration**: Database schema dibuat menggunakan migration Laravel
- **Seeder**: Pembuatan data awal menggunakan database seeder
- **Factory**: Pembuatan data dummy menggunakan factory
- **Authentication**: Laravel UI dengan fitur login dan register

### Tugas 10 - CRUD
- **Create**: Tambah berita baru pada `/news/create`
- **Read**: Tampilkan daftar berita pada `/news` dan detail pada `/news/{id}`
- **Update**: Edit berita pada `/news/{id}/edit`
- **Delete**: Hapus berita menggunakan method DELETE

## Persyaratan

- PHP 8.0 atau lebih baru
- Composer
- MySQL atau Database lain yang didukung Laravel
- Node.js dan NPM (opsional, untuk pengembangan front-end)

## Cara Instalasi

### Metode 1: Menggunakan Script Setup (Windows)

1. Jalankan `setup_laravel.bat` pada folder root proyek.
2. Tunggu proses sampai selesai.
3. Akses aplikasi melalui browser di `http://127.0.0.1:8000`.

### Metode 2: Instalasi Manual

1. Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=honkai_news
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. Install dependensi menggunakan Composer:
   ```
   composer install
   ```

3. Generate application key:
   ```
   php artisan key:generate
   ```

4. Jalankan migrasi dan seeder:
   ```
   php artisan migrate:fresh --seed
   ```

5. Buat link untuk storage:
   ```
   php artisan storage:link
   ```

6. Jalankan server pengembangan:
   ```
   php artisan serve
   ```

7. Akses aplikasi melalui browser di `http://127.0.0.1:8000`.

## Akun Demo

### Admin
- Email: admin@gmail.com
- Password: admin123

### User
- Anda dapat mendaftar sebagai user baru melalui halaman Register

## Struktur MVC

- **Model**: 
  - `App\Models\News.php` - Model untuk data berita
  - `App\Models\User.php` - Model untuk data pengguna

- **View**: Terletak di `resources/views/`
  - `news/index.blade.php` - Tampilan daftar berita
  - `news/show.blade.php` - Tampilan detail berita
  - `news/create.blade.php` - Form tambah berita
  - `news/edit.blade.php` - Form edit berita
  - `auth/login.blade.php` - Halaman login
  - `auth/register.blade.php` - Halaman pendaftaran

- **Controller**: 
  - `App\Http\Controllers\NewsController.php` - Controller berita
  - `App\Http\Controllers\Auth\*` - Controller autentikasi

- **Routes**: `routes/web.php` - Definisi rute web

## Dibuat Oleh

Havizhanrhaiya (@havizhanrhaiya)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
