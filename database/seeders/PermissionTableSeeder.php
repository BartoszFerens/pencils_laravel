<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Empty the session table
            DB::table('sessions')->truncate();

            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            foreach (config('permission.app_permissions') as $permission) {
                foreach (config('permission.app_cruds') as $crud) {
                    Permission::create([
                        'name' => $permission . '_' . $crud,
                    ]);
                }
                
                if (array_key_exists($permission, config('permission.app_special_permissions'))) {
                    foreach (config('permission.app_special_permissions.' . $permission) as $special_permission) {
                        foreach (config('permission.app_cruds') as $crud) {
                            Permission::create([
                                'name' => $permission . '_' . $special_permission . '_' . $crud,
                            ]);
                        }
                    }
                }
            }

            foreach (config('permission.user_roles') as $role) {
                $assignRole = Role::findOrCreate($role);

                $array = config('permission.role_has_permissions.' . $role);

                if (is_array($array)) {
                    foreach (config('permission.role_has_permissions.' . $role) as $permission) {
                        $assignRole->givePermissionTo($permission);
                    }
                }
            }

            DB::table('role_has_roles')->insert([
                'role_id'       => 2,
                'has_role_id'   => 3,
            ]);

            DB::table('role_has_roles')->insert([
                'role_id'       => 2,
                'has_role_id'   => 3,
            ]);

            $user = \App\Models\User::factory()->create([
                'first_name'        => 'Super',
                'last_name'         => 'Admin',
                'email'             => 'super@example.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('Gorilla1!'),
                'remember_token'    => Str::random(10),
                'created_by'        => 1,
            ]);
            
            $user->assignRole('SUPER_ADMIN');

            $user = \App\Models\User::factory()->create([
                'first_name'        => 'Admin',
                'last_name'         => 'Example',
                'email'             => 'admin@example.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('Gorilla1!'),
                'remember_token'    => Str::random(10),
                'created_by'        => 1,
            ]);

            $user->assignRole('ADMIN');

            $user = \App\Models\User::factory()->create([
                'first_name'        => 'Customer',
                'last_name'         => 'Example',
                'email'             => 'customer@example.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('Gorilla1!'),
                'remember_token'    => Str::random(10),
                'created_by'        => 1,
            ]);

            $user->assignRole('CUSTOMER');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
