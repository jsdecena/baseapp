<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();

        App\Models\Role_User::create([
            'role_id'           => 3,
            'user_id'           => 1
        ]);

        App\Models\Role_User::create([
            'role_id'           => 1,
            'user_id'           => 2
        ]);

        $this->command->info('User Roles table seeded!');
    }
}
