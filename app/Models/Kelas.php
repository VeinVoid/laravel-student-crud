<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'school_id',
        'name'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'id_kelas');
    }
}
