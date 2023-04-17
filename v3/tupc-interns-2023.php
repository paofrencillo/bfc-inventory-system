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

      .flip-card {
        background: rgba(109, 82, 82, 0.5);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.5);
        backdrop-filter: blur(1px);
        -webkit-backdrop-filter: blur(1px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        width: 100%;
        height: 300px;
      }

      .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      }

      .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
      }

      .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
      }

      .flip-card-back {
        transform: rotateY(180deg);
      }

      .avatar-md {
        height: 100px !important;
        object-fit: cover;
      }
      .motto {
        font-size: 16px;
      }

      .fb-links, .fb-links:hover {
        color: white;
        text-decoration: none;
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
            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100 d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/cj-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">CJ Areglado</h5>
                          <small class="font-size-10 text-white mb-1">RDU Supervisor</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “I love being married. It’s so great to find that one special person you want to annoy for the
                        rest of your life.” ~ Rita Rudner
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/rey-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Rey Asilo</h5>
                          <small class="font-size-10 text-white mb-1">Accounting Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "The purpose of our lives is to be happy." ~ Dalai Lama
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/nedz-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Nedz Baybay</h5>
                          <small class="font-size-10 text-white mb-1">SO God Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "Never let the fear of striking out keep you from playing the game." ~ Babe Ruth
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/pao-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Pao Frencillo</h5>
                          <small class="font-size-10 text-white mb-1">Web Developer/Designer</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “Zǎo shang hǎo zhōng guó! Xiàn zài wǒ yǒu BING CHILLING Wǒ hěn xǐ huān BING CHILLING.” ~ John Cena
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="https://www.facebook.com/paopaolopaoloo" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/ryan-avatar.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Ryan Dela Cruz</h5>
                          <small class="font-size-10 text-white mb-1">Inventory Master</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “The whole secret of a successful life is to find out what is one’s destiny to do, and then do it.” ~ Henry Ford
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/cef-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Cefrin Paanod</h5>
                          <small class="font-size-10 text-white mb-1">Inventory Manager</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “Curiosity about life in all of its aspects, I think, is still the secret of great creative people.” ~ Leo Burnett
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/ron-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Roniel Kilario</h5>
                          <small class="font-size-10 text-white mb-1">SO God Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "Don’t settle for what life gives you; make life better and build something." ~ Ashton Kutcher
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/miole.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Chrichelle Miole</h5>
                          <small class="font-size-10 text-white mb-1">RDU Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "When we do the best we can, we never know what miracle is wrought in our life or the life of another." ~ Helen Keller
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/corpuz.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Joycelyn Corpuz</h5>
                          <small class="font-size-10 text-white mb-1">RDU Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “Life is ten percent what happens to you and ninety percent how you respond to it.” ~ Charles Swindoll
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/tomas.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Nefetina Tomas</h5>
                          <small class="font-size-10 text-white mb-1">RDU Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "Too many of us are not living our dreams because we are living our fears." ~ Les Brown
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/sean-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Sean Monacillo</h5>
                          <small class="font-size-10 text-white mb-1">Web Designer/Developer</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "Don't stop when you're tired. Stop when you're done" ~ Johnny
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/mel-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Melisa Manalili</h5>
                          <small class="font-size-10 text-white mb-1">PRF Master Organizer</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "It takes 20 years to build a reputation and five minutes to ruin it. If you think about that, you'll do things differently." ~ Warren Buffett
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/mico-avatar.JPG" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Mico San Pablo</h5>
                          <small class="font-size-10 text-white mb-1">Inventory Big Boy</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                      "Do not dwell in the past, do not dream of the future, concentrate the mind on the present moment." ~ Buddha
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/lerry-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Lerry Laungayan</h5>
                          <small class="font-size-10 text-white mb-1">Inventory Silencer</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “Be nice to people on the way up, because you may meet them on the way down.” ~ Jimmy Durante
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/dante-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Dante Tiagan</h5>
                          <small class="font-size-10 text-white mb-1">Endorsement Big Boy</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "In the long run, the sharpest weapon of all is a kind and gentle spirit." ~ Anne Frank
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/valuemed-logo.png" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Monique Mana-ay</h5>
                          <small class="font-size-10 text-white mb-1">Accounting Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        "Living an experience, a particular fate, is accepting it fully." ~ Albert Camus
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 g-4">
              <div class="flip-card">
                <div class="flip-card-inner" onmouseenter="playz();" onmouseleave="stopz();">
                  <div class="flip-card-front">
                    <div class="tom"
                          style="border-radius: 10px; width: 100%; height: 100%;
                                position: absolute; background-image: url(dist/img/tom-and-jerry-ching-cheng-hanji.gif);
                                background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <div class="card-body d-flex flex-column justify-content-between align-items-stretch h-100">
                      <div class="d-flex align-items-center">
                        <div><img src="dist/img/mark-avatar.jpg" alt="" width="100px" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                          <h5 class="font-size-16 text-white mb-1 text-decoration-underline">Mark Orcullo</h5>
                          <small class="font-size-10 text-white mb-1">Buraot God Specialist</small>
                        </div>
                      </div>
                      <div class="mb-1 pt-1 text-white motto text-center">
                        “You can’t put a limit on anything. The more you dream, the farther you get.” ~ Michael Phelps
                      </div>
                      <div class="btn btn-primary btn-md d-flex w-100 align-items-center justify-content-center">
                        <a href="#" class="fb-links">
                          <i class="fab fa-facebook me-2"></i>
                          Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <audio id="my_audio" src="dist/mp3/wet-fart-6139.mp3"></audio>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function playz() {
      let y = document.getElementById("my_audio");
      setTimeout(function () {      
        y.play();
      }, 100);

    }

    function stopz() {
      let y = document.getElementById("my_audio");
      y.pause();
      y.currentTime = 0;
    }
  </script>

  </body>
  </html>
<?php } ?>