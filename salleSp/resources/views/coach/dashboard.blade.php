@include('coach.header')

<!-- Seances table -->
<table class="table">
        <thead>
        <tr>
            <th>Day of the Week</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Sport Name</th>
            <th>Salle Name</th>
            <th>Coach Name</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($seances as $seance)
       
            <tr>
                <td>{{ $seance->dateDebut }}</td>
                <td>{{ $seance->timeDebut }}</td>
                <td>{{ $seance->timeFin }}</td>
                <td>{{ $seance->LibelleS }}</td>
                <td>{{ $seance->NomSalle }}</td>
                
                <td>{{ $seance->nom }} {{ $seance->prenom }}</td>
                </tr>
        @endforeach

    </tbody>
    </table>

@include('coach.footer')
