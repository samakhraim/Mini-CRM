<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'first_name' => 'Vivian',
                'last_name' => 'Cameron',
                'email' => 'v.cameron@gmail.com',
                'phone' => '595-2037-52',
                'company_id' => 1, 
            ],
            [
                'first_name' => 'Fenton',
                'last_name' => 'Payne',
                'email' => 'f.payne@gmail.com',
                'phone' => '138-0840-23',
                'company_id' => 2, 
            ],
            [
                'first_name' => 'Thomas',
                'last_name' => 'Ferguson',
                'email' => 't.ferguson@gmail.com',
                'phone' => '722-6106-76',
                'company_id' => 3, 
            ],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Wells',
                'email' => 'd.wells@gmail.com',
                'phone' => '517-2109-67',
                'company_id' => 4, 
            ],
            [
                'first_name' => 'Adison',
                'last_name' => 'Foster',
                'email' => 'foster@gmail.com',
                'phone' => '073-7606-74',
                'company_id' => 5, 
            ],
            [
                'first_name' => 'Belinda',
                'last_name' => 'Stewart',
                'email' => 'b.stewart@gmail.com',
                'phone' => '852-5120-37',
                'company_id' => 6, 
            ],
            [
                'first_name' => 'Roland',
                'last_name' => 'Stewart',
                'email' => 'r.stewart@gmail.com',
                'phone' => '319-1432-71',
                'company_id' => 7, 
            ],
            [
                'first_name' => 'Alfred',
                'last_name' => 'Foster',
                'email' => 'a.foster@gmail.com',
                'phone' => '824-0062-37',
                'company_id' => 8, 
            ],
            [
                'first_name' => 'Rubie',
                'last_name' => 'Wilson',
                'email' => 'r.wilson@gmail.com',
                'phone' => '517-8593-70',
                'company_id' => 9, 
            ],
            [
                'first_name' => 'Madaline',
                'last_name' => 'Dixon',
                'email' => 'm.dixon@gmail.com',
                'phone' => '942-9383-54',
                'company_id' => 10, 
            ],
            [
                'first_name' => 'Tara',
                'last_name' => 'Kelly',
                'email' => 't.kelly@gmail.com',
                'phone' => '781-0567-49',
                'company_id' => 10, 
            ],
            [
                'first_name' => 'Owen',
                'last_name' => 'Rogers',
                'email' => 'o.rogers@gmail.com',
                'phone' => '804-3900-44',
                'company_id' => 2, 
            ],
            [
                'first_name' => 'Connie',
                'last_name' => 'Nelson',
                'email' => 'c.nelson@gmail.com',
                'phone' => '948-4130-95',
                'company_id' => 3, 
            ],
            [
                'first_name' => 'Elian',
                'last_name' => 'Myers',
                'email' => 'e.myers@gmail.com',
                'phone' => '025-3250-25',
                'company_id' => 4, 
            ],
            [
                'first_name' => 'Savana',
                'last_name' => 'Crawford',
                'email' => 's.crawford@gmail.com',
                'phone' => '114-8712-71',
                'company_id' => 5, 
            ],
        ];

        foreach ($employees as $employee) {
            DB::table('employees')->insert($employee);
        }
    }
}
