@extends('layouts.layout')

@section('title')
    Valider
@endsection

@section('content')
    <div class="top" style="display:flex; justify-content: space-between;">
        <h4>{{\App\Helpers\HelperDateFormat::replaceMonthToFR($declaration->dateDeclaration)}}</h4>
        @if ($declaration->idEtat == 1)
            <h4><span class="badge badge-warning">{{$declaration->etat->libelle}}</span></h4>
        @elseif ($declaration->idEtat == 2)
            <h4><span class="badge badge-success">{{$declaration->etat->libelle}}</span></h4>
        @endif
    </div>
    <h4><b>Frais Forfaitaires</b></h4>
    <form id="formfrais" method="POST" action="{{'/validate/'.$declaration->id}}">
        @csrf
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Quantite</th>
            <th>Coût unitaire</th>
            <th>Coût total</th>
            <th>Valider</th>
        </tr>
        </thead>
        <tbody>
        @foreach($declaration->lignesFraisForfait as $fraisForfait)
            <tr>
                <th>{{$fraisForfait->typeFrais->libelle}}</th>
                <td>{{$fraisForfait->quantite}}</td>
                <td>{{$fraisForfait->typeFrais->montant}}€</td>
                <td>{{$fraisForfait->typeFrais->montant*$fraisForfait->quantite}}€</td>
                <td><input name="checkff[]" class="form-check-input" type="checkbox" value="{{$fraisForfait->typefrais->id}}"></td>
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
            <th>Valider</th>
        </tr>
        </thead>
        <tbody>
        @foreach($declaration->lignesFraisHorsForfait as $fraisHorsForfait)
            <tr>
                <th>{{$fraisHorsForfait->libelle}}</th>
                <td>{{$fraisHorsForfait->montant}}€</td>
                <td>{{$fraisHorsForfait->date}}</td>
                <td><input name="checkfhf[]" class="form-check-input" type="checkbox" value="{{$fraisHorsForfait->id}}"></td>
            </tr>
        @endforeach

        </tbody>
    </table>

        <input hidden name="declaration" value="{{$declaration->id}}">
    </form>
    <div class="valider">
        <button class="btn btn-success" type="submit" form="formfrais" value="Submit">Valider Frais</button>
    </div>

@endsection

