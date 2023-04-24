<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'] ;
    protected $fillable = [
        'Name',
        'student_id',
        'date',
        'timein',
    ];
}
