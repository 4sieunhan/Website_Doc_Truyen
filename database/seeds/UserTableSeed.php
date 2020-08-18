<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $bloggerRole = Role::where('name','blogger')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('2519329aA')
        ]);

        $blogger = User::create([
            'name' => 'Blogger User',
            'email' => 'blogger@blogger.com',
            'password' => Hash::make('2519329aA')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('2519329aA')
        ]);

        $admin->roles()->attach($adminRole);
        $blogger->roles()->attach($bloggerRole);
        $user->roles()->attach($userRole);
    }
}
