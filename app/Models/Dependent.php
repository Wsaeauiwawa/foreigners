<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    protected $table = 'dependents';
    protected $fillable = [
        'relationship',
        'title',
        'name',
        'nationality',
        'dob',
        'age',
        'pob',
        'photo_file',
        'photo_path',
        'marriage_file',
        'marriage_path',
        'birth_file',
        'birth_path',
        'passport_file',
        'passport_path',
        'Eid',
        'status',
        'submit_name'
    ];
    protected $primaryKey = 'Did';
    public $timestamps=true;
}
