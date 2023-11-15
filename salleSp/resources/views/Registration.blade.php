<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - multistep form</title>
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/registration.css"/>
  
  <!-- Vendor CSS Files -->

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/header.css" rel="stylesheet">
  <link href="assets/css/footer.css" rel="stylesheet">
  <style>
    body {
  margin-top:150px;
  font-family: var(--bs-body-font-family);
  font-size: var(--bs-body-font-size);
  font-weight: var(--bs-body-font-weight);
  line-height: var(--bs-body-line-height);
  color: var(--bs-body-color);
  text-align: var(--bs-body-text-align);
  background-color: #000;
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: transparent;
}
.column-container {
        display: flex;
        justify-content: space-between;
    }
    
    .column {
        flex: 1;
        margin-right: 10px;
    }
   
  </style>
</head>

<body>
  @include('header')
  <!-- multistep form -->
  <form  method="post" action="{{route('registerUser')}}"  enctype="multipart/form-data" id="multistepsform">
  @if(Session::has('success'))
	<div class="alert alert-success">{{Session::get('success')}}</div>
				@endif
				@if(Session::has('fail'))
	<div class="alert alert-danger">{{Session::get('fail')}}</div>
				@endif
  @csrf
  <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Account Setup</li>
      <li>Personal Details</li>
      <li>Social Profiles</li>

    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Create your account</h2>
      <h3 class="fs-subtitle"></h3>
      <input type="text"id="emailInput" name="email" placeholder="Email" value="{{old('email')}}"/>
      <p id="emailError" style="color: red;"></p>
      <span class="text-danger">@error('email') {{$message}}@enderror</span>
      
      <input type="password" id="passwordInput" name="password" placeholder="Password" value="{{old('password')}}" />
<span id="passwordError" class="text-danger">@error('password') {{$message}} @enderror</span>

<input type="password" id="cpasswordInput" name="cpassword" placeholder="Confirm Password" value="{{old('cpassword')}}" />
<span id="cpasswordError" class="text-danger">@error('cpassword') {{$message}} @enderror</span>

      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>

    <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    
    <div class="column-container">
        <div class="column">
            <input type="text" name="nom" placeholder="First Name" value="{{ old('nom') }}" />
            <span class="text-danger">@error('nom') {{ $message }} @enderror</span>
        </div>
        
        <div class="column">
            <input type="text" name="prenom" placeholder="Last Name" value="{{ old('prenom') }}" />
            <span class="text-danger">@error('prenom') {{ $message }} @enderror</span>
        </div>
    </div>
    
    <div class="column-container">
        <div class="column">
            <input type="text" id="teleInput" name="tele" placeholder="Phone" value="{{ old('tele') }}" />
            <span id="teleError" class="text-danger">@error('tele') {{ $message }} @enderror</span>
        </div>
        
        <div class="column">
            <input type="text"id="cniInput" name="cni" placeholder="C.N.I" value="{{ old('cni') }}" />
            <span  id="cniError" class="text-danger">@error('cni') {{ $message }} @enderror</span>
        </div>
    </div>
        <div style="display:flex; justify-content:flex-start; margin-bottom:10px;">Gender</div>

    <div class="column-container">
    
    <div class="column">
        <label>
            <input type="radio" name="gender" value="Female" {{ old('gender') === 'Female' ? 'checked' : '' }}>
            Female
        </label>
    </div>
    <div class="column">
        <label>
            <input type="radio" name="gender" value="Male" {{ old('gender') === 'Male' ? 'checked' : '' }}>
            Male
        </label>
    </div>
</div>

    
    
    <div class="column-container">
        <div class="column">
            <div style="display:flex; justify-content:flex-start; margin-bottom:10px;">Chosen Image</div>
            <input type="file" name="image" value="{{ old('image') }}">
        </div>
    </div>
    
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>
    <fieldset>
      <h2 class="fs-title">Social Profiles</h2>
      <h3 class="fs-subtitle">Your presence on the social network</h3>
      <input type="text" name="twitter" placeholder="Twitter" />
      <input type="text" name="facebook" placeholder="Facebook" />
      <input type="text" name="gplus" placeholder="Google Plus" />
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="submit" name="submit"  value="Submit" />
    </fieldset>
    
    <div class="text-center p-t-136">
						<a class="txt2" href="login">
							Already Registered !! Login Here
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
  </form>
  
   
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src="js/registration.js"></script>
 <!-- Vendor JS Files -->
 <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/regex.js"></script>
</body>

</html>