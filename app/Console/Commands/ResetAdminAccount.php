<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ResetAdminAccount extends Command
{
    protected $signature = 'admin:reset';
    protected $description = 'Reset admin account (admin@gmail.com) with password admin123';

    public function handle()
    {
        $this->info('Resetting admin account...');
        
        // Jalankan seeder AdminUserSeeder
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\AdminUserSeeder',
        ]);
        
        $this->info('Admin account has been reset!');
        $this->info('Email: admin@gmail.com');
        $this->info('Password: admin123');
        
        return Command::SUCCESS;
    }
} 