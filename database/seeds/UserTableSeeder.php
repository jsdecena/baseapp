<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::create([
            'name'          => 'John Admin Doe',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('Testing123')
        ]);

        App\Models\User::create([
            'name'          => 'Jake Employee Doe',
            'email'         => 'employee@employee.com',
            'password'      => Hash::make('Testing123')
        ]);        

        $this->command->info('User table seeded!');
    }
}
