<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        App\Models\Role::create([
            'name'              => 'Members',
            'slug'              => 'members',
            'description'       => 'Limited access'
        ]);

        App\Models\Role::create([
            'name'              => 'Partners',
            'slug'              => 'partners',
            'description'       => 'See and manage only their transactions'
        ]);

        App\Models\Role::create([
            'name'              => 'Admin',
            'slug'              => 'admin',
            'description'       => 'See and manage everything'
        ]);        

        $this->command->info('Roles table seeded!');
    }
}
