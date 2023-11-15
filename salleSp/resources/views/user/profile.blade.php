@include('user.header')

<!----------------------------------------------start layout----->


<section class="admin-profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
                        <div class="card-header">Client Profile</div>
                        <div class="card-body">
                            <form action="{{ route('user.updateProfile') }}" method="POST">
                                @csrf
                                <div  class="form-group">
                                    <label  for="email">Email</label>
                                    <input type="email" class="formControl" id="email" name="email" value="{{ $clientData->email }}">
                                </div>
                                <div class="form-group">
                                    <label  for="nom">Nom</label>
                                    <input type="text" class="formControl" id="nom" name="nom" value="{{ $clientData->nom }}">
                                </div>
                                <div class="form-group">
                                    <label  for="prenom">Prenom</label>
                                    <input type="text" class="formControl" id="prenom" name="prenom" value="{{ $clientData->prenom }}">
                                </div>
                                <div class="form-group">
                                    <label  for="cni">Cni</label>
                                    <input type="text" class="formControl" id="cni" name="cni" value="{{ $clientData->cni }}">
                                </div>
                                <div class="form-group">
                                    <label  for="tele">Mobile</label>
                                    <input type="text" class="formControl" id="tele" name="tele" value="{{ $clientData->tele}}">
                                </div>
                                <div class="form-group">
                                    <label  for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" class="formControl">
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label  for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="formControl">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label  for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="formControl">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

            
<!----------------------------------------------end layout----->
</div>
        <!-- Content End -->


        @include('user.footer')
