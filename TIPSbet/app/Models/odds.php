<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odds extends Model
{
    protected $table = 'odds'; // Nome da tabela no banco de dados

    protected $fillable = [
        'sport_key',
        'sport_title',
        'commence_time',
        'home_team',
        'away_team',
        // ... adicione outros campos conforme necessário
    ];
}
