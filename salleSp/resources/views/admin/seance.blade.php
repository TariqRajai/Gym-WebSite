@include('admin.header')
<div class="container-fluid pt-4 px-4" >
@if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
     <!-------------------------------- start modal----->
     <button type="button" class="btn btn-primary"style="margin-bottom: 24px;" data-bs-toggle="modal" data-bs-target="#addSeanceModal">
    Add Seance
            </button>
            <!-- Modal -->
<div class="modal fade" id="addSeanceModal" tabindex="-1" aria-labelledby="addSeanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSeanceModalLabel">Add Seance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add Sport form -->
              

                <form action="{{ route('admin.saveSeance') }}"
                 method="POST">                  
                   @csrf
                <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="sport">Sport</label>
                        <select name="sport" id="sport" class="form-control">
                            <!-- Loop through the available sports -->
                            @foreach($sports as $sport)
                                <option value="{{ $sport->CodeS }}">{{ $sport->LibelleS }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="salle">Salle</label>
                        <select name="salle" id="salle" class="form-control">
                            <!-- Loop through the available salles -->
                            @foreach($salles as $salle)
                                <option value="{{ $salle->NoSalle }}">{{ $salle->NomSalle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="salle">Coach</label>
                        <select name="coach" id="coach" class="form-control">
                            <!-- Loop through the available Coaches -->
                            @foreach($coaches as $coach)
                                <option value="{{ $coach->IdCoach}}">{{ $coach->compte->nom }} {{ $coach->compte->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="dateDebut">Start Date</label>
                        <input type="datetime-local" class="form-control" name="dateDebut">
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="dateDebut">End Date</label>
                        <input type="datetime-local" class="form-control" name="dateFin">
                        
                    </div>
                    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Save</button>
        </div>
                    </form>
            </div>
        </div>
    </div>
</div>


            <!------------------------- end modal -------->
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
            <th>Actions</th>
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
                <td>
                        <!------------------------- star edit modal ------------->

                <a href="#" title="Edit Seance" data-bs-toggle="modal" data-bs-target="#editSeanceModal{{ $seance->IdSeance }}">
                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                </a>
                                <!-- Modal -->
                <div class="modal fade" id="editSeanceModal{{ $seance->IdSeance}}" tabindex="-1" aria-labelledby="editSeanceModalLabel{{ $seance->IdSeance }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSeanceModalLabel{{ $seance->IdSeance }}">Edit Seance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit sport form here -->
                        <form action="{{ route('updateSeance', ['id' => $seance->IdSeance]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="sport">Sport</label>
                        <select name="sport" id="sport" class="form-control">
                        @foreach($sports as $sport)
                        <option value="{{ $sport->CodeS }}" {{ $seance->IdSport == $sport->CodeS ? 'selected' : '' }}>{{ $sport->LibelleS }}</option>
                    @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="salle">Salle</label>
                        <select name="salle" id="salle" class="form-control">
                            @foreach($salles as $salle)
                                <option value="{{ $salle->NoSalle }}" {{ $seance->salle_id == $salle->NoSalle ? 'selected' : '' }}>
                                    {{ $salle->NomSalle }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
    <label class="col-sm-2 col-form-label" for="coach">Coach</label>
    <select name="coach" id="coach" class="form-control">
        @foreach($coaches as $coach)
            <option value="{{ $coach->IdCoach }}" {{ $seance->Id_Coach == $coach->IdCoach ? 'selected' : '' }}>
                {{ $coach->compte->nom }} {{ $coach->compte->prenom }}
            </option>
        @endforeach
    </select>
</div>

                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="dateDebut">Start Date</label>
                        <input type="datetime-local" class="form-control" name="dateDebut" value="{{ $seance->dateDebut }}">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="dateFin">End Date</label>
                        <input type="datetime-local" class="form-control" name="dateFin" value="{{ $seance->dateFin }}">
                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>          </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>



        
<!----------------------------- end edit modal ----------->
                        <!-- Delete button -->
                        <form method="POST" action="{{ route('deleteSeance', ['id' => $seance->IdSeance]) }}" accept-charset="UTF-8" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete sport"onclick="return confirm('Are you sure you want to delete this seance?')">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>
                </form>
                    </td>

            </tr>
        @endforeach

    </tbody>
    </table>
            
</div>
@include('admin.footer')