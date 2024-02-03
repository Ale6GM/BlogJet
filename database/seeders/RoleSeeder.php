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
     */
    public function run(): void
    {
        // creamo los roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name'=> 'Blogger']);

        // creamos los permisos

        Permission::create(['name'=> 'admin.home', 'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=> 'admin.users.index', 'description' => 'Ver el listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.users.edit', 'description' => 'Asignar un Rol'])->syncRoles([$role1]);        

        Permission::create(['name'=> 'admin.categories.index', 'description' => 'Ver el listado de categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.categories.create', 'description' => 'Crear una Categoria'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.edit', 'description' => 'Editar Una Categoria'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.destroy', 'description' => 'Eliminar una Categoria'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.tags.index', 'description' => 'Ver el listado de Etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tags.create', 'description' => 'Crear etiquetas'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.tags.edit', 'description' => 'Editar Etiquetas'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.tags.destroy', 'description' => 'Eliminar Etiquetas'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.posts.index', 'description' => 'Ver el listado de Posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.posts.create', 'description' => 'Crear un Post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.posts.edit', 'description' => 'Editar un Post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.posts.destroy', 'description' => 'Eliminar un post'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name'=> 'admin.roles.index', 'description' => 'Ver el listado de roles'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.roles.create', 'description' => 'Crear un Rol'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.roles.edit', 'description' => 'Editar un rol'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.roles.destroy', 'description' => 'Eliminar un Rol'])->syncRoles([$role1]);
    }
}
