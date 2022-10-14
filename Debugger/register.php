<?php

include("db.php");

?>

<!doctype html>
<html lang="en">

<head>
  <title>Register</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    * {
      box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 300px;
    }

    .btn {
      background-color: #d5f4e6;
    }
  </style>

</head>

<body>

  <div class="column">
    <img src="images/1.jpg" alt="" srcset="" style="padding-top: 98px">
  </div>
  <div class="column">
    <section class="vh-100 gradient-custom">
      <div class="container py-3 h-100">
        <div class="row d-flex align-items h-100">
          <div class="card bg-white text-dark" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center ">
              <form action="register.php" method="post">
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase ">REGISTER</h2>
                  <p class="text-dark-50 mb-5">Kindly Enter Your Details!</p>
                  <?php
                  if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == 'already') {
                  ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>This Account is Already Exist</strong>
                      </div>
                  <?php
                    }
                  }

                  ?>
                  <div class="column">
                    <div class="form-outline form-dark mb-4">
                      <label class="form-label" for="typeEmailX"> First Name</label>
                      <input type="text" name="name" placeholder="First Name" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                      <label class="form-label" for="typeEmailX"> Country</label>
                      <input type="text" name="country" placeholder="Country" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                      <label class="form-label" for="typeEmailX">Email</label>
                      <input type="email" name="email" placeholder="Email" class="form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="column">
                    <div class="form-outline form-dark mb-4">
                      <label class="form-label" for="typeEmailX"> Last Name</label>
                      <input type="text" name="name" placeholder="Last Name" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                      <label class="form-label" for="typeEmailX"> Contact Number</label>
                      <input type="number" name="name" placeholder="Contact no" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                      <label class="form-label" for="typePasswordX">Password</label>
                      <input type="password" name="password" placeholder="Password" class="form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="text-left">
                    Select According To Your Experties: <br> <br>
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember"> HTML</label> <br>
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember"> CSS</label> <br>
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember"> Javascript</label> <br>
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember"> SQL</label> <br>
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember"> PHP</label> <br>
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember"> Bootstrap</label> <br>
                    <a href="test.php"> Click here for Rapid Test </a>
                  </div>
              </form>
            </div>
            <br>
            <div class="text center">
              <input type="submit" class="btn btn-outline-#d5f4e6 btn-lg px-5" value="Register" name="reg">
            </div>
          </div>
          </form>
          <div>
            <p class="mb-0">Do you have an account already? <a href="login.php" class="text-dark-50 fw-bold">Login Up</a>
            </p>
          </div>
        </div>
      </div>
  </div>
  </div>
  </section>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['reg'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $check_email = $con->query("SELECT * FROM `users` WHERE `email`='$email'");
  $count = mysqli_num_rows($check_email);
  if ($count > 0) {
    ?>
    <script>
      window.location.href="register.php?msg=already";
    </script>
    <?php 
    // header("location:register.php?msg=already");
  } else {

    $insert = $con->query("INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$pass')");

    if ($insert) {
      header("location:login.php?msg=success");
    }
  }
}

?>