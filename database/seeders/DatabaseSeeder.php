<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'Taufik',
            'email' => 'taufik@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 'admin',

        ]);
        User::create([
            'name' => 'master',
            'email' => 'master@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 'admin',

        ]);

        User::create([
            'name' => 'Yunus',
            'email' => 'yunus@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 'admin',

        ]);
        Setting::create([
            'key' => 'biaya_pendaftaran',
            'value' => '1500000',
        ]);
        Setting::create([
            'key' => 'nama_rekening',
            'value' => '1500000',
        ]);
        Setting::create([
            'key' => 'nomor_rekening',
            'value' => '1500000',
        ]);
        Setting::create([
            'key' => 'provider_rekening',
            'value' => '1500000',
        ]);
        Setting::create([
            'key' => 'alamat_kampus',
            'value' => '1500000',
        ]);
        Setting::create([
            'key' => 'status_web',
            'value' => 'buka',
        ]);
        Setting::create([
            'key' => 'TELEGRAM',
            'value' => 'buka',
        ]);
    }
}
