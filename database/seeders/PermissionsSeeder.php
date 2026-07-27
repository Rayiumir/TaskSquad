<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['title' => 'users_index', 'value' => 'کاربران', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'groups_index', 'value' => 'گروه ها', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'roles_index', 'value' => 'مقام ها', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'permissions_index', 'value' => 'دسترسی ها', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'tasks_index', 'value' => 'وظیفه ها', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'projects_index', 'value' => 'پروژه ها', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'deleted_index', 'value' => 'دکمه های حذف', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'created_index', 'value' => 'افزودن ها', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
