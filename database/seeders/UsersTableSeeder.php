<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $admin_role = DB::table('roles')->insertGetId([
            'name' => 'ROLE_ADMIN',
            'description' => 'users who are admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $donor_role = DB::table('roles')->insertGetId([
            'name' => 'ROLE_DONOR',
            'description' => 'users who are donors',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $admin_user_id = DB::table('users')->insertGetId([
            'name' => 'Administrator',
            'email' => 'admin@development.com',
            'password' => bcrypt('developer'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('roles_user')->insert([
            'roles_id' => $admin_role,
            'user_id' => $admin_user_id
        ]);
    }
}
