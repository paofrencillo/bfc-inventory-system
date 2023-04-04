<?php
session_start();
// Restrict user fron accessing the php file directly
if ($_SESSION["authenticated"] == false) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: 403.html'));
} else { ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUP-C Interns Batch 2023</title>
    <link rel="icon" type="image/png" href="dist/img/valuemed-logo1.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link rel="stylesheet" media="screen" href="/v2/plugins/particles.js-master/demo/css/style.css" />
    <style type="text/css">
      * {
        scroll-behavior: smooth;
      }
      body {
        background-color: rgb(200, 167, 167);
      }

      main {
        background: url('dist/img/gear-spin.gif') no-repeat center center fixed;
        min-height: 100vh;
      }

      h2 {
        font-weight: 1000;
        color: maroon;
        -webkit-text-stroke-width: 0.75px;
        -webkit-text-stroke-color: rgb(255, 255, 255);
        width: fit-content;
      }

      h4 {
        font-weight: 600;
        color: maroon;
      }

      .card {
        background: rgba(109, 82, 82, 0.5);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.5);
        backdrop-filter: blur(1px);
        -webkit-backdrop-filter: blur(1px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        /* transition: transform 1s; */
        position: relative;
        transform-origin: center;
        animation: spin 0.75s linear infinite;
      }

      .card:hover {
        /* background: rgba(109, 82, 82, 0.7);
        transform: scale(1.075); */
        /* transform: rotate(360deg); */
        animation: none !important;
      }

      img {
        height: 100px !important;
        object-fit: cover;
      }

      @keyframes spin {
        100% {
transform: rotate(360deg);
}
50% {
transform: rotate(180deg);
}
0% {
transform: rotate(0deg);
}
      /* 0% {
        transform: rotate(90);
        box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
        transform: translatey(0px);
      }
      50% {
        box-shadow: 0 25px 15px 0px rgba(0,0,0,0.2);
        transform: translatey(-10px);
        transform: rotate(180);
      }
      100% {
        box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
        transform: translatey(0px);
        transform: rotate(360);
      } */
    }
    </style>
  </head>

  <body>

      <main>
        <div class="container p-5">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="mb-0">TUP-C INTERNS BATCH 2023</h2>
            <a class="link-danger" href=<?php
                  if ($_SESSION["login_user"]["is_superuser"] === '1') {
                    echo 'dashboard.php';
                  } else if ($_SESSION["login_user"]["is_superuser"] === '0') {
                    echo 'z-dashboard.php';
                  }
                  ?>>
              <h4 class="mb-0"><i class="bx bx-left-arrow-circle me-1"></i>Dashboard</h4>
            </a>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/cj-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">CJ Areglado</h5>
                      <small class="font-size-10 text-white mb-1">RDU Supervisor</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/rey-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Rey Asilo</h5>
                      <small class="font-size-10 text-white mb-1">Accounting Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/nedz-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Nedz Baybay</h5>
                      <small class="font-size-10 text-white mb-1">SO God Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/pao-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Pao Frencillo</h5>
                      <small class="font-size-10 text-white mb-1">Developer/Designer</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i>0998 902 9155</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>paolofrencillo07@gmail.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2" onclick="window.location.href = 'https://www.facebook.com/paopaolopaoloo';">
                      <i class="bx bxl-facebook-circle me-1"></i>Pao Frencillo
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/ryan-avatar.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Ryan Dela Cruz</h5>
                      <small class="font-size-10 text-white mb-1">Inventory Master</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/cef-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Cefrin Paanod</h5>
                      <small class="font-size-10 text-white mb-1">Inventory Manager</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/ron-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Roniel Kilario</h5>
                      <small class="font-size-10 text-white mb-1">SO God Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/miole.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Chrichelle Miole</h5>
                      <small class="font-size-10 text-white mb-1">RDU Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/corpuz.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Celyna Corpuz</h5>
                      <small class="font-size-10 text-white mb-1">RDU Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/tomas.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Nefetina Tomas</h5>
                      <small class="font-size-10 text-white mb-1">RDU Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/sean-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Sean Monacillo</h5>
                      <small class="font-size-10 text-white mb-1">Web Designer/Developer</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 09169322101</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      s.monacillo59@gmail.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Sean Monacillo</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/mel-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Melisa Manalili</h5>
                      <small class="font-size-10 text-white mb-1">PRF Master Organizer</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 09666759170</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      melsmanalili@gmail.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Melisa Manalili</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/mico-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Mico San Pablo</h5>
                      <small class="font-size-10 text-white mb-1">Inventory Big Boy</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/lerry-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Lerry Laungayan</h5>
                      <small class="font-size-10 text-white mb-1">Inventory Silencer</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/dante-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Dante Tiagan</h5>
                      <small class="font-size-10 text-white mb-1">Endorsement Big Boss</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Monique Mana-ay</h5>
                      <small class="font-size-10 text-white mb-1">Accounting Specialist</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 g-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div><img src="dist/img/mark-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                    <div class="flex-1 ms-3">
                      <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Mark Orcullo</h5>
                      <small class="font-size-10 text-white mb-1">Buraot God Specialist Supervisor</small>
                    </div>
                  </div>
                  <div class="mt-3 pt-1">
                    <p class="text-white mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-white"></i> 070
                      2860 5375</p>
                    <p class="text-white mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-white"></i>
                      PhyllisGatlin@spy.com</p>
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-primary w-100 mt-2"><i class="bx bxl-facebook-circle me-1"></i>
                      Contact</button>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </main>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="/v2/plugins/particles.js-master/particles.js"></script>
  <script src="/v2/plugins/particles.js-master/demo/js/app.js"></script>
  <!-- stats.js -->
  <!-- <script src="/v2/plugins/particles.js-master/demo/js/lib/stats.js"></script> -->
    <script>
      var count_particles, stats, update;
      stats = new Stats();
      stats.setMode(0);
      stats.domElement.style.position = "absolute";
      stats.domElement.style.left = "0px";
      stats.domElement.style.top = "0px";
      document.body.appendChild(stats.domElement);
      count_particles = document.querySelector(".js-count-particles");
      update = function () {
        stats.begin();
        stats.end();
        if (
          window.pJSDom[0].pJS.particles &&
          window.pJSDom[0].pJS.particles.array
        ) {
          count_particles.innerText =
            window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
      };
      requestAnimationFrame(update);
    </script>
  </body>
  </html>
<?php } ?>