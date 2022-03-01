<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pns extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'gol',
        'eselon',
        'jabatan',
        'tempat_tugas',
        'agama',
        'unit_kerja',
        'no_hp',
        'npwp',
    ];

    public function userpns()
    {
        return $this->belongsTo(UserPns::class);
    }
}
