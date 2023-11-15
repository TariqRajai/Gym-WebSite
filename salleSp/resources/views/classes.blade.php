<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>HERCULES</title>
    <meta content="" name="description">
    <meta content="" name="GYM">
  
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel="stylesheet" href="classe/css/style3.css">
  
    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
      rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/css/uikit.min.css" />

<style>
    body{
        background:black;
        padding-top: 105px;
    }
    html{
      background:black;
    }
    .marginn{
        margin-top: 60px;
    }
    .uk-link-toggle:hover .uk-link, .uk-link:hover, a:hover {
  
  text-decoration: none;
}
.ligne{
width: 51%;
height: 2px;
background-color:#F9F54B;
margin-left: 24%;
margin-bottom: 30px;
}
h3{
    font-size: 40px;
    line-height: 1.1em;
    letter-spacing: .02em;
    text-transform: uppercase;
    font-weight: 800;
    color: #fff;
    text-align: center
}
.right{
    margin-right: 20px;
}
.left{
    margin-left: 20px;
}



.l {
 outline: none;
 cursor: pointer;
 border: none;
 padding: 0.9rem 2rem;
 margin: 0;
 font-family: inherit;
 font-size: inherit;
 position: relative;
 display: inline-block;
 letter-spacing: 0.05rem;
 font-weight: 700;
 font-size: 17px;
 border-radius: 500px;
 overflow: hidden;
 background: #ffc107;
 color: ghostwhite;
}

.l span {
 position: relative;
 z-index: 10;
 transition: color 0.4s;
}

.l:hover span {
 color: black;
}

.l::before,
.l::after {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 z-index: 0;
}

.l::before {
 content: "";
 background: #000;
 width: 120%;
 left: -10%;
 transform: skew(30deg);
 transition: transform 0.4s cubic-bezier(0.3, 1, 0.8, 1);
}

.l:hover::before {
 transform: translate3d(100%, 0, 0);
}



a {
  text-decoration: none;
  color: #000000;
}

a:hover {
  color: #222222
}

/* Dropdown */

.dropdown {
  display: inline-block;
  position: relative;
}

.dd-button {
  display: inline-block;
  border: 1px solid gray;
  border-radius: 4px;
  padding: 5px 20px 5px 10px;
  background-color: #ffffff;
  cursor: pointer;
  white-space: nowrap;
  margin-left: 20px;
}

.dd-button:after {
  content: '';
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  width: 0; 
  height: 0; 
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-top: 5px solid black;
}

.dd-button:hover {
  background-color: #000000;
}


.dd-input {
  display: none;
}

.dd-menu {
  position: absolute;
  top: 100%;
  border: 1px solid #353434;
  border-radius: 4px;
  padding: 0;
  margin: 2px 0 0 0;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
  background-color: #353434;
  list-style-type: none;
  right: -7px;
}

.dd-input + .dd-menu {
  display: none;
} 

.dd-input:checked + .dd-menu {
  display: block;
} 

.dd-menu li {
  padding: 12px 27px;
  cursor: pointer;
  white-space: nowrap;
}

.dd-menu li:hover {
  background-color: #a28888;
}

.dd-menu li a {
  display: block;
  margin: -6px -13px;
  padding: 6px 13px;
}

.dd-menu li.divider{
  padding: 0;
  border-bottom: 1px solid #cccccc;
}

</style>
</head>
<body>
    @include('header')
    <div class="marginn"></div>
    <div class="uk-flex-middle" uk-grid>
      <div class="uk-width-2-3@m  uk-flex-first">

    <div class="uk-child-width-1-2@m uk-grid-match" uk-grid >
      <div>
          <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-left; repeat: true" style="background-color: black">
              

            <div style="width:750px;height:500px;" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">

              <ul class="uk-slideshow-items">
                  <li>
                      <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                          <img src="classe/img/wkz6xrsgzijdltmctwls.webp" alt="" uk-cover>
                      </div>
                  </li>
                  <li>
                      <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                          <img src="classe/img/BobbyDunes-image-24.jpg" alt="" uk-cover>
                      </div>
                  </li>
                  <li>
                      <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                          <img src="classe/img/boo.jpg" alt="" uk-cover>
                      </div>
                  </li>
              </ul>
          
              <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
              <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
          
          </div>
          </div>
      </div>
      
  </div> 

      </div>
      
      <div class="uk-width-1-3@m">
        <div class="right">
        <h3 class="uk-article-title" style="margin-top:-230px; text-align:center;">FIGHT SPORTS</h3>
        <p>Build a true fighting machine with boxing and kickboxing classes. We honor the fighting traditions by rigorously adapting them into hard-hitting martial arts classes that will bring out your inner warrior.</p>
        <p uk-margin>
          <button class="l" > <span><a  style="text-decoration:none; color:white;"href="{{'registration'}}"> try now</a></span>
          </button>
        </div>
      </div>
  </div>

<div class="ligne"></div>


<div class="uk-flex-middle" uk-grid>
      <div class="uk-width-2-3@m">
        <div class="uk-child-width-1-2@m uk-grid-match" uk-grid >
            <div>
                <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-right; repeat: true" style="background-color: black">
                    
      
                  <div style="width:750px;height:500px;" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">
      
                    <ul class="uk-slideshow-items">
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                <img src="classe/img/judo1.jpg" alt="" uk-cover>
                            </div>
                        </li>
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                                <img src="classe/img/a.jpg" alt="" uk-cover>
                            </div>
                        </li>
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                                <img src="classe/img/teakwando.jpg" alt="" uk-cover>
                            </div>
                        </li>
                    </ul>
                
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                
                </div>
                </div>
            </div>
            
        </div> 
        
    </div>
    <div class="uk-width-1-3@m uk-flex-first">
        <div class="left">
        <h3 class="uk-article-title" style="margin-top:-230px; text-align:center;">Teakwando & Judo</h3>
        <p>Build a true fighting machine with boxing and kickboxing classes. We honor the fighting traditions by rigorously adapting them into hard-hitting martial arts classes that will bring out your inner warrior.</p>
        <p uk-margin>
          <button class="l" > <span><a  style="text-decoration:none; color:white;"href="{{'registration'}}"> try now</a></span>
          </button>
            </div>
            </div>  

</div>

<div class="ligne"></div>



<div class="uk-flex-middle" uk-grid>
  <div class="uk-width-2-3@m  uk-flex-first">

<div class="uk-child-width-1-2@m uk-grid-match" uk-grid >
  <div>
      <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-left; repeat: true" style="background-color: black">
          

        <div style="width:750px;height:500px;" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">

          <ul class="uk-slideshow-items">
              <li>
                  <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                      <img src="classe/img/clb.jpg" alt="" uk-cover>
                  </div>
              </li>
              <li>
                  <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                      <img src="classe/img/karate1.jpg" alt="" uk-cover>
                  </div>
              </li>
              <li>
                  <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                      <img src="classe/img/karate2.jpg" alt="" uk-cover>
                  </div>
              </li>
          </ul>
      
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
      
      </div>
      </div>
  </div>
  
</div> 

  </div>
  
  <div class="uk-width-1-3@m">
    <div class="right">
    <h3 class="uk-article-title" style="margin-top:-230px;">Karate</h3>
    <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
    <p uk-margin>
      <button class="l" > <span><a  style="text-decoration:none; color:white;"href="{{'registration'}}"> try now</a></span>
      </button>
  </div></div>
</div>


<div class="ligne"></div>
<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m">
      <div class="uk-child-width-1-2@m uk-grid-match" uk-grid >
          <div>
              <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-right; repeat: true" style="background-color: black">
                  
    
                <div style="width:750px;height:500px;" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">
    
                  <ul class="uk-slideshow-items">
                      <li>
                          <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                              <img src="classe/img/stretching1.jpg" alt="" uk-cover>
                          </div>
                      </li>
                      <li>
                          <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                              <img src="classe/img/stretching2.jpg" alt="" uk-cover>
                          </div>
                      </li>
                      <li>
                          <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                              <img src="classe/img/stretching3.jpg" alt="" uk-cover>
                          </div>
                      </li>
                  </ul>
              
                  <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                  <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
              
              </div>
              </div>
          </div>
          
      </div> 
      
  </div>
  <div class="uk-width-1-3@m uk-flex-first">
    <div class="left">
      <h3 class="uk-article-title" style="margin-top:-230px; text-align:center;">Stretching</h3>
      <p>Build a true fighting machine with boxing and kickboxing classes. We honor the fighting traditions by rigorously adapting them into hard-hitting martial arts classes that will bring out your inner warrior.</p>
      <p uk-margin>
        <button class="l" > <span><a  style="text-decoration:none; color:white;"href="{{'registration'}}"> try now</a></span>
        </button>
          </div>
          </div>  

</div>

<div class="ligne"></div>
<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m  uk-flex-first">

  <div class="uk-child-width-1-2@m uk-grid-match" uk-grid >
    <div>
        <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-left; repeat: true" style="background-color: black">
            

          <div style="width:750px;height:500px;" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">

            <ul class="uk-slideshow-items">
                <li>
                    <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                        <img src="classe/img/yoga1.jpg" alt="" uk-cover>
                    </div>
                </li>
                <li>
                    <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                        <img src="classe/img/yoga2.jpg" alt="" uk-cover>
                    </div>
                </li>
                <li>
                    <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                        <img src="classe/img/yoga3.jpg" alt="" uk-cover>
                    </div>
                </li>
            </ul>
        
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
        
        </div>
        </div>
    </div>
    
</div> 

    </div>
    
    <div class="uk-width-1-3@m">
      <div class="right">
      <h3 class="uk-article-title" style="margin-top:-230px; text-align:center;">Yoga</h3>
      <p>Build a true fighting machine with boxing and kickboxing classes. We honor the fighting traditions by rigorously adapting them into hard-hitting martial arts classes that will bring out your inner warrior.</p>
      <p uk-margin>
        <button class="l" > <span><a  style="text-decoration:none; color:white;"href="{{'registration'}}"> try now</a></span>
      </div>
    </div>
</div>

<div class="ligne"></div>


  
<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m">
      <div class="uk-child-width-1-2@m uk-grid-match" uk-grid >
          <div>
              <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-slide-right; repeat: true" style="background-color: black">
                  
    
                <div style="width:750px;height:500px;" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">
    
                  <ul class="uk-slideshow-items">
                      <li>
                          <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                              <img src="classe/img/cardio1.jpg" alt="" uk-cover>
                          </div>
                      </li>
                      <li>
                          <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                              <img src="classe/img/cardio2.jpg" alt="" uk-cover>
                          </div>
                      </li>
                      <li>
                          <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                              <img src="classe/img/cardio3.jpg" alt="" uk-cover>
                          </div>
                      </li>
                  </ul>
              
                  <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                  <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
              
              </div>
              </div>
          </div>
          
      </div> 
      
  </div>
  <div class="uk-width-1-3@m uk-flex-first">
    <div class="left">
      <h3 class="uk-article-title" style="margin-top:-230px; text-align:center;">Fitness Cardio</h3>
      <p>Build a true fighting machine with boxing and kickboxing classes. We honor the fighting traditions by rigorously adapting them into hard-hitting martial arts classes that will bring out your inner warrior.</p>
      <p uk-margin>
        <button class="l" ><span><a  style="text-decoration:none; color:white;"href="{{'registration'}}"> try now</a></span>
          </div>
          </div>  

</div>
@include('footer')
    <!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit-icons.min.js"></script>
</body>
</html>