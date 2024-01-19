<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Apple',
                'email' => 'info@apple.com',
                'logo' => 'logos/apple_logo.jpg',
                'website' => 'https://www.apple.com',
            ],
            [
                'name' => 'Google',
                'email' => 'info@google.com',
                'logo' => 'logos/google_logo.jpg',
                'website' => 'https://www.google.com',
            ],
            [
                'name' => 'Microsoft',
                'email' => 'info@microsoft.com',
                'logo' => 'logos/microsoft_logo.jpg',
                'website' => 'https://www.microsoft.com',
            ],
            [
                'name' => 'Coca-Cola',
                'email' => 'info@coca-cola.com',
                'logo' => 'logos/cocacola_logo.jpg',
                'website' => 'https://www.coca-cola.com',
            ],
            [
                'name' => 'Amazon',
                'email' => 'info@amazon.com',
                'logo' => 'logos/amazon_logo.jpg',
                'website' => 'https://www.amazon.com',
            ],
            [
                'name' => 'Facebook',
                'email' => 'info@facebook.com',
                'logo' => 'logos/facebook_logo.jpg',
                'website' => 'https://www.facebook.com',
            ],
            [
                'name' => 'IBM',
                'email' => 'info@ibm.com',
                'logo' => 'logos/ibm_logo.jpg',
                'website' => 'https://www.ibm.com',
            ],
            [
                'name' => 'GE',
                'email' => 'info@ge.com',
                'logo' => 'logos/ge_logo.jpg',
                'website' => 'https://www.ge.com',
            ],
            [
                'name' => 'McDonalds',
                'email' => 'info@mcdonalds.com',
                'logo' => 'logos/mcdonalds_logo.jpg',
                'website' => 'https://www.mcdonalds.com',
            ],
            [
                'name' => 'Disney',
                'email' => 'info@disney.com',
                'logo' => 'logos/disney_logo.jpg',
                'website' => 'https://www.disney.com',
            ],
        ];
    
        foreach ($companies as $company) {
            DB::table('companies')->insert($company);
        }
    }
}
