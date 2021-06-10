<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class HelperDateFormat
{
    public static function replaceMonthToFR(string $date){
        //strtr(date('F Y',strtotime($declaration->dateDeclaration)),array('December'=>'Décembre'))
        $search = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $replace = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');

        return str_replace($search,$replace,date('F Y',strtotime($date)));
    }
}
