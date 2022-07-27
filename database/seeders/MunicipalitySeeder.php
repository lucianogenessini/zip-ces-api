<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
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
                $municipality_name = $this->stripAccents($value['D_mnpio']);
                $municipality_name = mb_strtoupper($municipality_name);
                $municipality = Municipality::where('key', $value['c_mnpio'])->where('name', $municipality_name)->first();
                
                if ($municipality) continue;

                Municipality::create([
                    'key' => $value['c_mnpio'],
                    'name' => $municipality_name
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
