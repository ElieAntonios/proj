<?php

namespace App\Http\Controllers;

use App\Models\Drug;

class DrugController extends Controller
{
    // List all drugs
    public function index()
    {
        $drugs = Drug::all();
        return response()->json($drugs);
    }

    // Get details of a specific drug
    public function show($drug_id)
    {
        $drug = Drug::findOrFail($drug_id);
        return response()->json($drug);
    }
}
