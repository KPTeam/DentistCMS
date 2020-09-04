<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class, 3)->create()->each(function ($role)
        {

            $role->permissions()->attach(Permission::firstOrCreate(['id' => 1],['slug' => 'view-pacient' ,'id' => 1,'name' => 'View Pacient']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 2],['slug' => 'create-pacient', 'name' => 'Create Pacient']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 3],['slug' => 'edit-pacient' ,'id' => 1, 'name' => 'Edit Pacient']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 4],['slug' => 'delete-pacient' ,'id' => 1, 'name' => 'Delete Pacient']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 5],['slug' => 'view-appointment' ,'id' => 1, 'name' => 'View Appointment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 6],['slug' => 'create-appointment' ,'id' => 1, 'name' => 'Create Appointment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 7],['slug' => 'edit-appointment' ,'id' => 1, 'name' => 'Edit Appointment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 8],['slug' => 'delete-appointment' ,'id' => 1, 'name' => 'Delete Appointment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 9],['slug' => 'view-visit' ,'id' => 1, 'name' => 'View Visit']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 10],['slug' => 'create-visit' ,'id' => 1, 'name' => 'Create Visit']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 11],['slug' => 'edit-visit' ,'id' => 1, 'name' => 'Edit Visit']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 12],['slug' => 'delete-visit' ,'id' => 1, 'name' => 'Delete Visit']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 13],['slug' => 'view-treatment' ,'id' => 1, 'name' => 'View Treatment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 14],['slug' => 'create-treatment' ,'id' => 1, 'name' => 'Create Treatment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 15],['slug' => 'edit-treatment' ,'id' => 1, 'name' => 'Edit Treatment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 16],['slug' => 'delete-treatment' ,'id' => 1, 'name' => 'Delete Treatment']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 17],['slug' => 'view-report' ,'id' => 1, 'name' => 'View Report']));
            $role->permissions()->attach(Permission::firstOrCreate(['id' => 18],['slug' => 'create-report' ,'id' => 1, 'name' => 'Create Report']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 19],['slug' => 'edit-report' ,'id' => 1, 'name' => 'Edit Report']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 20],['slug' => 'delete-report' ,'id' => 1, 'name' => 'Delete Report']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 21],['slug' => 'view-services' ,'id' => 1, 'name' => 'View Services']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 22],['slug' => 'create-services' ,'id' => 1, 'name' => 'Create Services']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 23],['slug' => 'edit-services' ,'id' => 1, 'name' => 'Edit Services']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 24],['slug' => 'delete-services' ,'id' => 1, 'name' => 'Delete Services']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 25],['slug' => 'view-user' ,'id' => 1, 'name' => 'View User']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 26],['slug' => 'create-user' ,'id' => 1, 'name' => 'Create User']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 27],['slug' => 'edit-user' ,'id' => 1, 'name' => 'Edit User']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 28],['slug' => 'delete-user' ,'id' => 1, 'name' => 'Delete User']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 29],['slug' => 'view-role' ,'id' => 1, 'name' => 'View Role']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 30],['slug' => 'create-role' ,'id' => 1, 'name' => 'Create Role']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 31],['slug' => 'edit-role' ,'id' => 1, 'name' => 'Edit Role']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 32],['slug' => 'delete-role' ,'id' => 1, 'name' => 'Delete Role']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 33],['slug' => 'view-debt' ,'id' => 1, 'name' => 'View Debt']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 34],['slug' => 'create-debt' ,'id' => 1, 'name' => 'Create Debt']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 35],['slug' => 'edit-debt' ,'id' => 1, 'name' => 'Edit Debt']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 36],['slug' => 'delete-debt' ,'id' => 1, 'name' => 'Delete Debt']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 37],['slug' => 'view-bill' ,'id' => 1, 'name' => 'View Bill']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 38],['slug' => 'create-bill' ,'id' => 1, 'name' => 'Create Bill']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 39],['slug' => 'edit-bill' ,'id' => 1, 'name' => 'Edit Bill']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 40],['slug' => 'delete-bill' ,'id' => 1, 'name' => 'Delete Bill']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 41],['slug' => 'view-payment' ,'id' => 1, 'name' => 'View Payment']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 42],['slug' => 'create-payment' ,'id' => 1, 'name' => 'Create Payment']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 43],['slug' => 'edit-payment' ,'id' => 1, 'name' => 'Edit Payment']));
             $role->permissions()->attach(Permission::firstOrCreate(['id' => 44],['slug' => 'delete-payment' ,'id' => 1, 'name' => 'Delete Payment']));
            $user = factory(User::class, 5)->create(['role_id'=>$role->id]);
        });
    }
}
