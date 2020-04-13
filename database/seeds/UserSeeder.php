<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Administrador";
        $user->email = "sistemas.ssi@redsalud.gob.cl";
        $user->password = bcrypt('admin');
        $user->save();
        $user->givePermissionTo(Permission::all());
    }
}
