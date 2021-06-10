<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatSeeder extends Seeder
{
    public function run(){
        $etatdeclarations = [
            ['libelle'=>'En attente de validation'],
            ['libelle'=>'Remboursé']
        ];

        foreach ($etatdeclarations as $d){
            DB::table('etatdeclaration')->insert($d);
        }
    }
}
