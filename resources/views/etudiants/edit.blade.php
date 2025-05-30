@extends('layouts.app')

@section('title', 'Modifier un étudiant')

@section('content')
<div class="container">
    <h2>Modifier un étudiant</h2>

    <form action="{{ route('etudiants.update', $etudiant) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Prénom *</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $etudiant->prenom) }}" required>
            @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Nom *</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $etudiant->nom) }}" required>
            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Date de naissance *</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance', $etudiant->date_naissance) }}" required>
            @error('da
