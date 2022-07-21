<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function show($id)
    { 
        $zip_code = ZipCode::where('zip_code', $id)->first();
        if (!$zip_code) return json_encode('Not found');
        $zip_code->load([
            'federalEntity',
            'settlements',
            'municipality'
        ]);

        return response()->json([
            $zip_code
        ]);

    }
}
