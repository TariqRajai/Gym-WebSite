<?php

namespace App\Http\Controllers;
use App\Models\Salle;
use App\Models\Concerner;

use Illuminate\Http\Request;

class SalleController extends Controller
{
    //
    public function saveSalle(Request $request)
{
    $request->validate([
        'NomSalle' => 'required',
        'capacite'=>'required',
        
    ]);

    // Create a new sport
    $salle = Salle::create([
        'NomSalle' => $request->NomSalle,
        'Capacite'=> $request->capacite,
    ]);
    

    return redirect('admin/addSalle')->with('flash_message', 'Salle Added!');
}
public function updateSalle(Request $request, $id)
{
    $request->validate([
        'NomSalle' => 'required',
        'Capacite' => 'required',
        

    ]);

    $salle = salle::findOrFail($id);
    $salle->NomSalle = $request->input('NomSalle');
    $salle->Capacite = $request->input('Capacite');
    $salle->save();
    


    return redirect('admin/addSalle')->with('flash_message', 'Salle Updated!');
}
public function destroySalle($id)
    {
        // Find the Salle by ID
        $salle = salle::find($id);

        // Check if the salle exists
        if (!$salle) {
            return redirect()->route('admin.addSalle')->with('error', 'Salle not found.');
        }

        // Delete the Salle
        $salle->delete();
        
        // Redirect back with success message
        return redirect()->route('admin.addSalle')->with('success', 'Salle deleted successfully.');
    }
}
