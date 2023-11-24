
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Use a specific version of Font Awesome (e.g., version 5) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Use Bootstrap 5 CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Use your custom CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    

<div class='logo'>
		<img src='http://localhost/kriyasheela-p2/kriyasheela/images/ca_logo.png' width='95' height='45'> 
</div>


    <section class="wrapper">
		<div class="container">
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center" style="margin-top: 53px;">
			
				<form class="rounded bg-white shadow p-5"  id="pwreset" method="post"  action="<?= base_url('Resetpassword_Controller/changePassword') ?>">
          <h3 class="text-dark fw-bolder fs-4 mb-2" style="margin-top: -21px; ">Update Password</h3>
					<div class="form-floating mb-3" style="margin-top: 39px;">
						<input type="email" name="officialEmail" class="form-control" id="floatingInput" placeholder="name@example.com">
						
					
						<label for="floatingInput" id="user_email">Email address</label>
					</div>  
          <div class="form-floating mb-3">
						<input type="password" name="n-password" class="form-control" id="inputfield1" placeholder="newPassword" onkeyup="validatePassword(this.value);" required>
                        <i class="far fa-eye" id="togglePassword1" style="position: absolute; top: 50%; right: 10px; font-weight: 900; transform: translateY(-50%); cursor: pointer;"></i>

						<span id="pwdmsg" ></span>
						<label for="floatingInput">New Password</label>
					</div> 
          <div class="form-floating mb-3">
						<input type="password" class="form-control"  name="c-password" id="inputfield2" placeholder="confirmPassword" onkeyup="validate_password()" required>
                        <i class="far fa-eye" id="togglePassword2" style="position: absolute; top: 50%; right: 10px; font-weight: 900; transform: translateY(-50%); cursor: pointer;"></i>

						<span id="wrong_pass_alert" ></span>
						<label for="floatingInput">Confirm Password</label>
					</div> 
					<button type="submit" class="btn btn-primary submit_btn w-100 my-4" name="reset" id="formbtn" onclick="wrong_pass_alert()">Reset Password</button>
                 
				</form>
				<span id="resetPasswordMsg">
					<?php if ($this->session->flashdata('success')) { ?>
								
					 <?=$this->session->flashdata('success') ?> 
					
					<?php } ?>
					</span>
			</div>
		</div>
	</section>
</body>
</html>






<script>
        function validate_password() {
            // alert("hlo");
 
            var inputfield1 = document.getElementById('inputfield1').value;
            var inputfield2 = document.getElementById('inputfield2').value;
            if (inputfield1 != inputfield2) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                    = '☒ Use same password';
                document.getElementById('formbtn').disabled = true;
                document.getElementById('formbtn').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('formbtn').disabled = false;
                document.getElementById('formbtn').style.opacity = (1);
            }
        }
 
        function wrong_pass_alert() {
            if (document.getElementById('inputfield1').value != "" &&
                document.getElementById('inputfield2').value != "") {
                alert("Your response is submitted");
            } else {
                alert("Please fill all the fields");
            }
        }
    </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<script>
const togglePassword1 = document.querySelector('#togglePassword1');
  const npassword = document.querySelector('#inputfield1');
  
  togglePassword1.addEventListener('click', function (e) {
   
    const type = npassword.getAttribute('type') === 'password' ? 'text' : 'password';
    npassword.setAttribute('type', type );
    
    this.classList.toggle('fa-eye-slash');

});

</script>


<script>
const togglePassword2 = document.querySelector('#togglePassword2');
 
  const cpassword = document.querySelector('#inputfield2');

  togglePassword2.addEventListener('click', function (e) {
    
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type );
    
    this.classList.toggle('fa-eye-slash');

});

</script>


<!-- Password Validation -->


           <script>
            function validatePassword(password) {
                
                // Do not show anything when the length of password is zero.
                if (password.length === 0) {
                    document.getElementById("pwdmsg").innerHTML = "";
                    return;
                }
                // Create an array and push all possible values that you want in password
                var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&]"); // Special Charector
                matchedCase.push("[A-Z]");      // Uppercase Alpabates
                matchedCase.push("[0-9]");      // Numbers
                matchedCase.push("[a-z]");     // Lowercase Alphabates

                // Check the conditions
                var ctr = 0;
                for (var i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(password)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "Password is Weak";
                        color = "red";
                        break;
                    case 3:
                        strength = "Password is Medium";
                        color = "orange";
                        break;
                    case 4:
                        strength = "Password is Strong";
                        color = "green";
                        break;
                }
                document.getElementById("pwdmsg").innerHTML = strength;
                document.getElementById("pwdmsg").style.color = color;
            }
        </script>





