<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headcount extends Model
{
    use HasFactory;

    protected $table = 'std_headcounts';
    protected $fillable = [
        'count_name'
    ];
    protected $primaryKey = 'count_id';
    public $timestamps=false;
}
