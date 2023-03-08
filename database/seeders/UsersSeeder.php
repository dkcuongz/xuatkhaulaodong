<?php

namespace Database\Seeders;

use App\Entities\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@xkld.com',
            'role_id' => config('constants.user.roles.admin'),
            'status' => config('constants.user.status.active'),
            'password' => bcrypt(app()->environment(['local', 'development']) ? '12345678' : 'Admin@1234'),
        ]);

        User::create([
            'name' => 'sub_admin',
            'email' => 'subadmin@xkld.com',
            'role_id' => config('constants.user.roles.admin'),
            'status' => config('constants.user.status.active'),
            'password' => bcrypt(app()->environment(['local', 'development']) ? '12345678' : 'Admin@1234'),
        ]);
    }
}
