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
            <div class="card-body p-5 ">
              <form action="register.php" method="post">
                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                  <p class="text-white-50 mb-5">Please enter your Details!</p>
                  <?php

                  if (isset($_GET['msg'])) {

                    if ($_GET['msg'] == 'already') {
                  ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Account Exist</strong>
                      </div>

                  <?php

                    }
                  }

                  ?>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <div class="form-group">
                      <label for="">User Type</label>
                      <select class="form-control" name="type" id="">
                        <option></option>
                        <option value="Admin">Admin</option>
                        <option value="Debuger">Debuger</option>
                        <option value="User">User</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Contact</label>
                    <input type="phonenumber" name="contact" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <!-- <label class="form-label" for="typePasswordX">Gender</label>
                    <input type="text" name="gender" class="form-control form-control-lg" /> -->
                    <div class="form-group">
                      <label for="">Gender</label>
                      <select class="form-control" name="gender" id="">
                        <option></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="text-center">
                    <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Register" name="reg">
                  </div>

                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                  </div>

                </div>

              </form>
              <div>
                <p class="mb-0">Do you have an account already? <a href="login.php" class="text-white-50 fw-bold">Login Up</a>
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

if (isset($_POST['reg'])) {

  $uname = $_POST['name'];
  $type = $_POST['type'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $contact = $_POST['contact'];
  $gender = $_POST['gender'];

  $check_email = $con->query("SELECT * FROM `user` WHERE `email`='$email'");

  $count = mysqli_num_rows($check_email);

  if ($count > 0) {

?>

    <script>
      window.location.href = "register.php?msg=already";
    </script>

    <?php

    // header("location:register.php?msg=already");
  } else {

    $insert = $con->query("INSERT INTO `user`(`uname`, `type`, `email`, `password`,`contact`,`gender`)  VALUES ('$uname', '$type', '$email', '$pass','$contact','$gender')");

    if ($insert) {
    ?>
      <script>
        window.location.href = "login.php?msg=success";
      </script>
<?php
      // header("location:login.php?msg=success");
    }
  }
}

?>