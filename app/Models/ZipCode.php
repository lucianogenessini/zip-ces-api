<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $hidden =[
        'id',
        'key',
        'municipality_id',
        'federal_entity_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'key',
        'zip_code',
        'locality',
        'municipality_id',
        'federal_entity_id'
    ];

    protected $casts = [
        'key' => 'integer',
        'zip_code' => 'string',
        'locality' => 'string',
        'municipality_id' => 'integer',
        'federal_entity_id' => 'integer',
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function federalEntity()
    {
        return $this->belongsTo(FederalEntity::class);
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }

}
