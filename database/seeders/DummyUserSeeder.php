<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =  [
            [
                'name'=> 'admin',
                'email'=>'admin@gmail.com',
                'level'=>'Admin',
                'foto'=>'',
                'telepon'=>'123',
                'password'=>bcrypt('123456')   
            ],
            [
                'name'=> 'Petugas',
                'email'=>'petugas@gmail.com',
                'level'=>'Petugas',
                'foto'=>'',
                'telepon'=>'123',
                'password'=>bcrypt('123456')   
            ],
            [
                'name'=> 'Pengguna',
                'email'=>'pengguna@gmail.com',
                'level'=>'Pengguna',
                'foto'=>'',
                'telepon'=>'123',
                'password'=>bcrypt('123456')   
            ]
            ];

            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
