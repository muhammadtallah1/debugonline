<?php

include("db.php");
session_start();

if (isset($_SESSION['id'])) {
  header("location:index.php");
} else {



?>

  <!doctype html>
  <html lang="en">

  <head>
    <title>Log In</title>
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
        /* Should be removed. Only for demonstration */
      }

      .btn {
        background-color: #d5f4e6;
      }
    </style>
  </head>

  <body>
    <div class="column">

      <img src="images/1.jpg" alt="" srcset="" style="padding-top: 90px">
    </div>

    <div class="column">
      <section class="vh-100 gradient-custom" style="float: left;">
        <div class="container py-5 h-100">
          <div class="row d-flex  align-items h-100">
            <div class="">
              <div class="card bg- text-black" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">LOGIN</h2>
                    <p class="text-dark-50 mb-5">Please enter your email and password for login!</p>
                    <?php

                    if (isset($_GET['msg'])) {

                      if ($_GET['msg'] == 'success') {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong> Your Account is Registered Successfully <br> Congratulations!</strong>
                        </div>
                      <?php

                      }

                      if ($_GET['msg'] == 'wrong_email') {
                      ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Email is Incorrect. <br> Kindly Recheck.</strong>
                        </div>

                      <?php

                      }
                      if ($_GET['msg'] == 'wrong_pass') {
                      ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Password is Incorrect. <br> Kindly Recheck.</strong>
                        </div>
                    <?php

                      }
                    }

                    ?>
                    <form action="login.php" method="post">
                      <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typeEmailX">Email</label>
                        <input type="email" name="email" placeholder="Email id" class="form-control form-control-lg" />
                      </div>
                      <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="typePasswordX">Password</label>
                        <input type="password" name="pass" placeholder="password" class="form-control form-control-lg" />
                      </div>
                      <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">Forgot password?</a></p>
                      <input class="btn btn-outline-#d5f4e6 btn-lg px-5" type="submit" name="login" value="Login">
                    </form>
                  </div>
                  <div>
                    <p class="mb-0">Don't have an account? <a href="register.php" class="text-dark-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
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

  if (isset($_POST['login'])) {

    $email = $_POST['email'];

    $pass = $_POST['pass'];

    $fetch_data = $con->query("SELECT * FROM `users` WHERE `email`='$email'");

    $count_data = mysqli_num_rows($fetch_data);

    $user_data = mysqli_fetch_array($fetch_data);

    if ($count_data > 0) {

      if ($pass == $user_data['password']) {


        $_SESSION['id'] = $user_data['id'];
        $_SESSION['name'] = $user_data['name'];
        header("location:index.php");
      } else {
        header("location:login.php?msg=wrong_pass");
      }
    } else {

      header("location:login.php?msg=wrong_email");
    }
  }
}
?>