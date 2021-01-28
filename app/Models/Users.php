<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // use HasFactory;

    protected $table = 'usuarios';
    public $timestamps = true;

    
    protected $fillable = [
        'name',
        'email',
        'description',
        'created_at'
    ];
}