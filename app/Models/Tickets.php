<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;


    protected $fillable = [
        'folio',
        'name',
        'cellphone',
        'id_sorteo',
        'city',
        'status'
    ];
}
