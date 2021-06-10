<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(){
        $roles = [
            ['libelle'=>'Visiteur'],
            ['libelle'=>'Comptable'],
            ['libelle'=>'Admin'],
        ];

        foreach ($roles as $role){
            DB::table('role')->insert($role);
        }
    }
}
