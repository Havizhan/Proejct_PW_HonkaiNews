<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user admin yang ada jika ada
        DB::table('users')->where('email', 'admin@gmail.com')->delete();

        // Buat user admin baru
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('admin123'),
        ]);
    }
}
