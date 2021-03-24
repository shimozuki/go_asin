<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [ 'Pemilik','Pencari'];

       foreach($name as $item) {
        $role = new Role;
        $role->name = $item;
        $role->Save();

       };

    }
}
