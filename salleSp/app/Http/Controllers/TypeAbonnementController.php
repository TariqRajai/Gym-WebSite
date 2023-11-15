<?php

namespace App\Http\Controllers;
use App\Models\TypeAbonnement;
use App\Models\Acceder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeAbonnementController extends Controller
{
   
    public function saveAbonnement(Request $request)
{
    $request->validate([
        'LibelleAbo' => 'required',
        'DureeMois'=>'required',
        'tarif'=>'required',
        'sport'=>'required'
    ]);
    // Create a new abonnement
    $abonnement = TypeAbonnement::create([
        'LibelleAbo' => $request->LibelleAbo,
        'DureeMois'=> $request->DureeMois,
            ]);
            $abonnements = TypeAbonnement::all();

            if ($abonnements->count() > 0) {
                $existingCodeAbos = Acceder::pluck('Code_Abo')->toArray();
            
                foreach ($abonnements as $abonnement) {
                    if (!in_array($abonnement->CodeAbo, $existingCodeAbos)) {
                        $acceder = new Acceder();
                        $acceder->Code_Abo = $abonnement->CodeAbo;
                        $acceder->code_s = $request->sport;
                        $acceder->TarifMois = $request->tarif;
                        $acceder->save();
                        $existingCodeAbos[] = $abonnement->CodeAbo;
                    }
                }
            }
    return redirect('admin/abonnements')->with('flash_message', 'Sport Added!');
}
public function updateAbonnement(Request $request, $id)
{
    $request->validate([
        'libelleAbo' => 'required',
        'DureeMois' => 'required',
        'tarif' => 'required',
    ]);

    $abonnement = TypeAbonnement::findOrFail($id);
    $abonnement->LibelleAbo = $request->input('libelleAbo');
    $abonnement->DureeMois = $request->input('DureeMois');
    $abonnement->save();

    $acceder = Acceder::where('Code_Abo', $id)->firstOrFail();
$acceder->TarifMois = $request->input('tarif');
$acceder->save();

    return redirect()->route('admin.abonnements')->with('flash_message', 'Sport Updated!');
}


public function destroyAbonnement($id)
    {
        // Find the abonnement by ID
        $abonnement = TypeAbonnement::find($id);
        // Check if the abonnement exists
        if (!$abonnement) {
            return redirect()->route('admin.abonnements')->with('error', 'abonnement not found.');
        }

        // Delete the abonnement
        $abonnement->delete();
        Acceder::where('Code_Abo', $id)->delete();        

        // Redirect back with success message
        return redirect()->route('admin.abonnements')->with('success', 'abonnement deleted successfully.');
    }
}
