@include('admin.header')

<!----------------------------------------------start layout----->


<section class="admin-profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
                        <div class="card-header">Admin Profile</div>
                        <div class="card-body">
                            <form action="{{ route('admin.updateProfile') }}" method="POST">
                                @csrf
                                <div  class="form-group">
                                    <label style="color:black;" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $adminData->email }}">
                                </div>
                                <div class="form-group">
                                    <label style="color:black;" for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $adminData->nom }}">
                                </div>
                                <div class="form-group">
                                    <label style="color:black;" for="prenom">Prenom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $adminData->prenom }}">
                                </div>
                                <div class="form-group">
                                    <label style="color:black;" for="cni">Cni</label>
                                    <input type="text" class="form-control" id="cni" name="cni" value="{{ $adminData->cni }}">
                                </div>
                                <div class="form-group">
                                    <label style="color:black;" for="tele">Mobile</label>
                                    <input type="text" class="form-control" id="tele" name="tele" value="{{ $adminData->tele}}">
                                </div>
                                <div class="form-group">
                                    <label style="color:black;" for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control">
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
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


        @include('admin.footer')
