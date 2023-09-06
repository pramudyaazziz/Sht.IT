<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@pramarda.my.id',
            'password' => bcrypt('guest&&guest&&guest')
        ]);
    }
}
