<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HERCULES/SALLE DE SPORT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/header.css" rel="stylesheet">
  <link href="assets/css/footer.css" rel="stylesheet">
</head>
<body>
  
  @include('header')
  <!-- ======= text section ======= -->
  <section id="text">
    <div class="text-container" data-aos="zoom-in" data-aos-delay="100">
      <h1><span>Success</span> usually comes to those who are too busy to be looking for it</h1>
      <!-- <h2>i'ts time for change.At United Front Community <br/>Fitness,we stand together in unity.WE Live Better-Together.</h2> -->
      <a href="{{'registration'}}" class="btn-get-started">Get Started</a>
    </div>
  </section>
  <!-- End text Section -->
<!-- sub card-->
<main id="main">
  <div class="container-card">
    <main class="page-content">
      <div class="card">
        <div class="content">
          <h2 class="title">Personal training</h2>
          <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the
            mountains</p>
          <button class="btn"><a href="{{'classes'}}" class="lien-btn" style="color: white">View More</a></button>
        </div>
      </div>
      
      <div class="card">
        <div class="content">
          <h2 class="title">Group Classes</h2>
          <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the
            mountains</p>
          <button class="btn"><a href="{{'classes'}}" class="lien-btn" style="color: white">View More</a></button>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <h2 class="title">Combine Activities </h2>
          <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the
            mountains</p>
          <button class="btn"><a href="{{'classes'}}" class="lien-btn" style="color: white">View More</a></button>
        </div>
      </div>

    </main>
  </div>
  
    <!-- ======= About Section ======= -->
    <section id="About">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-start">
            <h3 class="cta-title">About Us</h3>
            <p class="cta-text"> Our gyms are filled with the best strength and cardio equipment in the industry - all
              the essentials you need for a great workout. Our world-class personal trainers work with you to experience
              all the awesomeness that Crunch has to offer at an incredibly low price.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{'trainer'}}">View more</a>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Facts</h3>
          <p class="section-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut minima autem vitae, similique debitis quaerat repellendus totam, fugiat neque omnis nisi expedita vel officia consectetur.</p>
        </div>
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Membres</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="534" data-purecounter-duration="1" class="purecounter"></span>
            <p>Coaches</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section>
    <!-- End Facts Section -->

    <!-- Uncomment below if you wan to use dynamic maps -->
    <div class="row">
      <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54349.56953743724!2d-8.07058303163265!3d31.638009261273645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafef2155b233b3%3A0x3aec6c7d07f96d5b!2sQuick%20Body!5e0!3m2!1sen!2sma!4v1684235911107!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      
  <div class="col-md-6">
        <form class="my-form">
          <div class="form-group">
              <label for="form-name">Name</label>
              <input type="email" class="form-control" id="form-name" placeholder="Name">
          </div>
          <div class="form-group">
              <label for="form-email">Email Address</label>
              <input type="email" class="form-control" id="form-email" placeholder="Email Address">
          </div>
          <div class="form-group">
              <label for="form-subject">Telephone</label>
              <input type="text" class="form-control" id="form-subject" placeholder="Subject">
          </div>
          <div class="form-group">
              <label for="form-message">Email your Message</label>
              <textarea class="form-control" id="form-message" placeholder="Message"></textarea>
          </div>
          <button class="btn btn-default" type="submit">Contact Us</button>                
      </form>
      </div>
    </div>
       @include('footer')

</body>

</html>