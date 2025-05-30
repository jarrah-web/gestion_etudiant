@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Statistiques des notes</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Nombre total de notes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalNotes }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Note moyenne</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $moyenne }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Meilleure note</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $meilleureNote }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
