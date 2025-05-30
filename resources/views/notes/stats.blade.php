{{-- resources/views/notes/stats.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Statistiques des Notes</title>
</head>
<body>
    <h1>Statistiques des Notes</h1>

    <p>Moyenne générale : {{ $moyenneGenerale ?? 'N/A' }}</p>

    @if($topEtudiant)
        <h2>Top Étudiant</h2>
        <p>Nom : {{ $topEtudiant->nom }}</p>
        <p>Moyenne : {{ number_format($topEtudiant->moyenne, 2) }}</p>
    @else
        <p>Aucun étudiant trouvé.</p>
    @endif
</body>
</html>
