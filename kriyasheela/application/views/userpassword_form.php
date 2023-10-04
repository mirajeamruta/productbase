<div class='container userform' style="margin-top: 164px;">
    <div id="section_userform" class="col-md-9 offset-md-2" style="">
        <div class="row mb-5 mt-5">
<div class='container userform' style="margin-top: 164px;">
    <div id="section_userform" class="col-md-9 offset-md-2" style="">
        <div class="row mb-5 mt-5">

            <div class="col-sm-9" style="text-align: center;">
                <span style="font-size: 25px;font-weight: 200;"> Change Password</span>
            <div class="col-sm-9" style="text-align: center;">
                <span style="font-size: 25px;font-weight: 200;"> Change Password</span>
            </div>

            <div>
                <?php if ($this->session->flashdata('passwordsuccess')) { ?>
                    <p class="text-success col-sm-12">  
                        <?= $this->session->flashdata('passwordsuccess') ?>
                    </p>
                    <p class="text-success col-sm-12">  
                        <?= $this->session->flashdata('passwordsuccess') ?>
                    </p>
                <?php } ?>
                
            </div>
            <div>
            <?php if ($this->session->flashdata('passwordfail')) { ?>
                    <p class="text-success col-sm-12">  
                        <?= $this->session->flashdata('passwordfail') ?>
                    </p>
                <?php } ?>
                
            </div>
            <div>
            <?php if ($this->session->flashdata('passwordfail')) { ?>
                    <p class="text-success col-sm-12">  
                        <?= $this->session->flashdata('passwordfail') ?>
                    </p>
                <?php } ?>
            </div>


           


        </div>

        <form class="form" id="usersubmit" method="post" autocomplete="off" action="<?= base_url('user/MyProfile') ?>" enctype='multipart/form-data'>
        <form class="form" id="usersubmit" method="post" autocomplete="off" action="<?= base_url('user/MyProfile') ?>" enctype='multipart/form-data'>

            <div class="row mb-2">
                <label for="inputPassword3" class="col-sm-4"> Old Password: </label>
                <div class="col-sm-6">
                    <input type="password" name="oldpassword"  id="password" style="width: 93%;border-radius: 6px;height: 120%; border: 1px solid #ced4da; outline:none;" required />
               
                    <!-- <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i> -->
                    <span class='passTypeToggle' title="Show" >
                        
                    <i class="fa-solid fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i></span>
                   
                  </div>
                  <span class="passmsg" id="msg1"style="  margin: 0px 14px;"></span>
               
                    <input type="password" name="oldpassword"  id="password" style="width: 93%;border-radius: 6px;height: 120%; border: 1px solid #ced4da; outline:none;" required />
               
                    <!-- <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i> -->
                    <span class='passTypeToggle' title="Show" >
                        
                    <i class="fa-solid fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i></span>
                   
                  </div>
                  <span class="passmsg" id="msg1"style="  margin: 0px 14px;"></span>
               
            </div>
            <hr>

            <div class="row mb-2">
                <label for="inputPassword3" class="col-sm-4"> New Password: </label>
                <div class="col-sm-6">
                    <input type="password"  class="oldPass" name="newpassword" id="password1" onkeyup="validatePassword(this.value)" style="width: 93%;border-radius: 6px;height: 120%; border: 1px solid #ced4da; outline:none; " required />
                    <!-- <i class="bi bi-eye-slash" id="togglePassword1" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i> -->
                    <span class='passTypeToggle' title="Show">
                    <i class="fa-solid fa-eye" id="togglePassword1" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i></span>
                   
                    <span  id="msg1" style="margin: 0px 14px;"></span>
                    <input type="password"  class="oldPass" name="newpassword" id="password1" onkeyup="validatePassword(this.value)" style="width: 93%;border-radius: 6px;height: 120%; border: 1px solid #ced4da; outline:none; " required />
                    <!-- <i class="bi bi-eye-slash" id="togglePassword1" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i> -->
                    <span class='passTypeToggle' title="Show">
                    <i class="fa-solid fa-eye" id="togglePassword1" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i></span>
                   
                    <span  id="msg1" style="margin: 0px 14px;"></span>
                    <!-- <p> Your password must contain at least 8 characters.</p>
                    <p>Your password can’t be a commonly used password.</p>
                    <p>Your password can’t be entirely numeric.</p> -->


                    <!-- <button type="submit" id="submit" class="submit"></button>  onkeyup="validatePassword(this.value)"-->
                </div>
                
                
            </div>

            <hr>

            <div class="row mb-2">
                <label for="inputPassword3" class="col-sm-4"> New password confirmation: </label>
                <label for="inputPassword3" class="col-sm-4"> New password confirmation: </label>
                <div class="col-sm-6">
                    <input type="password" name="confirmpassword" id="password2" style="width: 93%; border-radius: 6px;border: 1px solid #ced4da; outline:none; height: 120%; );" required />
                    <!-- <i class="bi bi-eye-slash" id="togglePassword2" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i> -->
                    <span class='passTypeToggle' title="Show" >
                    
                    <i class="fa-solid fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i></span>
                    
                    <span id="msg2" style=""></span>
                    <input type="password" name="confirmpassword" id="password2" style="width: 93%; border-radius: 6px;border: 1px solid #ced4da; outline:none; height: 120%; );" required />
                    <!-- <i class="bi bi-eye-slash" id="togglePassword2" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i> -->
                    <span class='passTypeToggle' title="Show" >
                    
                    <i class="fa-solid fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1; "></i></span>
                    
                    <span id="msg2" style=""></span>

                    <!-- <button type="submit" id="submit" class="submit"></button>  onkeyup="validatePassword(this.value)"-->
                </div>
            </div>

            <div class="row mb-2">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <input type="submit" name="insert" value="CHANGE PASSWORD" class="float-right" style="background-color: #3581dc; border: none; border-radius: 6px; width: 46%; height: 44px; margin: 31px -46px;"  />
                    <input type="submit" name="insert" value="CHANGE PASSWORD" class="float-right" style="background-color: #3581dc; border: none; border-radius: 6px; width: 46%; height: 44px; margin: 31px -46px;"  />
                </div>
            </div>

        </form>
    </div>
</div>



<script>

         function validatePassword(password) {
    
        //const Password = document.getElementById("password");

         function validatePassword(password) {
    
        //const Password = document.getElementById("password");

        //var PasswordValidation = Password.addEventListener("keyup", function(event) {
        //var PasswordValidation = Password.addEventListener("keyup", function(event) {


        // alert(password.length);
        //alert('yes321');
        // alert(password.length);
        //alert('yes321');

        //  password.length === 0
        //  password.length === 0

        if (document.getElementById("password1").value == '') {
        if (document.getElementById("password1").value == '') {

            //  alert('yeah empty');
            document.getElementById("msg1").innerHTML = "";
            return;
        }
            //  alert('yeah empty');
            document.getElementById("msg1").innerHTML = "";
            return;
        }

        if (password.length < 8) {
        if (password.length < 8) {

            var error = 'less than 8'
            var error = 'less than 8'


            //  return;
            //  return;

        } else if (password.search(/[a-z]/) < 0) {
        } else if (password.search(/[a-z]/) < 0) {

            var error = 'Password must contain at least one lowercase letter';
            var error = 'Password must contain at least one lowercase letter';

        } else if (password.search(/[A-Z]/) < 0) {
        } else if (password.search(/[A-Z]/) < 0) {

            var error = 'Password must contain at least one uppercase letter';
            var error = 'Password must contain at least one uppercase letter';

        } else if (password.search(/[0-9]/) < 0) {
        } else if (password.search(/[0-9]/) < 0) {

            var error = 'Password must contain at least one number';
            var error = 'Password must contain at least one number';

        } else if (password.search(/[*%]/) < 0) {
        } else if (password.search(/[*%]/) < 0) {

            var error = 'Password must be contains at least  special characters';
            var error = 'Password must be contains at least  special characters';

        } else {
        } else {

            var error = '';
            var error = '';

        }
        }

        // Do not show anything when the length of password is zero.
        // Do not show anything when the length of password is zero.

        // Create an array and push all possible values that you want in password
        var matchedCase = new Array();
        matchedCase.push("[$@$!)(%*#?&]"); // Special Charector
        matchedCase.push("[A-Z]"); // Uppercase Alpabates
        matchedCase.push("[0-9]"); // Numbers
        matchedCase.push("[a-z]"); // Lowercase Alphabates
        // Create an array and push all possible values that you want in password
        var matchedCase = new Array();
        matchedCase.push("[$@$!)(%*#?&]"); // Special Charector
        matchedCase.push("[A-Z]"); // Uppercase Alpabates
        matchedCase.push("[0-9]"); // Numbers
        matchedCase.push("[a-z]"); // Lowercase Alphabates

        // Check the conditions
        var ctr = 0;
        for (var i = 0; i < matchedCase.length; i++) {
            if (new RegExp(matchedCase[i]).test(password)) {
                ctr++;
            }
        }
        // Check the conditions
        var ctr = 0;
        for (var i = 0; i < matchedCase.length; i++) {
            if (new RegExp(matchedCase[i]).test(password)) {
                ctr++;
            }
        }

        if (ctr === 0 || ctr === 1 || ctr === 2) {
            // alert('ctr is weak' + ctr);
            document.getElementById("msg1").innerHTML = "";
            //   event.preventDefault();
            // return false;
        }
        if (ctr === 0 || ctr === 1 || ctr === 2) {
            // alert('ctr is weak' + ctr);
            document.getElementById("msg1").innerHTML = "";
            //   event.preventDefault();
            // return false;
        }

        // Display it
        var color = "";
        var strength = "";
        switch (ctr) {
            case 0:
            case 1:
            case 2:
                strength = "Password is Very Weak" + ' ' + error;
                color = "red";
                break;
        // Display it
        var color = "";
        var strength = "";
        switch (ctr) {
            case 0:
            case 1:
            case 2:
                strength = "Password is Very Weak" + ' ' + error;
                color = "red";
                break;

            case 3:
                strength = "Medium";
                color = "orange";
                break;
            case 3:
                strength = "Medium";
                color = "orange";
                break;

            case 4:
                strength = "Strong Password";
                color = "green";
                break;
        }
            case 4:
                strength = "Strong Password";
                color = "green";
                break;
        }


        document.getElementById("msg1").innerHTML = strength;
        document.getElementById("msg1").style.color = color;
        document.getElementById("msg1").innerHTML = strength;
        document.getElementById("msg1").style.color = color;

    }
    }


    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const password1 = document.querySelector("#password1");
    const password2 = document.querySelector("#password2");
    const passTypeToggle = document.querySelector('.passTypeToggle')
    
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const password1 = document.querySelector("#password1");
    const password2 = document.querySelector("#password2");
    const passTypeToggle = document.querySelector('.passTypeToggle')
    

        togglePassword.addEventListener("click", function() {
        
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
          start=false;
        password.setAttribute("type", type);
        togglePassword.addEventListener("click", function() {
        
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
          start=false;
        password.setAttribute("type", type);


        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });
        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    togglePassword1.addEventListener("click", function() {
        // toggle the type attribute
    togglePassword1.addEventListener("click", function() {
        // toggle the type attribute

        const type1 = password1.getAttribute("type") === "password" ? "text" : "password";
        const type1 = password1.getAttribute("type") === "password" ? "text" : "password";


        password1.setAttribute("type", type1);
        password1.setAttribute("type", type1);


        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });
        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    togglePassword2.addEventListener("click", function() {
        // toggle the type attribute
    togglePassword2.addEventListener("click", function() {
        // toggle the type attribute

        const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
        const type2 = password2.getAttribute("type") === "password" ? "text" : "password";

        password2.setAttribute("type", type2);
        password2.setAttribute("type", type2);

        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    passTypeToggle.addEventListener('click', e => {
    input.getAttribute('type') == 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password')
    input.getAttribute('type') == 'password' ? passTypeToggle.setAttribute('title', 'Show') : passTypeToggle.setAttribute('title', 'Hide')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye-slash')
})

        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    passTypeToggle.addEventListener('click', e => {
    input.getAttribute('type') == 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password')
    input.getAttribute('type') == 'password' ? passTypeToggle.setAttribute('title', 'Show') : passTypeToggle.setAttribute('title', 'Hide')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye-slash')
})

</script>