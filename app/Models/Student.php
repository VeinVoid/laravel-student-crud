<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'NIS',
        'name',
        'tahun_lahir',
        'kelas',
        'alamat',
        'image',
        'quotes'
    ];
}
