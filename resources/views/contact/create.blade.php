
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/imagess/logo2.png">
  <title>
   S'inscrire
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
    <li class="nav-item d-flex align-items-center">
          <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard">ByBus</a>
        </li>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Offres
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/profile.html">
              <i class="fa fa-user opacity-6  me-1"></i>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{route('registerC')}}">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              S'inscrire
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{route('loginC')}}">
              <i class="fas fa-key opacity-6  me-1"></i>
              Se connecter
            </a>
          </li>
        </ul>                                                                                       
        
        <ul class="navbar-nav d-lg-block d-none">
        <div class="ma-abonkkner">
      <a class="btn bg-gradient-primary mt-2 w-100" id="btn-retour" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree">retour</a>
      </div>
        </ul>
      </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnRetour = document.getElementById('btn-retour');
        btnRetour.addEventListener('click', function(event) {
            event.preventDefault(); // Prevents the default behavior of the anchor tag
            history.back();
        });
    });
</script>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Bienvenue!</h1>
              <p class="text-lead text-white">Créez votre compte chez ByBus et prenez le contrôle de vos services de navette dès aujourd’hui</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>hbnj</h5>
              </div>
              <div class="row px-xl-5 px-sm-4 px-3">
                <div class="col-3 ms-auto px-1">
                 
                </div>
                <div class="ma-img">
                  <a><img src="assets/img/logosite.png" height="90" alt="description-of-your-image"></a>

                  </div>
                <div class="col-9 px-0">
                  
                   
                  </a>
                </div>
                <div class="col-3 me-auto px-1">
                  
                </div>
                <div class="mt-2 position-relative text-center">
                 
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('registerC') }}" method="post">
                    {!! csrf_field() !!}
                  <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nom" aria-label="Nom" aria-describedby="email-addon">
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                    <input type="number" class="form-control" name="telephone" placeholder="Telephone" aria-label="Telephone" aria-describedby="email-addon">
                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="adresse" placeholder="adresse" aria-label="adresse" aria-describedby="email-addon">
                    @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="mb-3">
                  <div class="form-group">
  
  <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, dont au moins un numéro, une majuscule et un symbole (@, #, $, %)">
  @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="form-group">
  
  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" aria-label="Confirm Password">
  @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div>

                 

                  <div class="text-center">
                    <button type="submit" value="register" class="btn bg-gradient-dark w-100 my-4 mb-2">S'inscrire</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Vous avez déjà un compte ? <a href="{{ route('loginC') }}" class="text-dark font-weight-bolder">Se connecter</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
            </a>
          </div>
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Soft by Creative Tim.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
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
