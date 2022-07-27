<?php

namespace Database\Seeders;

use App\Models\SettlementType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettlementTypeSeeder extends Seeder
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
                $name = $this->stripAccents($value['d_tipo_asenta']);
                
                $settlement_type = SettlementType::where('name', $name)->first();
                
                if ($settlement_type) continue;

                SettlementType::create([
                    'name' => $name
                ]);
            }
        }
        unset($phpArray);
        unset($xmlString);
        unset($xmlObject);
    }

    function stripAccents($str) {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }
}
