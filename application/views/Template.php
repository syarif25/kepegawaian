
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url() ?>assets/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/1.png" type="image/x-icon">
   

    <title>SIMPEG - Sistem Informasi Kepegawaian FIK UNIB</title>
    <?php $this->load->view($css); ?>
  </head>
  <body> 
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"> <span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url() ?>assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
              <!-- <div class="d-flex h-100"> <img src="<?php echo base_url() ?>assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400"><span class="font-primary">Don't Miss Out! </span><span class="f-light">Out new update has been release.</span></h6><i class="icon-arrow-top-right f-light"></i>
              </div> -->
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <li class="language-nav">
                <div class="translate_wrapper">
                  <div class="current_lang">
                    <div class="lang"><i class="flag-icon flag-icon-id"></i><span class="lang-txt">IDN                              </span></div>
                  </div>
                  
                </div>
              </li>
             
              
              <li>
                <div class="mode">
                  <svg>
                    <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#moon"></use>
                  </svg>
                </div>
              </li>
              
              <!-- <li class="onhover-dropdown">
                <div class="notification-box">
                  <svg>
                    <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#notification"></use>
                  </svg><span class="badge rounded-pill badge-secondary">4 </span>
                </div>
                <div class="onhover-show-div notification-dropdown">
                  <h6 class="f-18 mb-0 dropdown-title">Notitications                               </h6>
                  <ul>
                    <li class="b-l-primary border-4">
                      <p>Delivery processing <span class="font-danger">10 min.</span></p>
                    </li>
                    <li class="b-l-success border-4">
                      <p>Order Complete<span class="font-success">1 hr</span></p>
                    </li>
                    <li class="b-l-secondary border-4">
                      <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                    </li>
                    <li class="b-l-warning border-4">
                      <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                    </li>
                    <li><a class="f-w-700" href="#">Check all</a></li>
                  </ul>
                </div>
              </li> -->
              <li class="profile-nav onhover-dropdown pe-0 py-0">
                <div class="media profile-media"><img class="b-r-10" src="<?php echo base_url() ?>assets/images/dashboard/profile.png" alt="">
                  <div class="media-body"><span><?php echo $this->session->userdata('username'); ?></span>
                    <p class="mb-0 font-roboto"> <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="<?php echo base_url() ?>Auth/logout"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?php echo base_url() ?>assets/images/logo/logo1.jpg" alt=""><img class="img-fluid for-dark" src="<?php echo base_url() ?>assets/images/logo/logo_dark.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url() ?>assets/images/logo/logo-icon.png" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?php echo base_url() ?>assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="pin-title sidebar-main-title">
                    <div> 
                      <h6>Pinned</h6>
                    </div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6 class="lan-1">General</h6>
                    </div>
                  </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                    <label class="badge badge-light-primary"></label><a class="sidebar-link sidebar-title" href="<?php echo base_url() ?>Main">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-home"></use>
                      </svg><span class="lan-3">Dashboard          </span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Pengguna">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-user"> </use>
                      </svg><span>Pengguna</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Lembaga">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-user"> </use>
                      </svg><span>Lembaga</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Pelamar">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-user"> </use>
                      </svg><span>Pelamar</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Seleksi/berkas">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-user"> </use>
                      </svg><span>Seleksi Berkas</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Seleksi/tulis">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-user"> </use>
                      </svg><span>Seleksi Tes Tulis</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Seleksi/wawancara">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-user"> </use>
                      </svg><span>Tes Wawancara</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Magang">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-file"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-file"> </use>
                      </svg><span>Magang</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Penilaian_magang">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-file"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-file"> </use>
                      </svg><span>Penilaian Magang</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Kontrak_kerja">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-file"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-file"> </use>
                      </svg><span>Kontrak Kerja</span></a>
                    </li>
                    <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Perizinan">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-file"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-file"> </use>
                      </svg><span>Perizinan</span></a>
                    </li> -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url() ?>Auth/logout">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-file"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-file"> </use>
                      </svg><span>Log Out</span></a>
                    </li>
                    <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                      <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#fill-ecommerce"></use>
                      </svg><span>Prosedur Ijin</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="#">Ijin Pribadi</a></li>
                        <li><a href="#">Cuti</a></li>
                        <li><a href="#">SP</a></li>
                        </ul>
                    </li> -->
                  
                  <li class="sidebar-main-title">
                    <div>
                      <h6 class="lan-8">Applications</h6>
                    </div>
                  </li>
                  
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <?php $this->load->view($content); ?>
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2023 © Fakultas Ilmu Kesehatan  </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <?php $this->load->view($ajax); ?>
    <script>
      function notif(pesan) {
        toastr.success(pesan, "Berhasil", {
        positionClass: "toast-top-right",
        timeOut: 5000,
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        preventDuplicates: true,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: false,
        // Menggunakan properti css untuk mengubah warna teks menjadi kuning
        css: {
            color: "yellow"
        }
    });


    }
    </script>
  </body>
</html>