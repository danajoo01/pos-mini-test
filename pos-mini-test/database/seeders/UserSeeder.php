<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'     => 'user',
                'email'    => 'user@user.com',
                'is_admin' => 0,
            ],
            [
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'is_admin' => 1,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate([
                'email' => $user['email'],
            ], [
                'name'              => $user['name'],
                'is_admin'          => $user['is_admin'],
                'password'          => Hash::make('rahasia'),
                'email_verified_at' => now(),
            ]);
        }
    }
}
