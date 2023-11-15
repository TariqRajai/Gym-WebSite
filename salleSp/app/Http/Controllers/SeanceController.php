<?php

namespace App\Http\Controllers;
use App\Models\Seance;
use App\Models\concerner;
use App\Models\Participer;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function saveSeance(Request $request)
{
    $request->validate([
        'dateDebut' => [
            'required',
            Rule::unique('seances', 'dateDebut')->where(function ($query) use ($request) {
                $selectedDateTime = Carbon::parse($request->input('dateDebut'));
                return $query->where('dateDebut', $selectedDateTime);
            })->ignore($request->seance ? $request->seance->IdSeance : null),
        ],
        'dateFin' => 'required',
    ]);

    $seance = new Seance();
    $seance->dateDebut = Carbon::parse($request->input('dateDebut'))->format('l');
    $seance->timeDebut = Carbon::parse($request->input('dateDebut'))->format('H:i:s');
    $seance->dateFin = Carbon::parse($request->input('dateFin'))->format('l');
    $seance->timeFin = Carbon::parse($request->input('dateFin'))->format('H:i:s');
    $seance->save();

    $seances = Seance::all();

    if ($seances->count() > 0) {
        $existingIdSeance = Concerner::pluck('Id_Seance')->toArray();

        foreach ($seances as $seance) {
            if (!in_array($seance->IdSeance, $existingIdSeance)) {
                $concerner = new Concerner();
                $concerner->Id_Seance = $seance->IdSeance;
                $concerner->Id_Sport = $request->sport;
                $concerner->No_Salle = $request->salle;

                $concerner->save();
                $existingIdSeance[] = $seance->IdSeance;
            }
        }
    }
    if ($seances->count() > 0) {
        $existingIdSeance = Participer::pluck('Id_Seance')->toArray();

        foreach ($seances as $seance) {
            if (!in_array($seance->IdSeance, $existingIdSeance)) {
                $participer = new Participer();
                $participer->Id_Seance = $seance->IdSeance;
                $participer->Id_Coach = $request->coach;
                

                $participer->save();
                $existingIdSeance[] = $seance->IdSeance;
            }
        }
    }

    return redirect()->route('admin.seance')->with('success', 'seance added');
}
public function updateSeance(Request $request, $id)
{
    $request->validate([
        'dateDebut' => [
            'required',
            Rule::unique('seances', 'dateDebut')->where(function ($query) use ($request) {
                $selectedDateTime = Carbon::parse($request->input('dateDebut'));
                return $query->where('dateDebut', $selectedDateTime);
            })->ignore($request->seance ? $request->seance->IdSeance : null),
        ],
        'dateFin' => 'required',
    ]);

    $seance = Seance::findOrFail($id);
    $seance->dateDebut = Carbon::parse($request->input('dateDebut'))->format('l');
    $seance->timeDebut = Carbon::parse($request->input('dateDebut'))->format('H:i:s');
    $seance->dateFin = Carbon::parse($request->input('dateFin'))->format('l');
    $seance->timeFin = Carbon::parse($request->input('dateFin'))->format('H:i:s');
    $seance->save();


    $concerner = Concerner::where('Id_Seance', $id)->firstOrFail();
    $concerner->Id_Sport = $request->input('sport');
    $concerner->No_Salle = $request->input('salle');
    $concerner->save();

$concerner->save();
    
    $participer = Participer::where('Id_Seance', $id)->firstOrFail();
     $participer->Id_Coach = $request->coach;
     $participer->save();

    return redirect('admin/seance')->with('success', 'SeanceUpdated!');
}
public function destroySeance($id)
    {
        $seance = Seance::find($id);

        // Check if the seance exists
        if (!$seance) {
            return redirect()->route('admin.seance')->with('error', 'seance not found.');
        }

        // Delete the seance
        $seance->delete();
        Concerner::where('Id_Seance', $id)->delete();        
        Participer::where('Id_Seance', $id)->delete();        

        return redirect()->route('admin.seance')->with('success', 'Seance deleted successfully.');
    }

}
