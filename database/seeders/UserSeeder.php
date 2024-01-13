<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Dedy Wijaya',
                'role' => 'direktur',
                'email' => 'direktur@gmail.com',
                'password' => bcrypt('direktur123'),
                'jurusan' => '',
                'telp' => '',
                'nim' => '',
                'photo' => '',
            ],
            [
                'name' => 'Ustadz Adam',
                'role' => 'direktur',
                'email' => 'direktur@gmail.com',
                'password' => bcrypt('direktur123'),
                'jurusan' => '',
                'telp' => '',
                'nim' => '',
                'photo' => '',
            ],
            [
                'name' => 'Ustadz Febby',
                'role' => 'dosen',
                'email' => 'dosen1@gmail.com',
                'password' => bcrypt('dosen1'),
                'jurusan' => '',
                'telp' => '',
                'nim' => '',
                'photo' => '',
            ],
            [
                'name' => 'Ustadz Faruq',
                'role' => 'dosen',
                'email' => 'dosen2@gmail.com',
                'password' => bcrypt('dosen2'),
                'jurusan' => '',
                'telp' => '',
                'nim' => '',
                'photo' => '',
            ],
            [
                'name' => 'Ustadz Fauzan',
                'role' => 'dosen',
                'email' => 'dosen3@gmail.com',
                'password' => bcrypt('dosen3'),
                'jurusan' => '',
                'telp' => '',
                'nim' => '',
                'photo' => '',
            ],
            [
                'name' => 'Ustadz Fajri',
                'role' => 'dosen',
                'email' => 'dosen4@gmail.com',
                'password' => bcrypt('dosen4'),
                'jurusan' => '',
                'telp' => '',
                'nim' => '',
                'photo' => '',
            ],

            
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
