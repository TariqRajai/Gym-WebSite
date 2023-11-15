<?php

namespace App\Http\Controllers;
use App\Models\sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function renderForm()
{
    $sports = Sport::pluck('LibelleS','CodeS'); // Retrieve the names of all sports from the database

    return view('Registration', compact('sports'));
}
public function saveSport(Request $request)
{
    $request->validate([
        'libelleS' => 'required',
    ]);

    // Create a new sport
    $sport = Sport::create([
        'LibelleS' => $request->libelleS,
    ]);

    return redirect('admin/addSport')->with('success', 'Sport Added!');
}
public function updateSport(Request $request, $id)
{
    $request->validate([
        'libelleS' => 'required',
        'NbMembre' => 'required',

    ]);

    $sport = Sport::findOrFail($id);
    $sport->LibelleS = $request->input('libelleS');
    $sport->NbMembre = $request->input('NbMembre');

    $sport->save();

    return redirect('admin/addSport')->with('success', 'Sport Updated!');
}
public function destroySport($id)
    {
        // Find the sport by ID
        $sport = sport::find($id);

        // Check if the sport exists
        if (!$sport) {
            return redirect()->route('admin.addSport')->with('error', 'sport not found.');
        }

        // Delete the sport
        $sport->delete();

        // Redirect back with success message
        return redirect()->route('admin.addSport')->with('success', 'sport deleted successfully.');
    }

}
