<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions=[
       'role-list',
       'role-create',
       'role-edit',
       'role-delete',
       'productos-list',
       'productos-create',
       'productos-edit',
       'productos-delete',
       'proveedores-list',
       'proveedores-create',
       'proveedores-edit',
       'proveedores-delete',
       'categoria-list'
       
      ];

      foreach ($permissions as $permission){
          Permission::create(['name'=>$permission]);
      }
    }
}
