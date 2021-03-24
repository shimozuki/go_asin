<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(provinsiSeeder::class);
        $this->call(regenciSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
