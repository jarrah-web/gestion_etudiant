@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une nouvelle évaluation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="intitule" class="form-label">Intitulé</label>
            <input type="text" name="intitule" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée (minutes)</label>
            <input type="number" name="duree" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
