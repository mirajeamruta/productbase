

<style>
#form-label {
    font-weight: 500;
    font-style: normal;
    font-family: sans-serif;
}
.confirm {
    width: 405px;
    max-width: 362px;
    height: 35px;
    margin-bottom: 34px;
    margin-top: 20px;
    margin-left: 49px;

}
.btnsubmit {
    background: #3040b1;
    color: #fff;
    display: inline-block;
    font-size: 19px;
    width: 181px;
    height: 43px;
    padding: 8px 14px 7px 10px;
    border-radius: 5px 5px 5px 5px;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    border: none;
    margin-left: 48px;
}

.align{
    margin-left: -191px; 
    font-weight: 500;
    font-style: normal;
    font-family: sans-serif;
    margin-top:11px;
}

.align1{
    margin-left: -131px;
    font-weight: 500;
    font-style: normal;
    font-family: sans-serif;
    margin-top: 3px;
}
input#user_email_input {
    position: relative;
    padding-left: 9px;
    left: 27px;
    height: 36px;
    bottom: 17px;
    width: 362px;
}
label#user_email {
    font-size: 18px;
    font-family: sans-serif;
    position: relative;
    top: -34px;
    left: 24px;
}
.resetmodal{
    background: whitesmoke;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin-left: 394px;
    margin-top: 93px;
    width: 50%;
    height: 480px;
    border: 1px solid #f3f3f3;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
span#resetPasswordMsg {
    color: green;
    font-size: 20px;
    font-family: sans-serif;
    position: absolute;

    top: 6%;
    left: 48%;
}
</style>
<div class='logo'>
		<img src='http://localhost/balunand/kriyasheela/images/ca_logo.png' width='95' height='45'> 
			<div>
                    <h6 class='words4' style='margin: -43px 0px 44px 89px;
    font-size: 23px !important; color: #3f3f66; letter-spacing: 1px;font-weight: 600;'>BALU &amp; ANAND </h6>

                    <h6 class='words5' style=' margin: -44px 88px 0px;
    font-size: 12px !important; color: #000000; letter-spacing: 1px;
    font-weight: 700;'>CHARTERED ACCOUNTANTS</h6>
                </div>
<div id="Modal" class="modal" style="">

<form  id="pwreset" method="post"  class="resetmodal" action="<?= base_url('Resetpassword_Controller/changePassword') ?>" >

<label><h3 style="margin-left: 13px; font-family: sans-serif;">Reset Password</h3></label>
<br></br>
  <div>
    <label id="user_email">Email</label><br/>
    <input type="email" name="officialEmail" placeholder="Enter your Official Email ID" id="user_email_input"/>
   </div>
    <label id="form-label"  class="align">  New Password :</label>
 
    <div>
        <input type="password" name="n-password" id="inputfield1" class="confirm"  onkeyup="validatePassword(this.value);" required>
     
        <i class="far fa-eye" id="togglePassword1" style="margin-left: -30px; cursor: pointer;"></i>
        <span id="pwdmsg" style=" position: absolute;top: 390px; right: 773px;"></span>

    </div>
    <label id="form-label" class="align1"> Confirm New Password :</label>
    <div>
        <input type="password" name="c-password" id="inputfield2" class="confirm" onkeyup="validate_password()" required>
        <i class="far fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
    </div>
    <span id="wrong_pass_alert" style="margin-left: 37px;margin-top: -9px;"></span>
   <p> <input type="submit" value="Reset Password" name="reset" id="formbtn" class="btnsubmit"  onclick="wrong_pass_alert()"></p>
</form>

</div>
<span id="resetPasswordMsg">
<?php if ($this->session->flashdata('success')) { ?>
            
 <?=$this->session->flashdata('success') ?> 

<?php } ?>
</span>
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
    // toggle the type attribute
    const type = npassword.getAttribute('type') === 'password' ? 'text' : 'password';
    npassword.setAttribute('type', type );
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');

});

</script>


<script>
const togglePassword2 = document.querySelector('#togglePassword2');
 
  const cpassword = document.querySelector('#inputfield2');

  togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type );
    // toggle the eye slash icon
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




