@include('admin.header')


            <div class="container">
        <h2>Abonnements</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

            <!-------------------------------- start modal----->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAbonnementModal">
    Add Abonnement
            </button>
            <!-- Modal -->
<div class="modal fade" id="addAbonnementModal" tabindex="-1" aria-labelledby="addAbonnementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAbonnementModalLabel">Add Abonnement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add Abonnement form -->
                <form action="{{'saveAbonnement'}}" method="POST">
                    @csrf
                    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="LibelleAbo"  required>
          </div>
          <div class="mb-3">
            <label for="duration" class="form-label">Duration in Months</label>
            <input type="number" class="form-control" id="duration" name="DureeMois" min="1" max="12"  required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price (MAD)</label>
                <input type="number" class="form-control" id="price" name="tarif" min="0" step="0.01" required>
            </div>
            <div  class="mb-3">Sport</div>

                <select name="sport" id="sport" placeholder="Sport" class="span9" style="text-align: center;height: 30px;width: 100%;">
                    <option value="">Choose Sport</option>
                    @foreach($sports as $id => $name)
                <option value="{{ $name->CodeS }}" > {{ $name->LibelleS }}</option>
                    @endforeach
                </select>
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
                    <th>duration in Months</th>
                    <th>sport name</th>
                    <th>Price</th>


                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @php
        $i = 0;
        @endphp
        @foreach($abonnements as $abonnement)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $abonnement->LibelleAbo }}</td>
            <td>{{ $abonnement->DureeMois}} month</td>
            <td>{{ $abonnement->acceder->sport->LibelleS }}</td>
            <td>{{ $abonnement->acceder->TarifMois }}</td>

                    <td>

                <!--------------start edit modal ------------->
                <a href="#" title="Edit Abonnement" data-bs-toggle="modal" data-bs-target="#editAbonnementModal{{ $abonnement->CodeAbo }}">
  <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                </a>
                <!-- Modal -->
<div class="modal fade" id="editAbonnementModal{{ $abonnement->CodeAbo }}" tabindex="-1" aria-labelledby="editAbonnementModalLabel{{ $abonnement->CodeAbo }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAbonnementModalLabel{{ $abonnement->CodeAbo }}">Edit Abonnement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit Abonnement form here -->
        <form action="{{ route('updateAbonnement', ['id' => $abonnement->CodeAbo]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="libelleAbo" value="{{ $abonnement->LibelleAbo }}" required>
          </div>
          <div class="mb-3">
            <label for="duration" class="form-label">Duration in Months</label>
            <input type="number" class="form-control" id="duration" name="DureeMois" min="1" max="12" value="{{ $abonnement->DureeMois }}" required>
        </div>

        <div class="mb-3">
                <label for="price" class="form-label">Price (MAD)</label>

                <input type="number" class="form-control" id="price" name="tarif" min="0" step="0.01" value="{{ $abonnement->acceder->TarifMois }}" required>

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


                <form method="POST" action="{{ route('deleteAbonnement', $abonnement->CodeAbo) }}" accept-charset="UTF-8" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete client">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>
                </form>

                                        </td>
        </tr>
                @endforeach
            </tbody>
        </table>




        @include('admin.footer')
