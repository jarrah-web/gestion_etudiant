@extends('layouts.app')

@section('title', 'Liste des évaluations')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des évaluations</h2>
        <a href="{{ route('evaluations.create') }}" class="btn btn-primary">Ajouter une évaluation</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->id }}</td>
                    <td>{{ $evaluation->titre }}</td>
                    <td>{{ $evaluation->date->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($evaluation->type) }}</td>
                    <td>
                        <a href="{{ route('evaluations.edit', $evaluation) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('evaluations.destroy', $evaluation) }}" method="POST" style="display:inline-block;">
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
