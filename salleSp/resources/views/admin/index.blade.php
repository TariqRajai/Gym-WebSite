
@include('admin.header')

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Clients</p>
                                <h6 class="mb-0">{{$clientCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Sport</p>
                                <h6 class="mb-0">{{$sportCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-male fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Male client </p>
                                
                                <h6 class="mb-0">{{$maleClients}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-female fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Female client</p>
                                <h6 class="mb-0">{{$femaleClients}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sport Clients per Month -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Sport Clients per Month</h6>
                          
                        </div>
                        <canvas id="sport-clients-per-month"></canvas>
                    </div>
                    </div>

                    
                    <!--------------- Female & Male Chart---------------->
                    <div class="col-sm-12 col-xl-6">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Female & Male Chart</h6>
          
        </div>
        <canvas id="female-male-chart"></canvas>
    </div>
</div>


            <!-- Sales Chart End -->

<!-- abonnements -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Abonnements</h6>
            
        </div>
        <div class="table-responsive">
            <table id="recent-sales-table" class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Customer</th>

                        <th scope="col">Abonnement</th>
                        <th scope="col"> Start Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newClients as $client)
                    @foreach($abonnements as $abonnement)

                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $client->compte->nom }} {{ $client->compte->prenom }}</td>

                        <td>{{ $abonnement->libelleAbo }}</td>
                        <td>{{ $abonnement->DateDebut }}</td>

                        <td>{{ $abonnement->TarifMois }} MAD</td>
                        <td>{{ $client->etat }}</td>
                        <td><a href="#" title="View client" data-bs-toggle="modal" data-bs-target="#viewClientModal{{ $client->compte->IdComptes }}">
  <button class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> datail</button>
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
        <p> Abonnement: {{ $abonnement->libelleAbo }}</p>
        <p>Start date:{{ $abonnement->DateDebut }}</p>
        <p>End date:  {{ $abonnement->endDate }}</p>
        <p>Price: {{ $abonnement->TarifMois }} MAD</p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div></td></td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- abonnemenst  End -->
<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">HERCULES</a>, All Right Reserved. 
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Footer End -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        var chartData = <?php echo json_encode([$femaleClients, $maleClients]); ?>;
    </script>
    <script>
    var sportClientsPerMonthData = {!! json_encode($sportClientsPerMonth) !!};
</script>


            @include('admin.footer')