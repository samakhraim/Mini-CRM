<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin admin',
             'email' => 'admin@admin.com',
             'password'=>'password'
    ]);
   $this->call(CompanySeeder::class);
    $this->call(EmployeeSeeder::class); 

    }
}
