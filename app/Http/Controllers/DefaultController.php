<?php

namespace App\Http\Controllers;

use App\Helpers\HelperAuth;
use App\Models\Declaration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function welcome(){

        if (HelperAuth::hasRole('Visiteur')){
            $nbDeclarationAttente = Declaration::where('idUser',Auth::user()->id)->where('idEtat',1)->count();
            $nbDeclarationMois = Declaration::whereMonth('dateDeclaration','=',date('m'))->where('idUser',Auth::user()->id)->count();
            $nbDeclarationAnnee = Declaration::whereYear('dateDeclaration','=',date('Y'))->where('idUser',Auth::user()->id)->count();
            $declarations = Declaration::limit(5)->where('idUser',Auth::user()->id)->orderBy('dateDeclaration','DESC')->get();
        }
        elseif (HelperAuth::hasRole('Comptable')){
            $nbDeclarationAttente = Declaration::where('idEtat',1)->count();
            $nbDeclarationMois = Declaration::whereMonth('dateDeclaration','=',date('m'))->count();
            $nbDeclarationAnnee = Declaration::whereYear('dateDeclaration','=',date('Y'))->count();
            $declarations = Declaration::limit(5)->orderBy('dateDeclaration','DESC')->get();
        }
        elseif (HelperAuth::hasRole('Admin')){
            $nbUsers = User::all()->count();
            $nbVisiteurs = User::where('idRole',1)->count();
            $nbComptables = User::where('idRole',2)->count();
            $nbAdmins = User::where('idRole',3)->count();
            return view('welcomeadmin',['nbUsers'=>$nbUsers,'nbVisiteurs'=>$nbVisiteurs,'nbComptables'=>$nbComptables,'nbAdmins'=>$nbAdmins]);
        }

        return view('welcome',['declarations' => $declarations,
                                'nbDeclarationAnnee'=>$nbDeclarationAnnee,
                                'nbDeclarationAttente'=>$nbDeclarationAttente,
                                'nbDeclarationMois'=>$nbDeclarationMois]);
    }



}
