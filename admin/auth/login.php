<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  include_once('../layout/library.php');
  ?>

</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar">
    <div class="container">
      <a class="navbar-brand">PMK Exodus</a>
    </div>
  </nav>

  <!-- Kontent Login -->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
        <br><br><br>
        <h2 class="text-center">Login</h2>
        <hr>
        <form method="post" action="login_proses.php">
          <div class="form-group">
            <label>Nama</label><br>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            <label>Password</label><br>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <br>
            <button class="btn card-button btn-sm" type="submit" value="login"> Login </button>
          </div>
        </form>
      </div>
      <div class="col-sm-4">
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

</body>

</html>