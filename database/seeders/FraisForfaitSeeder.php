<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FraisForfaitSeeder extends Seeder
{
    public function run()
    {
        $fraisforfaits = [
            ['libelle'=>'Nuit Hotel','montant'=>52.25],
            ['libelle'=>'Repas','montant'=>12.20],
            ['libelle'=>'Frais kilométrique','montant'=>0.97]
        ];

        foreach ($fraisforfaits as $ff){
            DB::table('fraisforfait')->insert($ff);
        }


    }
}
