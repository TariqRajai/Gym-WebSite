<?php

namespace App\Http\Controllers;
use App\Models\compte; 
use App\Models\Client;
use App\Models\Acceder;
use App\Models\Abonner;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    //




    
    
 public function dashboard()
    {
        $client = Session::get('user');
    
        // Check if the client exists and has the "client" role
        if ($client && $client->role === 'user') {
            // Fetch the admin's data from the database
            $clientData = Compte::find($client->IdComptes);
           
            $abonnements = Abonner::where('Id_Client', $client->IdComptes)
        ->join('type_abonnements', 'abonners.Code_Abo', '=', 'type_abonnements.CodeAbo')
        ->join('acceders', 'type_abonnements.CodeAbo', '=', 'acceders.Code_Abo')
        ->join('sports', 'acceders.code_s', '=', 'sports.CodeS')
        ->select('abonners.*', 'type_abonnements.libelleAbo', 'acceders.TarifMois', 'type_abonnements.DureeMois', 'sports.LibelleS')
        ->get();
        foreach ($abonnements as $abonnement) {
            $startDate = Carbon::parse($abonnement->DateDebut);
            $endDate = $startDate->copy()->addMonths($abonnement->DureeMois);
            $abonnement->endDate = $endDate;
        }
            return view('user.dashboard', compact('clientData', 'abonnements'));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
{
    $request->validate([
        'email'=>'required|email|unique:comptes',
        'password'=>'required',
        'nom'=>'required',
        'prenom'=>'required',
        'tele'=>'required',
        'cni'=>'required',
        'gender'=>'required',
        'etat'=>'required',
    ]);
    $requestData = $request->all();
    $requestData['password'] = Hash::make($request->password);
    
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images');
        $requestData['image'] = str_replace('public/storage/', '', $path);
    }
    
    
    $createdCompte = compte::create($requestData);
    $createdCompte->save();


        $comptes = Compte::whereIn('role', ['user'])->get();
    // Check if the compte exists
if ($comptes->count() > 0) {
// Loop through each compte and create a new client record if the Id_Compte doesn't already exist
foreach ($comptes as $compte) {
    $existingClient = Client::where('Id_Compte', $compte->IdComptes)->first();

    if (!$existingClient) {
        $client = new Client();
        $client->etat = $request->etat;
        $client->Id_Compte = $compte->IdComptes;
        $client->save();
    }
}
}

    return redirect('admin/addUser')->with('flash_message', 'User Added!');
}
////////////////////////////edit the client
public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'tele' => 'required',
        'cni' => 'required',
        'email' => 'required|email',
        'etat' => 'required',

    ]);

    $client = compte::findOrFail($id);
    $client->nom = $request->input('nom');
    $client->prenom = $request->input('prenom');
    $client->tele = $request->input('tele');
    $client->cni = $request->input('cni');
    $client->email = $request->input('email');
    $client->save();

    $etat= client::findOrFail($id);
    $etat->etat = $request->input('etat');
    $etat->save();



    return redirect(url('admin/addUser'))->with('success', 'Client updated successfully');
}
public function destroy($id)
    {
        // Find the client by ID
        $client = compte::find($id);
        $etat = client::find($id);

        // Check if the client exists
        if (!$client) {
            return redirect()->route('admin.addUser')->with('error', 'Client not found.');
        }

        // Delete the client
        $client->delete();
        $etat->delete();

        // Redirect back with success message
        return redirect()->route('admin.addUser')->with('success', 'Client deleted successfully.');
    }

/////////////////////////////////chooseABo
public function chooseAbo()
{
    $client = Session::get('user');
    
        // Check if the client exists and has the "client" role
        if ($client && $client->role === 'user') {
            // Fetch the admin's data from the database
            $clientData = Compte::find($client->IdComptes);
            $acceders = Acceder::with('typeAbo', 'sport')->get();

        return view('user.chooseAbo', compact('clientData', 'acceders'));}
}
public function profile()
{
    $client = Session::get('user');
    $clientData = Compte::find($client->IdComptes);
     
    
    
    return view('user.profile', compact('clientData'));
}
public function updateProfile(Request $request)
    {
        $client = Session::get('user');
        $clientData = Compte::find($client->IdComptes);

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
        
        $clientData->nom = $validatedData['nom'];
        $clientData->prenom = $validatedData['prenom'];
        $clientData->cni = $validatedData['cni'];
        $clientData->tele = $validatedData['tele'];
        $clientData->email = $validatedData['email'];
        if (!Hash::check($validatedData['current_password'], $clientData->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        $clientData->password = Hash::make($validatedData['new_password']);
        $clientData->save();

    return redirect(url('user/profile'))->with('success', 'Profile updated successfully');
}
}