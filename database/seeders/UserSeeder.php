<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        $user2 = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);

        $adminAPIRole = Role::findByName('Admin', 'api');
        $user1->assignRole('Admin');
        $user1->assignRole($adminAPIRole);

        $userAPIRole = Role::findByName('User', 'api');
        $user2->assignRole('User');
        $user2->assignRole($userAPIRole);
    }
}
