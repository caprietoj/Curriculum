<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'informacion_personal_create',
            ],
            [
                'id'    => 18,
                'title' => 'informacion_personal_edit',
            ],
            [
                'id'    => 19,
                'title' => 'informacion_personal_show',
            ],
            [
                'id'    => 20,
                'title' => 'informacion_personal_delete',
            ],
            [
                'id'    => 21,
                'title' => 'informacion_personal_access',
            ],
            [
                'id'    => 22,
                'title' => 'language_create',
            ],
            [
                'id'    => 23,
                'title' => 'language_edit',
            ],
            [
                'id'    => 24,
                'title' => 'language_show',
            ],
            [
                'id'    => 25,
                'title' => 'language_delete',
            ],
            [
                'id'    => 26,
                'title' => 'language_access',
            ],
            [
                'id'    => 27,
                'title' => 'contenido_create',
            ],
            [
                'id'    => 28,
                'title' => 'contenido_edit',
            ],
            [
                'id'    => 29,
                'title' => 'contenido_show',
            ],
            [
                'id'    => 30,
                'title' => 'contenido_delete',
            ],
            [
                'id'    => 31,
                'title' => 'contenido_access',
            ],
            [
                'id'    => 32,
                'title' => 'experience_create',
            ],
            [
                'id'    => 33,
                'title' => 'experience_edit',
            ],
            [
                'id'    => 34,
                'title' => 'experience_show',
            ],
            [
                'id'    => 35,
                'title' => 'experience_delete',
            ],
            [
                'id'    => 36,
                'title' => 'experience_access',
            ],
            [
                'id'    => 37,
                'title' => 'university_create',
            ],
            [
                'id'    => 38,
                'title' => 'university_edit',
            ],
            [
                'id'    => 39,
                'title' => 'university_show',
            ],
            [
                'id'    => 40,
                'title' => 'university_delete',
            ],
            [
                'id'    => 41,
                'title' => 'university_access',
            ],
            [
                'id'    => 42,
                'title' => 'hability_create',
            ],
            [
                'id'    => 43,
                'title' => 'hability_edit',
            ],
            [
                'id'    => 44,
                'title' => 'hability_show',
            ],
            [
                'id'    => 45,
                'title' => 'hability_delete',
            ],
            [
                'id'    => 46,
                'title' => 'hability_access',
            ],
            [
                'id'    => 47,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
