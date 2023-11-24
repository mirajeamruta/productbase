<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f6f8fa;
            font-family: 'Poppins', sans-serif;
        }

        .custom-select {
            width: 100%;
            height: 45px;
            border: none;
            outline: none;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 15px;
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
            background-color: #f6f8fa;
            font-family: 'Poppins', sans-serif;
            transition: all 120ms ease-out 0s;
        }

        .container-userpassword {
            /* max-width: 1047px; */
            width: 100%;
            /* background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
                0px 5px 12px -2px rgba(0, 0, 0, 0.1),
                0px 18px 36px -6px rgba(0, 0, 0, 0.1); */
            overflow: hidden;
            margin: 10px;
        }

        .container-userpassword.title {
            padding: 25px;
            background: #f6f8fa;
        }

        .container-userpassword.title p {
            font-size: 25px;
            font-weight: 500;

        }

        .container-userpassword .title p::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 3px;
            background: linear-gradient(to right, #F37A65, #D64141);
        }

        .userpassword_details {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            padding: 19px;
        }

        .userpassword_details.input_box {
            width: calc(100% / 2 - 20px);
            margin: 0 0 12px 0;
        }

        .input_box label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .input_box label::after {
            content: " *";
            color: red;
        }

        .input_box input[type="password"] {
            width: calc(100% - 30px);
            /* Adjust the width as needed */
        }

        .input_box input {
            width: 100%;
            height: 45px;
            border: none;
            outline: none;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 15px;
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
            background-color: #f6f8fa;
            font-family: 'Poppins', sans-serif;
            transition: all 120ms ease-out 0s;
        }


        h2 {
            color: #333;
        }

        form {
            max-width: 773px;
            margin: 0 auto;
            background: #fff;
            padding: 54px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000;
            height: 548px;
        }

        label {
            display: block;
            text-align: left;
            margin: 9px 0;
            font-weight: 500;
        }

        input[type="password"] {
            width: 66%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .main-container {
            display: flex;
            width: 100vw;
            position: relative;
            top: 4px;
            z-index: 1;
        }

        .resetpass_subbtn {
            margin-top: 60px;
        }

        .passTypeToggle {
            position: relative;
            right: -1px;
            /* Adjust the distance from the right as needed */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }


        .passTypeToggle1 {
            position: relative;
            right: -605px;
            top: -33px;
            transform: translateY(-50%);
            cursor: pointer;
        }


        .passTypeToggle2 {
            position: relative;
            right: 33px;
            top: 2px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            #userpassword_details {
                width: 402px;
                margin-left: -8px !important;
                height: 533px;
            }

            #togglePassword1 {
                right: -251px !important;
                font-weight: 900;
                top: -21px !important;
            }

            #togglePassword2 {
                margin-left: -373px !important;
                font-weight: 900;
                margin-top: -21px !important;
            }

            #togglePassword3 {
                margin-left: 268px !important;
                font-weight: 900;
                margin-top: -31px !important;
                position: absolute;
            }

            .resetpass_subbtn {
                margin-top: 47px !important;
                margin-left: 36px !important;
            }
        }
    </style>
</head>


<body>
    <div class="main">

        <?php if ($this->session->flashdata('passwordsuccess')) { ?>
            <p class="text-success col-sm-12">
                <?= $this->session->flashdata('passwordsuccess') ?>
            </p>
        <?php } ?>

        <?php if ($this->session->flashdata('passwordfail')) { ?>
            <p class="text-success col-sm-12">
                <?= $this->session->flashdata('passwordfail') ?>
            </p>
        <?php } ?>
        <div class='container-userpassword' id="userpassword_details">


            <form id="usersubmit" class="userreset_form" method="post" autocomplete="off" action="<?= base_url('user/MyProfile') ?>" enctype='multipart/form-data'>
                <div class="title">
                    <p style="margin-top: -33px; font-weight: 600; font-size: x-large; margin-bottom: 42px;">Change Password</p>
                </div>



                <div class="input_box">
                    <label for="current_password">Current Password:</label>
                    <input type="password" name="oldpassword" id="password" required>
                    <span class="passTypeToggle" title="Show">
                        <i class="fa-solid fa-eye" id="togglePassword1"></i>
                    </span>

                    <span class="passmsg" id="msg1"></span>
                </div>
                <br>


                <div class="input_box" id="displayimage">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="newpassword" id="password1" onkeyup="validatePassword(this.value)" required>
                </div>
                <span class="passTypeToggle1" title="Show">
                    <i class="fa-solid fa-eye" id="togglePassword2"></i>
                </span>
                <span id="msg1"></span>

                <br>

                <div class="input_box">
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" name="confirmpassword" id="password2" required>
                    <span class="passTypeToggle2" title="Show">
                        <i class="fa-solid fa-eye" id="togglePassword3"></i>
                    </span>
                    <span id="msg2"></span>
                </div>

                <div class="resetpass_subbtn">
                    <input type="submit" id="formsubmit" name="insert" value="CHANGE PASSWORD" required />
                </div>
            </form>
        </div>
    </div>


</body>

</html>




<script>
    function validatePassword(password) {


        if (document.getElementById("password1").value == '') {

            //  alert('yeah empty');
            document.getElementById("msg1").innerHTML = "";
            return;
        }

        if (password.length < 8) {

            var error = 'less than 8'


            //  return;

        } else if (password.search(/[a-z]/) < 0) {

            var error = 'Password must contain at least one lowercase letter';

        } else if (password.search(/[A-Z]/) < 0) {

            var error = 'Password must contain at least one uppercase letter';

        } else if (password.search(/[0-9]/) < 0) {

            var error = 'Password must contain at least one number';

        } else if (password.search(/[*%]/) < 0) {

            var error = 'Password must be contains at least  special characters';

        } else {

            var error = '';

        }

        // Do not show anything when the length of password is zero.

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

            case 3:
                strength = "Medium";
                color = "orange";
                break;

            case 4:
                strength = "Strong Password";
                color = "green";
                break;
        }


        document.getElementById("msg1").innerHTML = strength;
        document.getElementById("msg1").style.color = color;

    }


    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const password1 = document.querySelector("#password1");
    const password2 = document.querySelector("#password2");
    const passTypeToggle = document.querySelector('.passTypeToggle')


    togglePassword1.addEventListener("click", function() {

        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        start = false;
        password.setAttribute("type", type);


        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    togglePassword2.addEventListener("click", function() {
        // toggle the type attribute

        const type1 = password1.getAttribute("type") === "password" ? "text" : "password";


        password1.setAttribute("type", type1);


        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    togglePassword3.addEventListener("click", function() {
        // toggle the type attribute

        const type2 = password2.getAttribute("type") === "password" ? "text" : "password";

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
</script>