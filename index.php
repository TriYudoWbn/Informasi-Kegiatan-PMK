<!DOCTYPE html>
<html lang="en">
  <head>
    <link href='favicon.ico' rel='shortcut icon' type='image/x-icon'/>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css" />

    <title>PMK Exodus</title>
    
    <!-- Add to home screen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Dicoding News Reader">
    <link rel="apple-touch-icon" href="icon-192.png">

    <!-- Tile icons for Windows -->
    <meta name="msapplication-TileImage" content="icon-192.png">
    <meta name="msapplication-TileColor" content="#751aff">
    <meta name="msapplication-starturl" content="index.html">
    <meta name="msapplication-navbutton-color" content="#607d8b">

    <link rel="manifest" href="manifest.json" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#751aff" />
    
    <!--Notifikasi-->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
      var OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "cac4891a-72a6-43b7-937e-dbf115060d8e",
          promptOptions: {
            actionMessage: "We'd like to show you notifications for the latest news and updates.",
            acceptButtonText: "ALLOW",
            cancelButtonText: "NO THANKS"
          }
        });
        OneSignal.showSlidedownPrompt();
      });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  </head>
  <body>

  		  <!-- NAVBAR -->      
	      <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar">
	        <div class="container">
	            <a class="navbar-brand">PMK Exodus</a>
	              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	                  <span class="navbar-toggler-icon"></span>
	              </button>
	        <div class="collapse navbar-collapse" id="navbarNav">

	        <div class="navbar-nav">
	            <a class="nav-item nav-link" href="user/kegiatan/info_kegiatan.php">Kegiatan</a>
	            <a class="nav-item nav-link" href="user/artikel/info_artikel.php">Artikel</a>
	        </div>
	        </div>
	        </div>
	      </nav>
   
        <!-- JUMBOTRON -->
        <br><br>
        <div class="container text-center">
        <div class="jumbotron">
              <br>
              <h1 class="display-4">PMK Exodus</h1>
              <p class="lead">Persekutuan Mahasiswa Kristen Exodus STMIK Akakom</p>
            </div>
        </div>

      <!-- ABOUT -->
      <div class="container">
          <div class="row mb-4 text-center">
             <div class="col">
                <h1>About</h1>

             </div>
          </div>

          <div class="row">
              <div class="col text-justify">
                 <p>PMK Exodus adalah salah satu unit kegiatan mahasiswa kerohaniaan kristen di STMIK Akakom Yogyakarta. PMK Exodus ini di resmikan pada tanggal 2 juni 1997. PMK Exodus ini berfungsi untuk menampung seluruh mahasiswa yang beragama kristen di STMIK Akakom Yogyakarta. Kegiatan dari PMK Exodus adalah ibadah bersama di hari jumat, kegiatan keakraban antara anggota, kegiatan Natal dan Paskah, dan doa bersama untuk anggotanya. Hadirnya aplikasi exodus ini berfungsi untuk membantu mahasiswa kristen STMIK Akakom Yogyakarta untuk mendapat informasi kegiatan PMK Exodus yang akan di adakan oleh pengurus harian PMK Exodus. Selain informasi kegiatan, pada aplikasi ini juga tersedia cerita rohani dan kesaksian anggota yang ingin di bagikan ke teman-teman anggota PMK Exodus.</p>
                 <br><br>
              </div>
          </div>
      </div>

      <!--Footer-->
      <footer class="footer text-white fixed-bottom">
          <div class="container">
              <div class="row text-center">
                  <div class="col">
                      <p>God Bless You</p>
                  </div>
              </div>
          </div>
      </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- script service worker -->
    <script>
           if ('serviceWorker' in navigator) {
              console.log('Service Worker');
              navigator.serviceWorker.register('sw.js')
                .then(function(swReg){
                  console.log('Service Worker is registered', swReg);

                  swRegistration = swReg;
                })
                .catch(function(error){
                  console.error('Service Worker Error', error);
                });
           }
    </script>

  </body>
  </html>