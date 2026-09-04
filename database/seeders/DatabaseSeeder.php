<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@lubukmandiangajah.desa.id'],
            [
                'name' => 'Admin',
                'password' => Hash::make('LMG#Bunut_2026!Adm'),
                'email_verified_at' => now(),
            ]
        );

        $this->call(BeritaDesaSeeder::class);
        $this->call(AparaturDesaSeeder::class);
        $this->call(StatistikDesaSeeder::class);
    }
}
