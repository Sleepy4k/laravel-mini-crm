<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y/m/d H:i:s");
        $data = [
            [
                'name' => 'admin',
                'password' => bcrypt('admin123'),
                'email' => 'admin@admin.com',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];

        foreach ($data as $user) {
            User::create($user);
        };
    }
}