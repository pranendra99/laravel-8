<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserPns extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'image',
    ];

}
