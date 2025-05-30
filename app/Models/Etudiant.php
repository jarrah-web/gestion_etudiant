<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

     protected $fillable = ['prenom', 'nom', 'date_naissance'];

     
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
