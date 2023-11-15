@include('admin.header')


            <div class="container">
        <h2>Sports</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

      <!-------------------------------- start modal----->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSportModal">
    Add Sport
            </button>
            <!-- Modal -->
<div class="modal fade" id="addSportModal" tabindex="-1" aria-labelledby="addSportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSportModalLabel">Add Sport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add Sport form -->
                <form action="{{'saveSport'}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="libelleS" class="form-label">Sport Name</label>
                        <input type="text" class="form-control" id="libelleS" name="libelleS" required>
                    </div>
                    <div class="mb-3">
                        <label for="NbMembre" class="form-label">Nombre des membres</label>
                        <input type="number" class="form-control" id="NbMembre" name="NbMembre" required>
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
                    <th>libelle sport</th>
                    <th>Number of client</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @php
        $i = 0;
        @endphp
        @foreach($sports as $sport)
        <tr>
            <td>{{ ++$i }}</td>

            <td>{{ $sport->LibelleS }}</td>
            <td>{{ $sport->NbMembre }}</td>

            <td>
<!------------------------- star edit modal ------------->

<a href="#" title="Edit sport" data-bs-toggle="modal" data-bs-target="#editSportModal{{ $sport->CodeS }}">
  <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                </a>
                <!-- Modal -->
<div class="modal fade" id="editSportModal{{ $sport->CodeS }}" tabindex="-1" aria-labelledby="editSportModalLabel{{ $sport->CodeS }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSportModalLabel{{ $sport->CodeS }}">Edit Sport</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit sport form here -->
        <form action="{{ route('updateSport', ['id' => $sport->CodeS]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">libelle sport</label>
            <input type="text" class="form-control" id="name" name="libelleS" value="{{ $sport->LibelleS }}" required>
          </div>
          <div class="mb-3">
                        <label for="NbMembre" class="form-label">Number of members</label>
                        <input type="number" class="form-control" id="NbMembre" name="NbMembre"value="{{ $sport->NbMembre }}" required>
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
                <form method="POST" action="{{ route('deleteSport', $sport->CodeS) }}" accept-charset="UTF-8" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete sport"onclick="return confirm('Are you sure you want to delete this sport?')">
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
