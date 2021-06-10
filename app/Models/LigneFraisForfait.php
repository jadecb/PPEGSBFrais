<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneFraisForfait extends Model
{
    use HasFactory;
    protected $table = 'lignefraisforfait';

    public function typeFrais(){
        return $this->hasOne(FraisForfait::class,'id','idFraisForfait');
    }
}
