<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        // Insert a record in settings table
        DB::table('settings')->insert([
            'name' => 'banner',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            PermissionSeeder::class
        ]);
    }
}
