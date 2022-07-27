<?php

namespace Database\Seeders;

use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettlementSeeder extends Seeder
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
                $settlement_type_name = $this->stripAccents($value['d_tipo_asenta']);
                $settlement_type = SettlementType::where('name', $settlement_type_name)->first();

                $zip_code = ZipCode::where('zip_code', $value['d_codigo'])->first();

                $name = $this->stripAccents($value['d_asenta']);
                $zone_type = $this->stripAccents($value['d_zona']);

                Settlement::firstOrCreate([
                    'key' => $value['id_asenta_cpcons'],
                    'name' => mb_strtoupper($name),
                    'zone_type' => mb_strtoupper($zone_type),
                    'settlement_type_id' => $settlement_type->id,
                    'zip_code_id' => $zip_code->id
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
