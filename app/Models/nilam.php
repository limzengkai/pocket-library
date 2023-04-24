<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class nilam extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'nilam';
    protected $primaryKey = 'id';
    protected $fillable = [
        'StudentID',
        'title',
        'type',
        'date',
        'language',
        'publisher',
        'author',
        'yearofpublication',
        'NoofPages',
        'summary',
        'status'
    ];

}
