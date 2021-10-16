<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'title',
        'name_eng',
        'name_thai',
        'nationality',
        'dob',
        'age',
        'pob',
        'headcount',
        'cost',
        'pos_title',
        'address',
        'job_file',
        'job_path',
        'organization_file',
        'organization_path',
        'resume_file',
        'resume_path',
        'education_file',
        'education_path',
        'employment_file',
        'employment_path',
        'photo_file',
        'photo_path',
        'status',
        'submit_name'

    ];
    protected $primaryKey = 'Eid';
    public $timestamps=true;

    
}
