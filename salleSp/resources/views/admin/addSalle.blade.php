        @include('admin.header')
            <div class="container">
        <h2>Salles</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

      <!-------------------------------- start modal----->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSalleModal">
    Add Salle
            </button>
            <!-- Modal -->
<div class="modal fade" id="addSalleModal" tabindex="-1" aria-labelledby="addSalleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSalleModalLabel">Add Salle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add Salle form -->
                <form action="{{'saveSalle'}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="NomSalle" class="form-label">Salle Name</label>
                        <input type="text" class="form-control" id="NomSalle" name="NomSalle" required>
                    </div>
                    <div class="mb-3">
                        <label for="NbMembre" class="form-label">capacite</label>
                        <input type="number" class="form-control" id="capacite" name="capacite" required>
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

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th> salle name</th>
                    <th>salle capacite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @php
        $i = 0;
        @endphp
        @foreach($salles as $salle)
        <tr>
            <td>{{ ++$i }}</td>
           
            <td>{{ $salle->NomSalle }}</td>
            <td>{{ $salle->Capacite}}</td>

            <td>
<!------------------------- star edit modal ------------->

<a href="#" title="Edit sport" data-bs-toggle="modal" data-bs-target="#editSalleModal{{ $salle->NoSalle  }}">
  <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                </a>
                <!-- Modal -->
<div class="modal fade" id="editSalleModal{{ $salle->NoSalle }}" tabindex="-1" aria-labelledby="editSalleModalLabel{{ $salle->NoSalle  }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSalleModalLabel{{ $salle->NoSalle  }}">Edit Salle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit sport form here -->
        <form action="{{ route('updateSalle', ['id' => $salle->NoSalle ]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label"> Salle name</label>
            <input type="text" class="form-control" id="name" name="NomSalle" value="{{ $salle->NomSalle }}" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label"> Salle name</label>
            <input type="text" class="form-control" id="name" name="Capacite" value="{{ $salle->Capacite }}" required>
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
                <form method="POST" action="{{ route('deleteSalle', $salle->NoSalle ) }}" accept-charset="UTF-8" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this salle?')"title="Delete sport">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>
                </form>
            </td>
                
        </tr>
                @endforeach
            </tbody>
        </table>
    </div>

            
        
        <!-- Content End -->

        @include('admin.footer')