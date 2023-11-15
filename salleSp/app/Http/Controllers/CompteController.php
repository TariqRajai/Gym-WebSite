<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\compte;
use App\Models\Client;
use App\Models\Admin;
use App\Models\Coach;
use App\Models\Communiquer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Session;
class CompteController extends Controller
{
    public function login(){
        return view("Login");
    }
    public function registration(){
        return view("Registration");
    }
    public function registerUser(Request $request){
        $request->validate([
           'email'=>'required|email|unique:comptes',
           'password'=>'required',
           'nom'=>'required',
           'prenom'=>'required',
           'tele'=>'required',
           'cni'=>'required',
           'gender'=>'required',

           
        ]);
        $requestData = $request->all();
        
        $requestData['password']=Hash::make($request->password);
        
        if ($request->hasFile('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $requestData['image'] = $path;
        } else {
            $requestData['image'] = 'images/froggy.png'; 
        }
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/storage/images');
            $requestData['image'] = str_replace('public/storage/', '', $path);
        } else {
            $requestData['image'] = 'images/froggy.png'; 
        }
        
        
               
                
        $createdCompte = compte::create($requestData);
        $createdCompte->save();
        
        // Retrieve the compte where role is 'user' 
        $comptes = Compte::whereIn('role', ['user'])->get();
        // Check if the compte exists
if ($comptes->count() > 0) {
    // Loop through each compte and create a new client record if the Id_Compte doesn't already exist
    foreach ($comptes as $compte) {
        $existingClient = Client::where('Id_Compte', $compte->IdComptes)->first();

        if (!$existingClient) {
            $client = new Client();
            $client->Id_Compte = $compte->IdComptes;
            $client->save();
            
        }
        
    }

}



///////////////////////////////admin
$comptes = Compte::whereIn('role', ['admin'])->get();
        // Check if the compte exists
if ($comptes->count() > 0) {
    // Loop through each compte and create a new admin record if the Id_Compte doesn't already exist
    foreach ($comptes as $compte) {
        $existingAdmin = Admin::where('Id_Compte', $compte->IdComptes)->first();

        if (!$existingAdmin) {
            $Admin = new Admin();
            $Admin->Id_Compte = $compte->IdComptes;
            $Admin->save();
        }
        
        
        
    }
}
$comptes = Compte::whereIn('role', ['coach'])->get();
        // Check if the compte exists
if ($comptes->count() > 0) {
    // Loop through each compte and create a new client record if the Id_Compte doesn't already exist
    foreach ($comptes as $compte) {
        $existingCoach = Coach::where('Id_Compte', $compte->IdComptes)->first();

        if (!$existingCoach) {
            $Coach = new Coach();
            $Coach->Id_Compte = $compte->IdComptes;
            $Coach->save();
        }
        
        
        
    }
}

         
         return redirect()->route('login')->with('succes','Registration success.Please Login !');
    }
    public function loginUser(Request $request){
        $request->validate([
         'email'=>'required|email',
           'password'=>'required'
           
        ]);
        $compte = compte::where('email', $request->email)->first();

    if ($compte) {
        if (Hash::check($request->password, $compte->password)) {
            // Set the user ID in the session
            $request->session()->put('user_id', $compte->idComptes);

            // Check the user's role and redirect accordingly
            if ($compte->role === 'admin') {
                // Set the admin data in the session
                $request->session()->put('admin', $compte);

                return redirect()->route('admin.dashboard')->with('success', 'Welcome to the admin dashboard');
            }
            if ($compte->role === 'coach') {
                // Set the admin data in the session
                $request->session()->put('coach', $compte);

                return redirect()->route('coach.dashboard')->with('success', 'Welcome to the coach dashboard');
            }
            
             elseif ($compte->role=== 'user') {
                // Set the user data in the session
                $request->session()->put('user', $compte);

                return redirect()->route('user.dashboard')->with('success', 'Welcome to the user dashboard');
            }
            
            
        } else {
            return back()->with('fail', 'Wrong password');
        }
    } else {
        return back()->with('fail', 'This email is not registered');
    }
}
public function logoutUser(Request $request)
{
    $request->session()->forget('user_id');
    return redirect()->route('login')->with('success', 'Logged out successfully');
}



}
?>