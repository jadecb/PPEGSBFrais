<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeclarationSeeder extends Seeder
{

    public function run(){
        $declarations = [
            ['dateDeclaration'=>'2021/01/19','idUser'=>1,'idEtat'=>1],
            ['dateDeclaration'=>'2021/01/18','idUser'=>2,'idEtat'=>1],
            ['dateDeclaration'=>'2021/01/18','idUser'=>3,'idEtat'=>1],
            ['dateDeclaration'=>'2020/12/16','idUser'=>1,'idEtat'=>2],
            ['dateDeclaration'=>'2020/12/17','idUser'=>2,'idEtat'=>2],
            ['dateDeclaration'=>'2020/12/18','idUser'=>3,'idEtat'=>2],
            ['dateDeclaration'=>'2020/11/14','idUser'=>1,'idEtat'=>2],
            ['dateDeclaration'=>'2020/11/16','idUser'=>2,'idEtat'=>2],
            ['dateDeclaration'=>'2020/11/17','idUser'=>3,'idEtat'=>2],
        ];

        foreach ($declarations as $declaration){
            DB::table('declaration')->insert($declaration);
        }
    }

}
