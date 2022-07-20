<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $hidden =[
        'id',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'key',
        'name'
    ];

    protected $casts = [
        'key' => 'integer',
        'name' => 'string'
    ];
}
