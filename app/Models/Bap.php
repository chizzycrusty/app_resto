<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bap extends Model
{
    protected $fillable = ['name', 'NomPrenomCHEF', 'fonctionCHEF', 'adresseCHEF', 'emailCHEF', 'telCHEF', 'NomPrenomCON', 'fonctionCON', 'adresseCON', 'emailCON', 'telCON', 'social', 'type', 'raison', 'contexte', 'objectif', 'contraintes', 'accepted'];
}