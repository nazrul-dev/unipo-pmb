<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
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
