<?php

namespace App\Http\Controllers;
use App\Models\compte;
use App\Models\Client;
use App\Models\Coach;
use App\Models\sport;
use App\Models\salle;
use App\Models\Abonner;
use App\Models\acceder;
use App\Models\Seance;
use App\Models\concerner;
use App\Models\avoir;
use App\Models\Participer;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\typeAbonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private function fetchNotifications()
    {
        $newClients = Client::doesntHave('compte')
            ->orWhereHas('compte', function ($query) {
                $query->where('role', 'user');
            })
            ->get();

        $showNotification = $newClients->count() > 0;

        return compact('newClients', 'showNotification');
    }



    public function dashboard()
    {
        $admin = Session::get('admin');

        if ($admin && $admin->role === 'admin') {
            $adminData = Compte::find($admin->IdComptes);
    /////////////////notification
            $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];

            // Retrieve the number of female clients
        $femaleClients = Client::whereHas('compte', function ($query) {
            $query->where('role', 'user');
        })->whereHas('compte', function ($query) {
            $query->where('gender', 'Female');
        })->count();

        // Retrieve the number of male clients
        $maleClients = Client::whereHas('compte', function ($query) {
            $query->where('role', 'user');
        })->whereHas('compte', function ($query) {
            $query->where('gender', 'Male');
        })->count();
$sportCount=sport::count();
$clientCount = Client::whereHas('compte', function ($query) {
    $query->where('role', 'user');
})->count();
        $newClients = Client::with('compte')
    ->whereHas('compte', function ($query) {
        $query->where('role', 'user');
    })
    ->get();

        // Get the sport clients per month data
        $sportClientsPerMonth = [];

            $abonnements = Abonner::join('clients', 'abonners.Id_Client', '=', 'clients.IdClient')
    -> join('type_abonnements', 'abonners.Code_Abo', '=', 'type_abonnements.CodeAbo')
    ->join('acceders', 'type_abonnements.CodeAbo', '=', 'acceders.Code_Abo')
    ->join('sports', 'acceders.code_s', '=', 'sports.CodeS')
    ->select('abonners.*', 'type_abonnements.libelleAbo', 'acceders.TarifMois', 'type_abonnements.DureeMois', 'sports.CodeS','sports.LibelleS')

    ->get();

foreach ($abonnements as $abonnement) {
    $startDate = Carbon::parse($abonnement->DateDebut);
    $endDate = $startDate->copy()->addMonths($abonnement->DureeMois);
    $abonnement->endDate = $endDate;

    // Group the clients by sport and month

    $sportName = $abonnement->LibelleS;
    $month = $startDate->format('Y-m');

    if (!isset($sportClientsPerMonth[$sportName])) {
        $sportClientsPerMonth[$sportName] = [];
    }

    if (!isset($sportClientsPerMonth[$sportName][$month])) {
        $sportClientsPerMonth[$sportName][$month] = 0;
    }

    $sportClientsPerMonth[$sportName][$month]++;
}


        return view('admin.index', compact('adminData','newClients', 'showNotification','femaleClients', 'maleClients','newClients', 'abonnements','sportClientsPerMonth','sportCount','clientCount'));
    }
    }





    public function notifications()
    {
        $admin = Session::get('admin');

        // Check if the admin exists and has the "admin" role
        if ($admin && $admin->role === 'admin') {
            // Fetch the admin's data from the database
            $adminData = Compte::find($admin->IdComptes);
            $notifications = $this->fetchNotifications();
            $newClients = $notifications['newClients'];
            $showNotification = $notifications['showNotification'];
            $notifications = Client::with('compte')->orderBy('created_at', 'desc')->take(4)->get();

        return view('admin.notifications', compact('adminData','notifications','newClients', 'showNotification'));
        }
    }




    public function addUser()
{
    $admin = Session::get('admin');
    $adminData = Compte::find($admin->IdComptes);
    $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];

    $clients = Client::with('compte')
    ->whereHas('compte', function ($query) {
        $query->where('role', 'user');
    })
    ->get();
    return view('admin.addUser', compact('adminData', 'clients','newClients', 'showNotification'))->with('i', 0);
}

    public function addCoach()
    {
        $admin = Session::get('admin');
        $adminData = compte::find($admin->IdComptes);
        $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];

        $sports = Sport::all();
        $coaches = Coach::with('compte')
    ->whereHas('compte', function ($query) {
        $query->where('role', 'coach');
    })
    ->get();
                return view('admin.addCoach',compact('adminData', 'coaches','sports','newClients', 'showNotification'))->with('i', 0);
    }
    public function addSport()
    {
        $admin = Session::get('admin');
        $adminData = compte::find($admin->IdComptes);
        $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];

        $sports = Sport::all();

                return view('admin.addSport',compact('adminData','sports','newClients', 'showNotification'))->with('i', 0);
    }
    public function addSalle()
    {
        $admin = Session::get('admin');
        $adminData = compte::find($admin->IdComptes);
        $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];

        $salles = salle::all();
        $sports = Sport::all();

                return view('admin.addSalle',compact('adminData','salles','sports','newClients', 'showNotification'))->with('i', 0);
    }
    public function abonnements()
    {
        $admin = Session::get('admin');
        $adminData = compte::find($admin->IdComptes);
        $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];

        $sports = Sport::all();

        $abonnements = typeAbonnement::all();
                return view('admin.abonnements',compact('adminData','sports','abonnements','newClients', 'showNotification'))->with('i', 0);
    }

    public function profile()
{
    $admin = Session::get('admin');
    $adminData = Compte::find($admin->IdComptes);
    $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];


    return view('admin.profile', compact('adminData','newClients', 'showNotification'));
}
public function updateProfile(Request $request)
    {
        $admin = Session::get('admin');
        $adminData = Compte::find($admin->IdComptes);

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

        $adminData->nom = $validatedData['nom'];
        $adminData->prenom = $validatedData['prenom'];
        $adminData->cni = $validatedData['cni'];
        $adminData->tele = $validatedData['tele'];
        $adminData->email = $validatedData['email'];
        if (!Hash::check($validatedData['current_password'], $adminData->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        $adminData->password = Hash::make($validatedData['new_password']);
    $adminData->save();

    return redirect(url('admin/profile'))->with('success', 'Profile updated successfully');
}

public function seance()
{
    $admin = Session::get('admin');
    $adminData = Compte::find($admin->IdComptes);
    $notifications = $this->fetchNotifications();
    $newClients = $notifications['newClients'];
    $showNotification = $notifications['showNotification'];
    $sports = Sport::all();
    $salles = Salle::all();
            $coaches = Coach::with('compte')
        ->whereHas('compte', function ($query) {
            $query->where('role', 'coach');
        })
        ->get();

        $seances = Concerner::join('seances', 'concerners.Id_Seance', '=', 'seances.IdSeance')
    ->join('salles', 'concerners.No_Salle', '=', 'salles.NoSalle')
    ->join('sports', 'concerners.Id_Sport', '=', 'sports.CodeS')
    ->join('participers', 'seances.IdSeance', '=', 'participers.Id_Seance')
    ->join('coaches', 'participers.Id_Coach', '=', 'coaches.IdCoach')
    ->join('comptes', 'coaches.Id_Compte', '=', 'comptes.IdComptes')
    ->select('sports.*', 'seances.*', 'salles.*', 'coaches.*', 'comptes.*')
    ->get();

    return view('admin.seance', compact('adminData', 'newClients', 'showNotification', 'sports', 'salles', 'coaches', 'seances'));
}




}
