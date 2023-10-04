<!DOCTYPE html>
<html lang="en">

<head>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const video = document.querySelector('.video-container video');

    const options = {
      root: null,
      rootMargin: '0px',
      threshold: 0.5
    };

    const handleIntersection = (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          video.play();
        } else {
          video.pause();
        }
      });
    };

    const observer = new IntersectionObserver(handleIntersection, options);
    observer.observe(video);
  });
</script>

<style>
  .image-container {
  width: 200px;
  height: 200px;
  text-align: right;
  display: flex;
  
  justify-content: center;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  transform: scale(2); 
  
}


.video-container {
  width: 1300px;
  height: 600px;
  position: relative;
}

.video-container video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 68%;
  left: 45%;
  transform: translate(-50%, -50%);
}





</style>

  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->


  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/imagess/logo2.png">
 
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
 
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  



  <title>Page d'Acceuil</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="acceuil/css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="acceuil/css/style.css">
  
  <!-- Responsive-->
  <link rel="stylesheet" href="acceuil/css/responsive.css">
  <!-- fevicon -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="icon" href="acceuil/images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="acceuil/css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/acceuil/css/font-awesome.css">  -->
  <!-- owl stylesheets -->
  <link rel="stylesheet" href="acceuil/css/owl.carousel.min.css">
  <link rel="stylesheet" href="acceuil/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
</head>

<body>
  <!-- header top section start -->
  <div class="row mt-1">
        <div class="col-lg-12 mb-lg-0 mb-10">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
  <div class="header_top_section">
    <div class="container">
      <section  id="targetSection3">
      <div class="rounded-3">
      <div class="header_main">
        <!-- <div class="location_text"><img src="images/map-icon.png"><span class="padding_left_10"><a
              href="#">Location</a></span></div> -->
        <div class="location_text center"><img src="acceuil/images/call-icon.png"><span class="padding_left_10"><a href="#">Call
              ; 05 35111111</a></span></div>
        <div class="location_text right"><img src="acceuil/images/mail-icon.png"><span class="padding_left_10"><a
              href="#">ByBus@gmail.com</a></span></div>
      </div>
      </div>
      
      </section>
      <script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href="#targetSection3"]');

    links.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection3 = document.querySelector(targetId);
        if (targetSection3) {
          targetSection3.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
  });
</script>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- header top section end -->
  <!-- header section start -->
  <div class="row mt-2">
        <div class="col-lg-15 mb-lg-0 mb-10">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
  <div class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="logo" href="index.html"><img src="assets/img/logosite.png" height="200" width="200"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Acceuil</a>
            </li>
            <li class="nav-item">
              <a  class="nav-link" href="#targetSection">Savoir plus</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="contact.html">S'inscrire</a>
            </li>
          </ul>
         
        </div>
      </nav>
    </div>
    <!-- banner section start -->
    <div class="banner_section layout_padding">
      <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1 class="banner_taital">Aller/Retour en autocar avec ByBus</h1>
                  <p class="banner_text">Une plateforme logicielle complète dont l’objectif est de proposer des services de transport en commun plus équitables, durables et efficaces aux autorité organisatrice de la mobilité, opérateurs, régies de transport public, villes, chauffeurs et usagers.</p>
                  <div class="btn_main">
                    <div class="read_bt" class="rounded-3"><a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"href="#targetSection">Savoir plus</a></div>
                    <div class="contact_bt active"><a class="btn btn-outline-primary btn-sm mb-0 me-3" href="{{route('registerC')}}">S'inscrire</a></div>
                  </div>
                </div>
                <div class="col-md-4">
                <div style="position: absolute; top: -45px; left: 130px; margin-top: 1px; height: 600px; width: 600px;" class="image_1">
  <img src="assets/imagess/auto20.png">
</div>                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1 class="banner_taital">Pourquoi choisir de voyager à bord d’un autocar au Maroc ?</h1>
                  <p class="banner_text">En solo ou en groupe, voyager en autocar à travers le Maroc permet de voyager confortablement en toute sécurité et à moindre coût. Grâce à notre large flotte d’autocars, vous pouvez voyager à petits prix partout au Maroc.</p>
                  <div class="btn_main">
                    
                    <div class="read_bt"><a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"href="#targetSection">Savoir plus</a></div>
                    <div class="contact_bt active"><a class="btn btn-outline-primary btn-sm mb-0 me-3" href="{{route('registerC')}}">S'inscrire</a></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="image_1"><img src="assets/img/map.png"  height="450" width="450"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1 class="banner_taital">Explorez notre site en toute sécurité </h1>
                  <p class="banner_text">Inscrivez-vous dès maintenant sur notre site et naviguez en toute sécurité pour profiter de nos offres d'abonnement de navettes des autocars. Rejoignez notre communauté de voyageurs et commencez dès maintenant à explorer de nouvelles aventures en autocar!</p>
                  <div class="btn_main">
                    <div class="read_bt"><a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"href="#targetSection" >Savoir plus</a></div>
                    <div class="contact_bt active"><a class="btn btn-outline-primary btn-sm mb-0 me-3"   href="{{route('registerC')}}">S'inscrire</a></div>
                  </div>
                </div>
                <div class="col-md-3">
  <div style="margin-left: 200px; margin-top:100px; top:-80px; height: 240px; width: 240px;" class="image-container">
    <img src="assets/img/img3.png" alt="Ma Image">
  </div>
</div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
    <!-- banner section end -->
    </div>
  </div>
  </div>
  </div>
  </div>
  

  </div>

  

  <!-- header section end -->
  <!-- about section start -->
  <section id="targetSection">
  <div class="container">
  <h1 class="about_taital">Découvrez le fonctionnement de notre service de réservation d'autocars</h1>
  
  <div class="video-container">
    <video class="rounded-3" src="assets/imagess/representation.mp4" autoplay muted loop controls></video>
  </div>


  </div>
  </section>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href="#targetSection"]');

    links.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        if (targetSection) {
          targetSection.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
  });
</script>
  
</br>
</br>



  <div class="about_section layout_padding">
    <div class="container">
      <h1 class="about_taital">Voyagez à petits prix avec ByBus</h1>
      <p class="about_text">Découvrez nos prix imbattables et notre flotte de véhicules exceptionnels ! Profitez de tarifs compétitifs qui s'adaptent à tous les budgets, sans compromis sur la qualité. Nos véhicules modernes et bien entretenus offrent un confort optimal et une expérience de voyage inégalée.</p>
      <div class="about_section_2">
        <div class="row">
          <div class="col-md-40">
            <div class="image"><img src="assets/img/banniere.png" height="5000" width="5000"></div>
          </div>
         
      </div>
      <p class="about_text">Plongez dans une aventure sans souci avec des prix attractifs et des véhicules de première classe à votre disposition !</p>
      <div class="readmore_bt"><a href="#targetSection2">Savoir plus</a></div>
    </div>
  </div>
  <!-- about section end -->
  <!--  blog section start -->
  <div class="blog_section layout_padding>
    <div class="container-fluid">
      <h1 class="blog_taital" style=" top: -2px;">Découvrez Nos Offres</h1>
      <p class="blog_text">Notre objectif est de vous offrir une solution de transport fiable, flexible et abordable pour répondre à tous vos besoins en matière de navettes d'autocars</p>
     
     
      <section id="targetSection2">
  <div class="container">
  <h1 class="about_taital">Découvrez le fonctionnement de notre service de réservation d'autocars</h1>
  
  <div class="video-container" style=" top: -10px;">
    <video class="rounded-3"src="assets/imagess/presentaionOffres.mp4" autoplay muted loop controls></video>
  </div>


  </div>
  </section>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href="#targetSection2"]');

    links.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        if (targetSection2) {
          targetSection2.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
  });
</script>
     
     
     
     
     
     
     
     
     
     
    
    </div>
  </div>
  <!--  blog section end -->
  <!--  repair section start -->
  
  <!--  repair section end -->
  <!-- contact section start -->
 
  <!-- contact section end -->
  <!-- footer section start -->

  <div class="footer_section" style=" margin-top: 20px;">

    <div class="container">
      <div class="footer_location_text">
        <ul>
          <li><img src="images/map-icon.png"><span class="padding_left_10"><a href="#">ByBys
                web</a></span></li>
          <li><img src="images/call-icon.png"><span class="padding_left_10"><a href="#">Call : 0537111111</a></span>
          </li>
          <li><img src="images/mail-icon.png"><span class="padding_left_10"><a href="#">bybuso@gmail.com</a></span></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <h2 class="useful_text">Liens utiles</h2>
          <div class="footer_menu">
            <ul>
              <li><a href="#targetSection3">Acceuil</a></li>
              <li><a href="#targetSection">Savoir plus</a></li>
              <li><a href="{{route('registerC')}}">S'inscrire</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <h2 class="useful_text">ByBus</h2>
          <p class="lorem_text">Explorez les fonctionnalités, les options de personnalisation, et les avantages offerts par notre service.  </p>
        </div>
        <div class="col-lg-3 col-sm-6">
          <h2 class="useful_text">Réseaux sociaux</h2>
          <div class="social_icon">
            <ul>
              <li><a href="#"><img src="images/fb-icon.png"></a></li>
              <li><a href="#"><img src="images/twitter-icon.png"></a></li>
              <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
              <li><a href="#"><img src="images/youtub-icon.png"></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <h1 class="useful_text">Réparation</h1>
          <p class="footer_text">En cas de problème, veuillez nous envoyer un e-mail à notre adresse ou nous appeler. </p>
        </div>
      </div>
    </div>
  </div>
  <!-- end info section -->
  <!-- footer section end -->
  <!-- copyright section start -->
  
  <!-- copyright section end -->
  <!-- Javascript files-->

  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->



  <script src="acceuil/js/jquery.min.js"></script>
  <script src="acceuil/js/popper.min.js"></script>
  <<script src="acceuil/js/bootstrap.bundle.min.js"></script>
  <script src="acceuil/js/jquery-3.0.0.min.js"></script>
  <script src="acceuil/js/plugin.js"></script>
  <!-- sidebar -->
  <script src="acceuil/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="acceuil/js/custom.js"></script>
  <!-- javascript -->
  <script src="acceuil/js/owl.carousel.js"></script>
  <!--<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
-->




  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>