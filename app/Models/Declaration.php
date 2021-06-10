<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;
    protected $table = 'declaration';

    public function etat(){
        return $this->hasOne(EtatDeclaration::class,'id','idEtat');
    }

    public function user(){
        return $this->hasOne(User::class,'id','idUser');
    }

    public function lignesFraisForfait()
    {
        return $this->hasMany(LigneFraisForfait::class,'idDeclaration');
    }

    public function lignesFraisHorsForfait()
    {
        return $this->hasMany(LigneFraisHorsForfait::class,'idDeclaration');
    }
}
