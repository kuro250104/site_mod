<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class SearchController extends Controller
{
    public function search(Request $request)
    {
        try {
            $term = $request->input('term');
            Log::info('Terme de recherche : ' . $term);

            $resultats = Worker::where('surname', 'like', '%' . $term . '%')->get();
            Log::info('Requête SQL : ' . Worker::where('surname', 'like', '%' . $term . '%')->toSql());

            return response()->json($resultats);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la recherche : ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la recherche. Veuillez consulter les logs pour plus d\'informations.'], 500);
        }
    }
}



