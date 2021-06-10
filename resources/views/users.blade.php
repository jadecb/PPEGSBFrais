@extends('layouts.layout')

@section('css')
    <link href="{{ URL::asset('css/showall.css') }}" rel="stylesheet">
@endsection

@section('title')
    Consultation des users
@endsection

@section('content')
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Utilisateur de l'application</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Date Inscription</th>
                        <th>Role</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->role->libelle}}</td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
