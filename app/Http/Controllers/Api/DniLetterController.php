<?php

namespace App\Http\Controllers\Api;

use App\Models\DniLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DniLetterController extends Controller
{
    public function calculate(Request $request)
    {
        $number = $request->input('number');

        if (!is_numeric($number) || $number < 0 || $number > 99999999) {
            return response()->json(['error' => 'El dato introducido es incorrecto. Debe ser un número entre 0 y 99999999.'], 400);
        }

        $index = $number % 23;

        $letter = DniLetter::where('index', $index)->first();

        if ($letter) {
            return response()->json(['letter' => $letter->letter]);
        } 
        
        if (!$letter) {
            return response()->json(['error' => 'No se pudo encontrar la letra correspondiente.'], 500);
        }
    }
}
