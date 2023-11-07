<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos los roles
        $admin = Role::create(['name' => 'Admin']);
        $customer = Role::create(['name' => 'Customer']);
        /*
        *Creacion de permiso y asignacion de rol. 
        El nombre del permiso debe ser igual al que se especifica en el archivo de rutas, seguido del nombre de algún metodo del controlador.
        *P/E: en el archivo  Route::resource('user',UserController::class)->names('admin.user'); 
        Asignacion de permiso al rol con el metodo syncRoles
        */
        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $customer]);
        Permission::create(['name' => 'admin.brands.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.units.index'])->syncRoles([$admin]);
    }
}
