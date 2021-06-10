@extends('layouts.layout')

@section('css')
    <link href="{{ URL::asset('css/showall.css') }}" rel="stylesheet">
@endsection

@section('title')
    Consultation
@endsection

@section('content')
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Déclaration de frais</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Date</th>
                                            <th>Nombre lignes de frais</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($declarations as $declaration)
                                        <tr>
                                            <td><a class="rowlink" href="{{ route('showdeclaration',['id'=>$declaration->id]) }}">{{$declaration->user->firstname.' '.$declaration->user->name}}</a></td>
                                            <td>{{$declaration->dateDeclaration}}</td>
                                            <td>{{count($declaration->lignesFraisForfait)+count($declaration->lignesFraisHorsForfait)}}</td>
                                            @if ($declaration->idEtat == 1)
                                                <td><span class="badge badge-warning">{{$declaration->etat->libelle}}</span></td>
                                            @elseif ($declaration->idEtat == 2)
                                                <td><span class="badge badge-success">{{$declaration->etat->libelle}}</span></td>
                                            @endif
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection
