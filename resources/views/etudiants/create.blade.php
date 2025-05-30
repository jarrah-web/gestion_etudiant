@extends('layouts.app')

@section('title', 'Ajouter un étudiant')

@section('content')
<div class="container">
    <h2>Ajouter un étudiant</h2>

    <form action="{{ route('etudiants.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Prénom *</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
            @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Nom *</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Date de naissance *</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}" required>
            @error('date_naissance') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-success">Enregistrer</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
