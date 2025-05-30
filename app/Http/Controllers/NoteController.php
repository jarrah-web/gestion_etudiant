<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Note;      
use App\Models\Evaluation;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Affiche la liste des étudiants avec leurs notes (index)
    public function index()
    {
        // Charge les étudiants avec leurs notes et les évaluations liées
        $etudiants = Etudiant::with('notes.evaluation')->get();
        return view('notes.index', compact('etudiants'));
    }

    // Affiche le formulaire pour saisir des notes
    public function create()
    {
        $etudiants = Etudiant::all();
        $evaluations = Evaluation::all();
        return view('notes.create', compact('etudiants', 'evaluations'));
    }

    // Enregistre les notes envoyées par le formulaire
    public function store(Request $request)
    {
        $evaluationId = $request->input('evaluation_id');
        $notes = $request->input('notes');

        foreach ($notes as $etudiantId => $valeur) {
            Note::updateOrCreate(
                ['evaluation_id' => $evaluationId, 'etudiant_id' => $etudiantId],
                ['valeur' => $valeur]  // Assure-toi que dans ta table la colonne s'appelle 'valeur' et pas 'note'
            );
        }

        return redirect()->route('evaluations.show', $evaluationId)
                         ->with('success', 'Notes enregistrées avec succès.');
    }

    // Affiche des statistiques globales sur les notes
    public function statistiques()
    {
        $notes = Note::all();
        $moyenneGenerale = $notes->avg('valeur'); // colonne 'valeur' et non 'note'

        $topEtudiant = Etudiant::with('notes')
            ->get()
            ->map(function ($etudiant) {
                $etudiant->moyenne = $etudiant->notes->avg('valeur'); // colonne 'valeur'
                return $etudiant;
            })
            ->sortByDesc('moyenne')
            ->first();

        return view('notes.stats', compact('moyenneGenerale', 'topEtudiant'));
    }
}
