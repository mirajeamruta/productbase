<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal1 {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content1 {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>



<div class='container'>
    <div id="section1">
        <!-- Modal HTML -->


        <!-- Modal HTML -->
        <div id="myModal">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sign In</h4>

                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>Main/login_validation" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="balunand_id_no" placeholder="Username" required="required">

                                    <span class="text-danger"><?php echo form_error('balunand_id_no'); ?></span>

                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" id="email" class="form-control" name="official_email" placeholder="Email" required="required">

                                    <span class="text-danger"><?php echo form_error('official_email'); ?></span>

                                </div>
                            </div> -->

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                            </div>

                            <h6 style="margin-top: -18px;"><a href="#" id="myBtn">Forgot Password?</a></h6>

                            <?php
                            echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- The Modal -->
<div id="myModal1" class="modal1">

    <!-- Modal content -->
    <div class="modal-content1">
        <div class="modal-header1">
            <!-- <span class="close">&times;</span> -->
          </div>
        <div class="modal-body1">
        </div>

        <form onsubmit="return false;" method="post" id="resetForm">
        <div class="form-group">
         <label for="name" id="reset_email_label">Email</label>
          <input
            type="email"
            class="form-control"
            id="rest_Email"
            name="rest_Email"
            placeholder="Enter your email">
        </div>
        <p style="color:green; margin-left: 90px; display:none" id="reset_password_success">Password reset link has be sent Successfully in your Email.</p>
        <button
          type="submit"
          id="reset_password_btn"
          class="btn btn-primary btn-block">
           ResetPassword
        </button>
        <button style="display:none; width: 73px;border-radius: 4px;background: blue;color: white; border: none;height: 35px;margin-left: 261px;"
          type="submit"
          id="reset_password_btn1">
          
      <a style="color: ghostwhite;" href="<?= base_url("Resetpassword_Controller/Resetpassword") ?>"> OK</a>      
        </button>
    </div>
    </form>
</div>


<script>
    // Get the modal
    var modal1 = document.getElementById("myModal1");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal1.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal1.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>



<script>

    document.getElementById('reset_password_btn').addEventListener('click',function(){
        document.getElementById('reset_email_label').style.display="none";
        document.getElementById('rest_Email').style.display="none";

        document.getElementById('reset_password_success').style.display="block";
        document.getElementById('reset_password_btn1').style.display="block";
        document.getElementById('reset_password_btn').style.display="none";
        
        
    })
    document.getElementById('reset_password_btn1').addEventListener('click',function(){
     
        document.getElementById("myModal1").style.display="none";
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