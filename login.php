<?php

include("db.php");
session_start();

if (isset($_SESSION['uid'])) {
  header("location:user.php");
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
    <link rel="icon" type="image/png" href="./assets/img/2.jpeg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
      }
    </style>
  </head>

  <body>
    <section class="gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>
                  <?php

                  if (isset($_GET['msg'])) {

                    if ($_GET['msg'] == 'success') {
                  ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Account Registered Successfully</strong>
                      </div>
                    <?php

                    }

                    if ($_GET['msg'] == 'wrong_email') {
                    ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Email Not Registered</strong>
                      </div>
                    <?php

                    }

                    if ($_GET['msg'] == 'wrong_pass') {

                    ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Password Wrong</strong>
                      </div>
                  <?php

                    }
                  }

                  ?>

                  <form action="login.php" method="post">

                    <div class="form-outline form-white mb-4">
                      <input type="email" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="typeEmailX">Email</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password" class="form-control form-control-lg" />
                      <label class="form-label" for="typePasswordX">Password</label>
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="type" id="">
                        <option value="user" selected>User</option>
                        <option value="debuger">Debuger</option>
                        <option value="admin">Admin</option>
                      </select>
                      <label for="">User Type</label>
                    </div>

                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                    <input class="btn btn-outline-light btn-lg px-5" type="submit" name="login" value="Login">
                  </form>
                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                  </div>
                </div>
                <div>
                  <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
    $password = $_POST['password'];
    $type = $_POST['type'];

    $fetch_data = $con->query("SELECT * FROM `user` WHERE `email`='$email' ");
    $count_data = mysqli_num_rows($fetch_data);
    $user_data = mysqli_fetch_array($fetch_data);

    if ($count_data > 0) {

      if ($password == $user_data['password']) {
        $_SESSION['uid'] = $user_data['id'];
        $_SESSION['uname'] = $user_data['uname'];
  ?>
          <script>
            window.location.href = "user.php?question=true";
          </script>
        <?php
          // echo "<script>window.open('user.php','_self')</script>";
        } else {
        ?>
        <script>
          window.location.href = "login.php?msg=wrong_pass";
        </script>
      <?php
        //  header("location:login.php?msg=wrong_pass");
      }
    } else {
      ?>
      <script>
        window.location.href = "login.php?msg=wrong_email";
      </script>
<?php
      //  header("location:login.php?msg=wrong_email");
    }
  }
}
?>