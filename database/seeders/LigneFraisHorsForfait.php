<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigneFraisHorsForfait extends Seeder
{
    public function run(){
        $ligneshorsforfait = [
            ['date'=>'2021/01/05', 'montant'=>35.25,'libelle'=>'Taxi conférence','idDeclaration'=>1,'valide'=>0],
            ['date'=>'2021/01/04', 'montant'=>80.25,'libelle'=>'Train conférence','idDeclaration'=>1,'valide'=>0],
            ['date'=>'2021/01/01', 'montant'=>50.20,'libelle'=>'Cadeau client','idDeclaration'=>2,'valide'=>0],
            ['date'=>'2021/01/01', 'montant'=>10.20,'libelle'=>'Envoi Cadeau client','idDeclaration'=>2,'valide'=>0],
            ['date'=>'2021/01/05', 'montant'=>8.15,'libelle'=>'Péage','idDeclaration'=>3,'valide'=>0],
            ['date'=>'2021/01/10', 'montant'=>45.18,'libelle'=>'Réparation voiture','idDeclaration'=>3,'valide'=>0],
            ['date'=>'2021/01/11', 'montant'=>15.20,'libelle'=>'Taxi formation','idDeclaration'=>4,'valide'=>1],
            ['date'=>'2021/01/11', 'montant'=>15.20,'libelle'=>'Taxi formation','idDeclaration'=>5,'valide'=>1],
            ['date'=>'2021/01/11', 'montant'=>15.20,'libelle'=>'Taxi formation','idDeclaration'=>6,'valide'=>1],
            ['date'=>'2021/01/11', 'montant'=>105.78,'libelle'=>'Train formation','idDeclaration'=>6,'valide'=>1],
            ['date'=>'2021/01/03', 'montant'=>50.50,'libelle'=>'Abonnement bus','idDeclaration'=>7,'valide'=>1],
            ['date'=>'2021/01/03', 'montant'=>50.50,'libelle'=>'Abonnement bus','idDeclaration'=>8,'valide'=>1],
            ['date'=>'2021/01/11', 'montant'=>10.50,'libelle'=>'Train visite','idDeclaration'=>8,'valide'=>1],
            ['date'=>'2021/01/11', 'montant'=>150.80,'libelle'=>'Train formation','idDeclaration'=>9,'valide'=>1],
        ];

        foreach ($ligneshorsforfait as $hf){
            DB::table('lignefraishorsforfait')->insert($hf);
        }
    }
}
