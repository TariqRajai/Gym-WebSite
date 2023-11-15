@include('admin.header')
<div class="container-fluid pt-4 px-4">
        <h2>Coaches</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


            <!-------------------------------- start modal----->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCoachModal">
    Add Coach
            </button>
            <!-- Modal -->
<div class="modal fade" id="addCoachModal" tabindex="-1" aria-labelledby="addCoachModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCoachModalLabel">Add Coach</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add Coach form -->
                <form action="{{'saveCoach'}}" method="POST">
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
                      <label for="firstname" class="col-sm-2 col-form-label">First name</label>
                      <div class="col-auto">
                          <input type="text" name="prenom" class="form-control" placeholder="prenom" required>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
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
                        <input type="text" name="mobile" class="form-control" placeholder="mobile" required>
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="lastname" class="col-sm-2 col-form-label">gender</label>
                  <div class="col-auto">
                      <input type="text" name="gender" class="form-control" placeholder="gender" required>
                  </div>
              </div>
              <div class="mb-3 row">
                  <label for="lastname" class="col-sm-2 col-form-label">Salary</label>
                  <div class="col-auto">
                      <input type="text" name="salaire" class="form-control" placeholder="salary" required>
                  </div>
                  <div  class="mb-3">
                  <label for="lastname" class="col-sm-2 col-form-label">Sport</label>

                    <select name="sport" id="sport" placeholder="Sport" class="span9" style="text-align: center;height: 30px;width: 100%;">
                        <option value="">Choose Sport</option>
                        @foreach($sports as $id => $name)
                    <option value="{{ $name->CodeS }}" > {{ $name->LibelleS }}</option>
                        @endforeach
                    </select>
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
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @php
        $i = 0;
        @endphp
        @foreach($coaches as $coach)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $coach->compte->nom }} {{ $coach->compte->prenom }}</td>
            <td>{{ $coach->compte->email }}</td>
            <td>{{ $coach->Salaire }}</td>

            <td>
                <!-------------- show modal ------------->
                                <a href="#" title="View Coach" data-bs-toggle="modal" data-bs-target="#viewCoachModal{{ $coach->compte->IdComptes }}">
                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                </a>
                                <!-- start Modal show -->
                <div class="modal fade" id="viewCoachModal{{ $coach->compte->IdComptes }}" tabindex="-1" aria-labelledby="viewCoachModalLabel{{ $coach->compte->IdComptes}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewCoachModalLabel{{ $coach->compte->IdComptes }}">Coach Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <p>Email: {{ $coach->compte->email }}</p>
                        <p>Last Name: {{ $coach->compte->nom }}</p>
                        <p>First Name: {{ $coach->compte->prenom }}</p>
                        <p>CNI: {{ $coach->compte->cni }}</p>
                        <p>MOBILE: {{ $coach->compte->tele }}</p>
                        <p>Gender: {{ $coach->compte->gender }}</p>
                        <p>Salary: {{ $coach->Salaire }}</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                <!--------------end  show modal ------------->
                 <!--------------start edit modal ------------->
                                <a href="#" title="Edit coach" data-bs-toggle="modal" data-bs-target="#editCoachModal{{ $coach->compte->IdComptes }}">
                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                </a>
                                <!-- Modal -->
                <div class="modal fade" id="editCoachModal{{ $coach->compte->IdComptes }}" tabindex="-1" aria-labelledby="editCoachModalLabel{{ $coach->compte->IdComptes }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCoachModalLabel{{ $coach->compte->IdComptes }}">Edit Coach</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit client form here -->
                        <form action="{{ route('updateCoach', ['id' => $coach->compte->IdComptes]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $coach->compte->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="name" name="nom" value="{{ $coach->compte->nom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" name="prenom" value="{{ $coach->compte->prenom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">CNI</label>
                            <input type="text" class="form-control" id="name" name="cni" value="{{ $coach->compte->cni }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="name" name="tele" value="{{ $coach->compte->tele }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">salary</label>
                            <input type="text" class="form-control" id="name" name="Salaire" value="{{ $coach->Salaire }}" required>
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


                <form method="POST" action="{{ route('deleteCoach', $coach->compte->IdComptes) }}" accept-charset="UTF-8" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this coach?')" title="Delete coach">
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
