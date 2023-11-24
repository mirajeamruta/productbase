<style>
  .popup {
    display: none;
    position: fixed;
    top: 97px;
    left: 570px;
  }
</style>


<!-- login code -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5 CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <!-- Custom CSS Link -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <section class="wrapper">
    <div class="login-form">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">


        <form class="rounded bg-white shadow py-5 px-4" action="<?php echo base_url(); ?>Main/login_validation" method="post">
          <div class="circlelogo">
            <i class='far fa-user-circle' style='font-size:85px'></i>
          </div>

          <h3 class="text-dark fw-bolder fs-8 mb-4" style="margin-top: 39px;">Sign In </h3>

          <div class="form-floating mb-3">
            <input type="text" name="balunand_id_no" class="form-control" id="floatingInput" placeholder="username" required="required">
            <span class="text-danger"><?php echo form_error('balunand_id_no'); ?></span>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required="required">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
            <i class="far fa-eye" id="togglePassword" style="font-weight: 900;" onclick="togglePasswordVisibility()"></i>
            <label for="floatingInput">Password</label>
          </div>

          <div class="mt-2 text-end">
            <a href="#" class="text-primary fw-bold text-decoration-none" id="showPopup">Forgot Password?</a>
          </div>

          <?php echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>'; ?>
          <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Login</button>
        </form>
      </div>
    </div>
  </section>

</body>

</html>


<!-- The Modal -->


<!-- Modal content -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <!-- Bootstrap 5 CDN Link -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <section class="wrapper">
    <div class="container" id="myModal1">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

        <div class="popup" id="forgetPasswordPopup">
          <div class="popup-content " style="  border: none;">
            <form class="rounded bg-white shadow p-5" method="POST" action="<?= base_url('send') ?>">

              <div class="lock"><i class='fas fa-lock' style='font-size:70px'></i></div>
              <h3 class="text-dark fw-bolder fs-4 mb-2" style="margin-top: 37px;">Forget Password ?</h3>
              <div class="fw-normal text-muted mb-4">
                Enter your email to reset your password.
              </div>
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <button type="submit" name="send" class="btn btn-primary submit_btn my-4">Submit</button>
              <button type="button" id="closePopup" class="btn btn-secondary submit_btn my-4 ms-3">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>






<script>
  const showPopupButton = document.getElementById('showPopup');
  const forgetPasswordPopup = document.getElementById('forgetPasswordPopup');
  const closePopupButton = document.getElementById('closePopup');

  showPopupButton.addEventListener('click', (e) => {
    e.preventDefault();
    forgetPasswordPopup.style.display = 'flex';
  });

  closePopupButton.addEventListener('click', () => {
    forgetPasswordPopup.style.display = 'none';
  });

  // Close the popup when the user clicks outside of it
  window.addEventListener('click', (event) => {
    if (event.target === forgetPasswordPopup) {
      forgetPasswordPopup.style.display = 'none';
    }
  });
</script>





<script>
  document.getElementById('reset_password_btn').addEventListener('click', function() {
    document.getElementById('reset_email_label').style.display = "none";
    document.getElementById('rest_Email').style.display = "none";

    document.getElementById('reset_password_success').style.display = "block";
    document.getElementById('reset_password_btn1').style.display = "block";
    document.getElementById('reset_password_btn').style.display = "none";


  })
  document.getElementById('reset_password_btn1').addEventListener('click', function() {

    document.getElementById("myModal1").style.display = "none";
    location.reload();
  })
</script>


<script>
  document.getElementById("resetForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the entered email
    var email = document.getElementById("rest_Email").value;

    // Call a function to send the password reset email
    sendPasswordResetEmail(rest_Email);
  });
</script>




<script>
  // Close Forget Password Form
  document.getElementById('closeForgetForm').addEventListener('click', function() {
    modal1.style.display = "none";
    // location.reload();
  })
</script>




<script>
  function sendPasswordResetEmail(rest_Email) {
    // You can use an API or a server-side script to send the email
    // Here's a simplified example using the 'fetch' function:

    // Replace 'YOUR_SERVER_ENDPOINT' with the actual endpoint on your server
    var url = 'YOUR_SERVER_ENDPOINT';

    // Create the request payload
    var payload = {
      rest_Email: rest_Email
    };

    // Send a POST request to your server
    fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      })
      .then(function(response) {
        if (response.ok) {
          alert("Password reset email sent!");
        } else {
          alert("Failed to send password reset email.");
        }
      })
      .catch(function(error) {
        console.error("Error:", error);
        alert("An error occurred while sending the password reset email.");
      });
  }
</script>


<script>
  function togglePasswordVisibility() {
    const passwordField = document.getElementById('floatingPassword');
    const togglePassword = document.getElementById('togglePassword');

    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      togglePassword.classList.remove('fa-eye');
      togglePassword.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      togglePassword.classList.remove('fa-eye-slash');
      togglePassword.classList.add('fa-eye');
    }
  }
</script>