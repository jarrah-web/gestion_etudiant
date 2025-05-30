<!-- resources/views/notes/index.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Liste des étudiants avec leurs notes</h1>

    @foreach($etudiants as $etudiant)
        <h2>{{ $etudiant->nom }} {{ $etudiant->prenom }}</h2>
        <ul>
            @foreach($etudiant->notes as $note)
                <li>{{ $note->evaluation->nom }} : {{ $note->valeur }}</li>
            @endforeach
        </ul>
    @endforeach

</body>
</html>
