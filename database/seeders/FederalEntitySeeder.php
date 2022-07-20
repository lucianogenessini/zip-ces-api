<?php

namespace Database\Seeders;

use App\Models\FederalEntity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FederalEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set("memory_limit", "-1");

        $xmlString = file_get_contents(storage_path('data_seeder/CPdescarga.xml'));
        $xmlObject = @simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 

        foreach ($phpArray as $item){
            foreach ($item as $key=>$value){
                
                $federal_entity = FederalEntity::where('key', $value['c_estado'])->first();

                if ($federal_entity) continue;

                FederalEntity::create([
                    'key' => $value['c_estado'],
                    'name' => mb_strtoupper($value['d_estado']),
                    'code' => null
                ]);
            }
        }
        unset($phpArray);
        unset($xmlString);
        unset($xmlObject);
    
    }
}
