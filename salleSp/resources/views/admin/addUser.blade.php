@include('admin.header')


            <style>
        .column-container {
        display: flex;
        justify-content: space-between;
    }
    
    .column {
        flex: 1;
        margin-right: 10px;
    }
   
    </style>
            <div class="container-fluid pt-4 px-4">
        <h2>Clients</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

            <!-------------------------------- start modal----->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
    Add Client
            </button>
            <!-- Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add Client form -->
                <form action="{{'save'}}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                      <label for="firstname" class="col-sm-2 col-form-label">email</label>
                      <div class="col-auto">
                          <input type="email" name="email" class="form-control" placeholder="email" required>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="firstname" class="col-sm-2 col-form-label">password</label>
                      <div class="col-auto">
                          <input type="password" name="password" class="form-control" placeholder="password" required>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="firstname" class="col-sm-2 col-form-label">prenom</label>
                      <div class="col-auto">
                          <input type="text" name="prenom" class="form-control" placeholder="prenom" required>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="lastname" class="col-sm-2 col-form-label">nom</label>
                      <div class="col-auto">
                          <input type="text" name="nom" class="form-control" placeholder="nom" required>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="firstname" class="col-sm-2 col-form-label">CNI</label>
                      <div class="col-auto">
                          <input type="text" name="cni" class="form-control" placeholder="cni" required>
                      </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="lastname" class="col-sm-2 col-form-label">mobile</label>
                    <div class="col-auto">
                        <input type="text" name="tele" class="form-control" placeholder="mobile" required>
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="lastname" class="col-sm-2 col-form-label">gender</label>
                  <div class="col-auto">
                      <input type="text" name="gender" class="form-control" placeholder="gender" required>
                  </div>
              </div>
              
              <div class="mb-12 row">
                    <label for="lastname" class="col-sm-2 col-form-label">etat de payment</label>
                    <div class="col-auto">
                        <select name="etat" class="col-sm-10 form-control" style="width: 202px;text-align: left;"required>
                            <option value="nonPaye">non paye</option>
                            <option value="paye">paye</option>
                        </select>
                    </div>
                </div>

                <div class="mb-12 row">
        
                    <label for="lastname" class="col-sm-2 col-form-label">image</label>
                    <div class="col-auto">

                    <input type="file" name="image" value="{{ old('image') }}">
                    </div>
                </div>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @php
        $i = 0;
        @endphp
        @foreach($clients as $client)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $client->compte->nom }}</td>
            <td>{{ $client->compte->email }}</td>
            <td>
                <!-------------- show modal ------------->
                <a href="#" title="View client" data-bs-toggle="modal" data-bs-target="#viewClientModal{{ $client->compte->IdComptes }}">
  <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                </a>
                <!-- start Modal show -->
<div class="modal fade" id="viewClientModal{{ $client->compte->IdComptes }}" tabindex="-1" aria-labelledby="viewClientModalLabel{{ $client->compte->IdComptes}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewClientModalLabel{{ $client->compte->IdComptes }}">Client Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <p>Email: {{ $client->compte->email }}</p>
        <p>Nom: {{ $client->compte->nom }}</p>
        <p>Prenom: {{ $client->compte->prenom }}</p>
        <p>CNI: {{ $client->compte->cni }}</p>
        <p>TELEPHONE: {{ $client->compte->tele }}</p>
        <p>Gender: {{ $client->compte->gender }}</p>
        <p>etat: {{ $client->etat }}</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                <!--------------end  show modal ------------->
                <!--------------start edit modal ------------->
                <a href="#" title="Edit client" data-bs-toggle="modal" data-bs-target="#editClientModal{{ $client->compte->IdComptes }}">
  <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                </a>
                <!-- Modal -->
<div class="modal fade" id="editClientModal{{ $client->compte->IdComptes }}" tabindex="-1" aria-labelledby="editClientModalLabel{{ $client->compte->IdComptes }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editClientModalLabel{{ $client->compte->IdComptes }}">Edit Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit client form here -->
        <form action="{{ route('updateClient', ['id' => $client->compte->IdComptes]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->compte->email }}" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="name" name="nom" value="{{ $client->compte->nom }}" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="name" name="prenom" value="{{ $client->compte->prenom }}" required>
          </div>
          
          <div class="mb-3">
            <label for="name" class="form-label">CNI</label>
            <input type="text" class="form-control" id="name" name="cni" value="{{ $client->compte->cni }}" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Phone</label>
            <input type="text" class="form-control" id="name" name="tele" value="{{ $client->compte->tele }}" required>
          </div>
          <div class="mb-12 row">
    <label for="lastname" class="col-sm-2 col-form-label">etat de payment</label>
    <div class="col-auto">
        <select name="etat" class="col-sm-10 form-control" style="width: 202px; text-align: left;" required>
            <option value="nonPaye" {{ old('etat') == 'nonPaye' ? 'selected' : '' }}>non paye</option>
            <option value="paye" {{ old('etat') == 'paye' ? 'selected' : '' }}>paye</option>
        </select>
    </div>
</div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>          </div>
        </form>
      </div>
    </div>
  </div>
</div>




                <!--------------end  edit modal ------------->

  
                <form method="POST" action="{{ route('deleteClient', $client->compte->IdComptes) }}" accept-charset="UTF-8" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete client"onclick="return confirm('Are you sure you want to delete this user?')">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>
                </form>

             </td>
        </tr>
         @endforeach
        </tbody>
        </table>

        
        <!-- Content End -->

        @include('admin.footer')