<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Abonner;
use App\Models\Sport;
class AbonnerController extends Controller
{
    //
    public function store(Request $request)
{
    $clientId = session('user')->IdComptes;
    $codeAbo = $request->input('Code_Abo');
    $startDate = now()->toDateString();

    // Check if the client already has an existing subscription with the same start date and code
    $existingSubscription = Abonner::where('Id_Client', $clientId)
        ->where('DateDebut', $startDate)
        ->where('Code_Abo', $codeAbo)
        ->first();

    if ($existingSubscription) {
        // Subscription with the same start date and code already exists for the client
        return back()->with('error', 'You have already subscribed to this plan with the same start date.');
    }

    // Create a new Abonner record
    $abonner = new Abonner;
    $abonner->DateDebut = $startDate;
    $abonner->Code_Abo = $codeAbo;
    $abonner->Id_Client = $clientId;
    $abonner->save();

    // Increment the NbMembre column in the sports table
    $codeS = $request->input('code_s');
    Sport::where('CodeS', $codeS)->increment('NbMembre');

    // Redirect back or to a success page
    return back()->with('success', 'Abonnement added successfully!');
}
}
