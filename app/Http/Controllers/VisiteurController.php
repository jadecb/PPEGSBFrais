<?php

namespace App\Http\Controllers;

use App\Models\Declaration;
use App\Models\LigneFraisForfait;
use App\Models\LigneFraisHorsForfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisiteurController extends Controller
{
    public function declare(){
        $declaration = Declaration::whereMonth('dateDeclaration','=',date('m'))
            ->whereYear('dateDeclaration','=',date('Y'))
            ->where('idUser', Auth::user()->id)
            ->first();

        if (!isset($declaration)){
            return view('declarer');
        }
        else{
            return redirect()->route('showdeclaration',['id'=>$declaration->id])->with('error','Vous avez déjà déclaré vos frais ce mois-ci');
        }

    }

    public function doDeclare(Request $request){
        $validatedData = $request->validate([
            'hotel'=>['required','max:31'],
            'repas'=>['required'],
            'km'=>['required'],
            'libellehf'=>['max:255'],
            'montant'=>[],
            'date'=>[],
        ]);

        //Create and Add declaration
        $declaration = new Declaration();
        date_default_timezone_set('Europe/Paris');
        $declaration->dateDeclaration = date('Y-m-d H:i:s', time());
        $declaration->idUser = Auth::user()->id;
        $declaration->idEtat = 1;
        $declaration->save();

        //Row Hotel
        $ligneFraisForfait = new LigneFraisForfait();
        $ligneFraisForfait->idDeclaration = $declaration->id;
        $ligneFraisForfait->idFraisForfait = 1;
        $ligneFraisForfait->quantite = $validatedData['hotel'];
        $ligneFraisForfait->valide = false;
        $ligneFraisForfait->save();

        //Row Repas
        $ligneFraisForfait = new LigneFraisForfait();
        $ligneFraisForfait->idDeclaration = $declaration->id;
        $ligneFraisForfait->idFraisForfait = 2;
        $ligneFraisForfait->quantite = $validatedData['repas'];
        $ligneFraisForfait->valide = false;
        $ligneFraisForfait->save();

        //Row km
        $ligneFraisForfait = new LigneFraisForfait();
        $ligneFraisForfait->idDeclaration = $declaration->id;
        $ligneFraisForfait->idFraisForfait = 3;
        $ligneFraisForfait->quantite = $validatedData['km'];
        $ligneFraisForfait->valide = false;
        $ligneFraisForfait->save();

        //If fraishorsforfait are declared
        if(isset($validatedData['libellehf'])){
            for ($i=0;$i<count($validatedData['libellehf']);$i++){
                $ligneHorsForfait = new LigneFraisHorsForfait();
                $ligneHorsForfait->libelle = $validatedData['libellehf'][$i];
                $ligneHorsForfait->montant = $validatedData['montant'][$i];
                $ligneHorsForfait->date = $validatedData['date'][$i];
                $ligneHorsForfait->valide = false;
                $ligneHorsForfait->idDeclaration = $declaration->id;
                $ligneHorsForfait->save();
                //ddd($ligneHorsForfait);
            }
        }

        //Redirect on newly added declaration
        return redirect()->route('showdeclaration',['id'=>$declaration->id])->with('success','Déclaration de frais enregistrée');

    }

    public function showAll(){
        $declarations = Declaration::where('idUser',Auth::user()->id)->get();
        return view('showall',['declarations'=>$declarations]);
    }

    public function show(int $id){
        $declaration = Declaration::where('id',$id)->first();
        return view('show',['declaration'=>$declaration]);
    }
}
