<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller

  {
    public function index()
    {
        $etudiants = Etudiant::with('notes.evaluation')->get();
        return view('notes.index', compact('etudiants'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $evaluations = Evaluation::all();
        return view('notes.create', compact('etudiants', 'evaluations'));
    }

    public function store(Request $request)
    {
        Note::create($request->all());
        return redirect()->route('notes.index');
    }

    public function statistiques()
    {
        $notes = Note::all();
        $moyenneGenerale = $notes->avg('note');

        $topEtudiant = Etudiant::with('notes')
            ->get()
            ->map(function ($etudiant) {
                $etudiant->moyenne = $etudiant->notes->avg('note');
                return $etudiant;
            })
            ->sortByDesc('moyenne')
            ->first();

        return view('notes.stats', compact('moyenneGenerale', 'topEtudiant'));
    }

}
