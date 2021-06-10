<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class HelperAuth
{
    public static function hasRole(string $role){
        if (strtolower(Auth::user()->role->libelle) == strtolower($role)){
            return true;
        }
        return false;
    }
}
