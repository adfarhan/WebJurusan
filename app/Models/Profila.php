<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profila extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'angkatan',
        'pekerjaan',
        'cerita_sukses',
        'foto',
    ];
}
