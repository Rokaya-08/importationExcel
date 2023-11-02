<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;

class ImportController extends Controller
{

    // Ajoutez cette méthode pour afficher la vue d'importation
    public function showImportForm()
    {
        return view('import');
    }

    // Ajoutez cette méthode pour gérer l'importation des données à partir du fichier Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new MembersImport, $file);
            return back()->with('success', 'Importation réussie!');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite lors de l\'importation: ' . $e->getMessage());
        }
    }
}
