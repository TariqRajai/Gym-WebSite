@include('user.header')

            <!-- Blank Start -->
                <div class="container-fluid pt-4 px-4">
                    <h2 >Abonnements</h2>
                    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
      
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
      
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sport</th>
                                <th>Tarif</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acceders as $acceder)
                                <tr>
                                    <td>{{ $acceder->sport->LibelleS }}</td>
                                    <td>{{ $acceder->TarifMois }} MAD</td>
                                    <td>{{ $acceder->typeAbo->DureeMois }} months</td>
                                    <td>
                                        <form action="{{ route('user.abonner.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="Code_Abo" value="{{ $acceder->Code_Abo }}">
                                            <input type="hidden" name="code_s" value="{{ $acceder->code_s }}"> 
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            <!-- Blank End -->


            
        @include('user.footer')