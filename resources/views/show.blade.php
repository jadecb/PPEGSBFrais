@extends('layouts.layout')

@section('title')
    Consultation
@endsection

@section('content')
    <div class="top" style="display:flex; justify-content: space-between;">
        <h4>{{\App\Helpers\HelperDateFormat::replaceMonthToFR($declaration->dateDeclaration)}}</h4>

        @if ($declaration->idEtat == 1)
            <h4><span class="badge badge-warning">{{$declaration->etat->libelle}}</span></h4>
        @elseif ($declaration->idEtat == 2)
            <h4><span class="badge badge-success">{{$declaration->etat->libelle}}</span></h4>
        @endif

        @if(\Illuminate\Support\Facades\Auth::user()->role->libelle == 'Comptable' && $declaration->idEtat == 1)
            <h4><a href="{{route('validatedeclaration',['id'=>$declaration->id])}}" class="badge badge-info">Valider déclaration</a></h4>
        @endif
    </div>
    <h4><b>Frais Forfaitaires</b></h4>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Quantite</th>
            <th>Coût unitaire</th>
            <th>Coût total</th>
            <th>Validé</th>
        </tr>
        </thead>
        <tbody>
        @foreach($declaration->lignesFraisForfait as $fraisForfait)
        <tr>
            <th>{{$fraisForfait->typeFrais->libelle}}</th>
            <td>{{$fraisForfait->quantite}}</td>
            <td>{{$fraisForfait->typeFrais->montant}}€</td>
            <td>{{$fraisForfait->typeFrais->montant*$fraisForfait->quantite}}€</td>
            @if ($fraisForfait->valide == 0)
                <td><i class="fa fa-times" style="color:red;"></i></td>
            @elseif ($fraisForfait->valide == 1)
                <td><i class="fa fa-check" style="color:green;"></i></td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>

    <h4><b>Frais Hors Forfait</b></h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Coût</th>
            <th>Date</th>
            <th>Validé</th>
        </tr>
        </thead>
        <tbody>
        @foreach($declaration->lignesFraisHorsForfait as $fraisHorsForfait)
            <tr>
                <th>{{$fraisHorsForfait->libelle}}</th>
                <td>{{$fraisHorsForfait->montant}}€</td>
                <td>{{$fraisHorsForfait->date}}</td>
                @if ($fraisHorsForfait->valide == 0)
                    <td><i class="fa fa-times" style="color:red;"></i></td>
                @elseif ($fraisHorsForfait->valide == 1)
                    <td><i class="fa fa-check" style="color:green;"></i></td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
