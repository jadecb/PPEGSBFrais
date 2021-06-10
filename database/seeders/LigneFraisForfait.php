<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigneFraisForfait extends Seeder
{
    public function run(){
        //1 = nuit hotel 2 = repas 3 = frais kilométrique
        $lignesfraisforfait = [
            ['idDeclaration'=>1,'idFraisForfait'=>1,'quantite'=>3,'valide'=>0],
            ['idDeclaration'=>1,'idFraisForfait'=>2,'quantite'=>2,'valide'=>0],
            ['idDeclaration'=>1,'idFraisForfait'=>3,'quantite'=>15,'valide'=>0],

            ['idDeclaration'=>2,'idFraisForfait'=>1,'quantite'=>3,'valide'=>0],
            ['idDeclaration'=>2,'idFraisForfait'=>2,'quantite'=>2,'valide'=>0],
            ['idDeclaration'=>2,'idFraisForfait'=>3,'quantite'=>150,'valide'=>0],

            ['idDeclaration'=>3,'idFraisForfait'=>1,'quantite'=>15,'valide'=>0],
            ['idDeclaration'=>3,'idFraisForfait'=>2,'quantite'=>35,'valide'=>0],
            ['idDeclaration'=>3,'idFraisForfait'=>3,'quantite'=>251,'valide'=>0],

            ['idDeclaration'=>4,'idFraisForfait'=>1,'quantite'=>5,'valide'=>1],
            ['idDeclaration'=>4,'idFraisForfait'=>2,'quantite'=>11,'valide'=>1],
            ['idDeclaration'=>4,'idFraisForfait'=>3,'quantite'=>105,'valide'=>1],

            ['idDeclaration'=>5,'idFraisForfait'=>1,'quantite'=>2,'valide'=>1],
            ['idDeclaration'=>5,'idFraisForfait'=>2,'quantite'=>5,'valide'=>1],
            ['idDeclaration'=>5,'idFraisForfait'=>3,'quantite'=>87,'valide'=>1],

            ['idDeclaration'=>6,'idFraisForfait'=>1,'quantite'=>1,'valide'=>1],
            ['idDeclaration'=>6,'idFraisForfait'=>2,'quantite'=>1,'valide'=>1],
            ['idDeclaration'=>6,'idFraisForfait'=>3,'quantite'=>132,'valide'=>1],

            ['idDeclaration'=>7,'idFraisForfait'=>1,'quantite'=>10,'valide'=>1],
            ['idDeclaration'=>7,'idFraisForfait'=>2,'quantite'=>15,'valide'=>1],
            ['idDeclaration'=>7,'idFraisForfait'=>3,'quantite'=>512,'valide'=>1],

            ['idDeclaration'=>8,'idFraisForfait'=>1,'quantite'=>4,'valide'=>1],
            ['idDeclaration'=>8,'idFraisForfait'=>2,'quantite'=>9,'valide'=>1],
            ['idDeclaration'=>8,'idFraisForfait'=>3,'quantite'=>411,'valide'=>1],

            ['idDeclaration'=>9,'idFraisForfait'=>1,'quantite'=>1,'valide'=>1],
            ['idDeclaration'=>9,'idFraisForfait'=>2,'quantite'=>4,'valide'=>1],
            ['idDeclaration'=>9,'idFraisForfait'=>3,'quantite'=>285,'valide'=>1],
        ];

        foreach ($lignesfraisforfait as $lff){
            DB::table('lignefraisforfait')->insert($lff);
        }
    }
}
