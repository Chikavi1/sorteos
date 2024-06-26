<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteos extends Model
{
    protected $table = 'Sorteos';

    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'title',
        'cta',
        'description',
        'tickets',
        'end_date',
        'status',
        'end_date',
        'winner',
        'pricing',
        'limit_tickets'
    ];
}
