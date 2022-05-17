<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeederNew extends Seeder
{
    private $roles;

    private $permissions;

    private $models;
    

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function run()
    {
        $this->permissions = config('privileges.permissions_crud');

        $this->roles = config('privileges.roles');
        

        $this->preSeedProcess();

        // Reset cached roles and permissions
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        // Create all models permissions
        $permissionsArray = [];
        foreach ($this->getPermission() as $permission) {
            $permissionsArray[] = Permission::create(['name' => $permission]);
        }

        // Create all roles and its permission
        foreach ($this->roles as $roleName) {
            $role = Role::create(['name' => $roleName]);
            $role->givePermissionTo($permissionsArray);
        }
    }

    /**
     * Handle the pre seed operation based on DB driver
     *
     */
    protected function preSeedProcess() {

        // Truncate role_has_permissions, roles and permissions tables
        // Keep model_has_roles and model_has_permissions
        // Disable FOREIGN_KEY_CHECKS before truncating roles and permissions
        // Enable FOREIGN_KEY_CHECKS after process complete

        $drivers = config('database.connections.mysql.driver');

        if ($drivers == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::statement("truncate roles");
            DB::statement("truncate permissions");
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        }elseif ($drivers == 'sqlsrv') {

            $index = (int) ! Role::count();
            DB::statement('ALTER TABLE model_has_roles NOCHECK CONSTRAINT ALL');
            DB::statement('DELETE FROM roles');
            DB::statement("DBCC CHECKIDENT (roles, RESEED, {$index})");
            DB::statement('DELETE FROM permissions');
            DB::statement("DBCC CHECKIDENT (permissions, RESEED, {$index})");
            DB::statement('ALTER TABLE model_has_roles CHECK CONSTRAINT ALL');
        }

    }

    private function getPermission(): array {
        $resources = config('privileges.resources_actions_permissions');
        $permissions = [];
        foreach ($resources as $resourceActions) {
            foreach ($resourceActions as $resourceActionPermissions) {
                $permissions = array_merge($permissions, $resourceActionPermissions);
            }
        }
        return array_unique($permissions);
    }
    
}
