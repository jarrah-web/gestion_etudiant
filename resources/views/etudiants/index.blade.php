@extends('layouts.app')

@section('title', 'Liste des étudiants')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des étudiants</h2>
        <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter un étudiant</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de naissance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->date_naissance }}</td>
                    <td>
                        <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <link rel="stylesheet" href="{{ asset('node_modules/admin-lte/dist/css/adminlte.min.css') }}">
                        <form action="{{ route('etudiants.destroy', $etudiant) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer ?')" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
