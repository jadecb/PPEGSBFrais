@extends('layouts.layout')

@section('css')
<link href="css/styleDeclaration.css" rel="stylesheet">
@endsection

@section('title')
Nouvelle déclaration
@endsection

@section('content')
    <!--Affiche Mois et année en français-->
    <h2>{{\App\Helpers\HelperDateFormat::replaceMonthToFR(date('F Y',strtotime(\Carbon\Carbon::now())))}}</h2>
                    <form id="formfrais" method="POST" action="declare">
                        @csrf
                    	<div class="row justify-content-center">
		                    <div class="card col-lg-3" >
							  <div class="card-body">
							    <i class="fas fa-hotel fa-3x"></i>
							    <h5 class="card-title">Nuits hôtel</h5>
							    <input name="hotel" class = "form-control" type="number" required min="0">
							  </div>
							</div>

							<div class="card col-lg-3" >
							  <div class="card-body">
							    <i class="fas fa-utensils fa-3x"></i>
							    <h5 class="card-title">Repas</h5>
							    <input name="repas" class = "form-control" type="number" required min="0">
							  </div>
							</div>

							<div class="card col-lg-3" >
							  <div class="card-body">
							    <i class="fas fa-car fa-3x"></i>
							    <h5 class="card-title">Kilomètres</h5>
							    <input name="km" class = "form-control" type="number" required min="0">
							  </div>
							</div>
						</div>

						<div class="row justify-content-center">
							<a class="btn btn-primary" href="#" role="button" id="btn-add">Ajouter Hors Forfait</a>
							<a class="btn btn-danger" href="#" role="button" id="btn-remove">Supprimer Hors Forfait</a>
						</div>


					<input type="number" name="hfNum" hidden value="0" id="hfNum">

					</form>
					<div class="valider">
						<button class="btn btn-success" type="submit" form="formfrais" value="Submit">Valider Déclaration</button>
					</div>


@endsection



@section('js')

<script>
    $(document).ready(function () {
        $('#btn-add').on('click', function () {

        	nbOfInput = $('.hfNum').attr('value');

        	form = $('#formfrais');

        	element = '<div class="row justify-content-center fhf"><div class="col-lg-5">' +
                '<label for="libelle">Libellé frais</label><input name="libellehf[]" type="text" class="form-control" id="libelle"></div>' +
                '<div class="col-lg-2"><label for="montant">Montant</label>' +
                '<input name="montant[]" class = "form-control" type="number" step="0.01" id="montant"></div>'+
                '<div class="col-lg-2"><label for="date">Date</label>'+
                '<input name="date[]" class = "form-control" type="date" id="montant"></div></div><hr>';

        	form.append(element);

        });
    });

    $(document).ready(function () {
        $('#btn-remove').on('click', function () {

			$('#formfrais .fhf:last').remove()
			$('#formfrais hr:last').remove()

        });
    });
</script>

@endsection
