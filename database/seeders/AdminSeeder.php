<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@fake.kz'],
            [
                'name' => 'Администратор',
                'email' => 'admin@fake.kz',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
