<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    protected $table = 'std_nationalities';
    protected $fillable = [
        'nation_name'
    ];
    protected $primaryKey = 'nation_id';
    public $timestamps=false;
}
