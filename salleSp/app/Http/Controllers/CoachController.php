<?php

namespace App\Http\Controllers;
use App\Models\compte; 
use App\Models\Coach;
use App\Models\Avoir;
use App\Models\Concerner;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    //

    public function dashboard()
    {
        $coach = Session::get('coach');
    
        // Check if the coach exists and has the "client" role
        if ($coach && $coach->role === 'coach') {
            // Fetch the admin's data from the database
            $coachData = Compte::find($coach->IdComptes);
           
            $seances = Concerner::join('seances', 'concerners.Id_Seance', '=', 'seances.IdSeance')
            ->join('salles', 'concerners.No_Salle', '=', 'salles.NoSalle')
            ->join('sports', 'concerners.Id_Sport', '=', 'sports.CodeS')
            ->join('participers', 'seances.IdSeance', '=', 'participers.Id_Seance')
            ->join('coaches', 'participers.Id_Coach', '=', 'coaches.IdCoach')
            ->join('comptes', 'coaches.Id_Compte', '=', 'comptes.IdComptes')
            ->select('sports.*', 'seances.*', 'salles.*', 'coaches.*', 'comptes.*')
            ->where('coaches.Id_Compte', $coach->IdComptes)
            ->get();


            
            return view('coach.dashboard', compact('coachData', 'seances'));
        }
    }

    public function saveCoach(Request $request)
{
    $request->validate([
        'email'=>'required|email|unique:comptes',
        'password'=>'required',
        'nom'=>'required',
        'prenom'=>'required',
        'mobile'=>'required',
        'cni'=>'required',
        'gender'=>'required',
        'role'=>'coach',
        'salaire'=>'required',
        'sport'=>'required',

    ]);

    // Create a new coach
    $compte = compte::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'cni' => $request->cni,
        'tele' => $request->mobile,
        'gender' => $request->gender,
        'role'=>'coach',

        ]);
    $comptes = Compte::whereIn('role', ['coach'])->get();
if ($comptes->count() > 0) {
foreach ($comptes as $compte) {
    $existingCoach = Coach::where('Id_Compte', $compte->IdComptes)->first();

    if (!$existingCoach) {
        $coach = new coach();
        $coach->Salaire = $request->salaire;
        $coach->Id_Compte = $compte->IdComptes;
        $coach->save();
    }
}
}
$coaches = coach::all();

            if ($coaches->count() > 0) {
                $existingIdCoachs = Avoir::pluck('Id_Coach')->toArray();
            
                foreach ($coaches as $coach) {
                    if (!in_array($coach->IdCoach, $existingIdCoachs)) {
                        $avoir = new avoir();
                        $avoir->Id_Coach = $coach->IdCoach;
                        $avoir->Code_S = $request->sport;
                        $avoir->save();
                        $existingIdCoachs[] = $coach->IdCoach;
                    }
                }
            }

    return redirect('admin/addCoach')->with('flash_message', 'Coach Added!');
}

////////////////////////////edit the client
public function updateCoach(Request $request, $id)
{
    $request->validate([
        'nom' => 'required',
        'email' => 'required|email',
        'nom' =>'required',
        'prenom' => 'required',
        'cni' => 'required',
        'tele' =>'required', 
        'Salaire'=>'required',
       ]);

    $coach = compte::findOrFail($id);
    $coach->nom = $request->input('nom');
    $coach->email = $request->input('email');
    $coach->prenom = $request->input('prenom');
    $coach->cni = $request->input('cni');
    $coach->tele = $request->input('tele');
    $coach->save();
    $salaire=coach::findOrFail($id);
    
    $salaire->Salaire = $request->input('Salaire');
    $salaire->save();
    return redirect(url('admin/addCoach'))->with('success', 'Coach updated successfully');
}

public function destroyCoach($id)
    {
        // Find the coach by ID
        $coach = compte::find($id);
        $salaire = coach::find($id);
        $idCoach = Coach::where('Id_Compte', $id)->get('IdCoach');
                // Check if the coach exists
        if (!$coach) {
            return redirect(url('admin/addCoach'))->with('error', 'coach not found.');
        }

        // Delete the coach
        $coach->delete();
        $salaire->delete();
        Avoir::where('Id_Coach', $idCoach)->delete();

        // Redirect back with success message
        return redirect(url('admin/addCoach'))->with('success', 'coach deleted successfully.');
    }
    public function profile()
{
    $coach = Session::get('coach');
    $coachData = Compte::find($coach->IdComptes);
     
    
    
    return view('coach.profile', compact('coachData'));
}
public function updateProfile(Request $request)
    {
        $coach = Session::get('coach');
        $coachData = Compte::find($coach->IdComptes);

        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'cni' => 'required|string',
            'tele' => 'required|string',
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            
        ]);
        
        $coachData->nom = $validatedData['nom'];
        $coachData->prenom = $validatedData['prenom'];
        $coachData->cni = $validatedData['cni'];
        $coachData->tele = $validatedData['tele'];
        $coachData->email = $validatedData['email'];
        if (!Hash::check($validatedData['current_password'], $coachData->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        $coachData->password = Hash::make($validatedData['new_password']);
        $coachData->save();

    return redirect(url('coach/profile'))->with('success', 'Profile updated successfully');
}
}
