<?php

namespace App\Http\Controllers;

use App\Models\Declaration;
use App\Models\LigneFraisForfait;
use App\Models\LigneFraisHorsForfait;
use Illuminate\Http\Request;

class ComptableController extends Controller
{
    public function valid(int $id){
        $declaration = Declaration::where('id',$id)->first();

        if ($declaration->idEtat == 2){
            return redirect()->route('showdeclaration',['id'=>$declaration->id])->with('warning','Déclaration de frais déjà validée');
        }
        return view('validate',['declaration'=>$declaration]);
    }

    public function doValid(Request $request){
        $validatedData = $request->validate([
            'checkff'=>[],
            'checkfhf'=>[],
            'declaration'=>['required'],
        ]);

        //Valide frais forfaitairesi des frais on été validés
        if (isset($validatedData['checkff'])){
            foreach($validatedData['checkff'] as $value){
                LigneFraisForfait::where('idDeclaration',$validatedData['declaration'])->where('idFraisForfait',$value)->update(['valide'=>1]);

            }
        }

        //Valide frais hors forfait si des frais on été validés
        if (isset($validatedData['checkfhf'])){
            foreach($validatedData['checkfhf'] as $value){
                LigneFraisHorsForfait::where('id',$value)->update(['valide'=>1]);
            }
        }

        //Change l'état de la déclaration.
        Declaration::where('id',$validatedData['declaration'])->update(['idEtat'=>2]);

        return redirect()->route('showdeclaration',['id'=>$validatedData['declaration']])->with('success','Déclaration de frais validée');


    }

    public function showPending(){
        $declarations = Declaration::where('idEtat',1)->get();
        return view('showall',['declarations'=>$declarations]);
    }

    public function showall(){
        $declarations = Declaration::all();
        return view('showall',['declarations'=>$declarations]);
    }
}
