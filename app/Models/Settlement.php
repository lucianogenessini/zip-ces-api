<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $appends = ['settlement_type'];
    protected $hidden =[
        'id',
        'created_at',
        'updated_at',
        'zip_code_id',
        'settlement_type_id'    
    ];

    protected $fillable = [
        'key',
        'name',
        'zone_type',
        'settlement_type_id',
        'zip_code_id'
    ];

    protected $casts = [
        'key' => 'integer',
        'name' => 'string',
        'zone_type' => 'string',
        'settlement_type_id' => 'integer',
        'zip_code_id' => 'integer',
    ];

    public function zipCode()
    {
        return $this->belongsTo(ZipCode::class);
    }

    public function settlementTypeRelation()
    {
        return $this->belongsTo(SettlementType::class, 'settlement_type_id');
    }

    public function getSettlementTypeAttribute(){
        $sett_type = SettlementType::find($this->settlement_type_id);
        return [
            'name' => $sett_type->name,
        ];
    }

}
