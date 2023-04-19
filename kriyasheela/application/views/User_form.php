<?php echo "hiee?" ?>

<div class='container userform'>
    <div id="section_userform" class="col-md-9 offset-md-1">
        <span style="display: block;
	font-size: 25px;
	line-height: 28px;
	color: black;
	text-align: center;
	margin: 30px 0px 30px 248px; ">USER FORM </span>
        <form class="" id="usersubmit" method="post" autocomplete="off" action="<?= base_url('User/createUser') ?>"
            enctype='multipart/form-data'>
            <div class="row mb-3">

                <label for="inputEmail3" class="col-sm-4">Type of User</label>
                <div class="col-sm-8">

                    <select name="usertype" class="classic" id="usertypeid" onchange="userfields(event)">
                        <option value="">Select</option>
                        <?php
                        foreach ($usertypes as $id) {
                            // var_dump($zones);
                            echo '<option value="' . $id['user_type_id'] . '">' . $id['user_type'] . '</option> ';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4">Image</label>
                <div class="col-sm-8">
                    <!-- <input type="file" name="profilephoto" id="profilephoto" aria-describedby="created_on" onchange="readfile(this)" /> -->


                    <input type="file" name="profilephoto" class="chooseFile" id="profilephoto"
                        onchange="readfile(this)" />

                    <!--
                            <input type="file" name="chooseFile" id="chooseFile">
                    -->


                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-8" id="displayimage">
                    <img id="propileimage" src="#" alt="your image" name="img" style="display:none" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4">Name</label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username" class="form-control" id="inputPassword3"
                        placeholder="Name">
                </div>
            </div>
            <div class="row mb-3" id="studentregno" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Student Reg Number</label>
                <div class="col-sm-8">
                    <input type="text" name="reg_no" id="srono" class="form-control">
                </div>
            </div>
            <div class="row mb-3" id="employeeID">
                <label for="inputPassword3" class="col-sm-4">ICAI Number</label>
                <div class="col-sm-8">
                    <input type="text" name="employee_id" id="employeeid" class="form-control"
                        placeholder="ICAI Number">
                </div>
            </div>
            <div class="row mb-3" id="Articleship" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Date of Commencement of Articleship</label>
                <div class="col-sm-8">
                    <input type="text" name="commencementofarticleship" id="date_picker4"
                        placeholder="Select Date of Commencement of Articleship" class="form-control">
                </div>
            </div>

            <div class="row mb-3" id="CommencementEmployment">

                <label for="inputPassword3" class="col-sm-4">Date of Commencement of Employment</label>
                <div class="col-sm-8">
                    <h6 for="inputPassword3" class="col-sm-2" id="emplyomenterror"></h6>
                    <input type="text" placeholder="Select Date of Commencement of Employment"
                        name="commencementofemployment" id="date_picker1" class="form-control">
                </div>
            </div>

            <div class="row mb-3" id="completionArticleship" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Date of Completion of Articleship</label>
                <div class="col-sm-8">
                    <input type="text" name="completionofarticleship"
                        placeholder="Select Date of Completion of Articleship" class="form-control" id="date_picker3">
                </div>
            </div>
            <div class="row mb-3" id="completionEmployment">
                <label for="inputPassword3" class="col-sm-4">Date of Completion of Employment</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Select Date of Completion of Employment"
                        name="completionofemployment" id="date_picker2" class="form-control">
                </div>
            </div>
            <div class="row mb-3" id="partner">
                <label for="inputPassword3" class="col-sm-4">Partner Under Whom Registered </label>
                <div class="col-sm-8">
                    <select name="partner_registered" id="type_of_work" class="classic" aria-describedby="type_of_work">
                        <option value="">Select</option>
                        <option value="REB">REB</option>
                        <option value="AVM">AVM</option>
                        <option value="NKSB">NKSB</option>
                        <option value="ASN">ASN</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4">Balu & Anand ID Number</label>
                <div class="col-sm-8">
                    <input type="text" name="balunandno" id="balunandno" placeholder="Balu & Anand ID Number"
                        class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Personal Email Address </label>
                <div class="col-sm-8">
                    <input type="email" name="personalemail" id="personalmail" placeholder="Personal Email Address"
                        class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Official Email Address </label>
                <div class="col-sm-8">
                    <input type="email" name="officialemail" id="officialemail" placeholder="Official Email Address"
                        class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Mobile Number </label>
                <div class="col-sm-8">
                    <input type="tel" name="mobile" id="mobile" class="form-control" minlength="10" maxlength="10"
                        placeholder="Mobile Number" title="10 digits Mobile Number" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Password </label>
                <div class="col-sm-8" data-placeholder="Password">
                    <input type="password" id="password4" placeholder="Password"
                        onkeyup='checkPasswordLength(this.value)'>
                    <span class='passTypeToggle' title="Show">
                        <i class="fa-solid fa-eye"
                            style="margin-left: -50px; position: relative; right:-540px; top:-32px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1.7; "></i></span>
                </div>
                <span class="message" id="message" style="margin: -21px 295px;"></span>
            </div>
            <!-- <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Password </label>
                <div class="col-sm-8">
                    <input type="password4"  name="password4" id="password4" onkeyup="validatePassword(this.value)" placeholder="Password"/>
                    <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -50px; position: relative; right: -17px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1.7; "></i>

                    <span id="msg" style="  margin: 0px 14px;"></span>

                 
                </div>
            </div> -->

            <div class="row mb-3" style="margin-top: -8px;">
                <label for="inputPassword3" class="col-sm-4"> Blood Group </label>
                <div class="col-sm-8">
                    <input type="text" name="bloodgroup" id="blood" class="form-control" placeholder="Blood Group">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-8">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" onclick="submituser()" />
                </div>
            </div>
        </form>
    </div>
</div>


<script>
let input = document.querySelector('#password4')
let formGroup = document.querySelector('.col-sm-8')
let message = document.querySelector('.message')
let passTypeToggle = document.querySelector('.passTypeToggle')
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let mediumPassword = new RegExp(
    '((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))'
)

document.body.addEventListener('click', function(e) {
    if (input.contains(e.target)) {
        formGroup.classList.add('focus')
    } else {
        if (input.value == '') {
            formGroup.classList.remove('focus')
        }
    }
});



let checkPasswordStrength = (password) => {
    let message = {}
    var span = document.getElementById("message");
    if (strongPassword.test(password)) {
        span.style.color = "green";
        message = {
            strength: 'strong',
        }

    } else if (mediumPassword.test(password)) {
        span.style.color = "orange";
        message = {
            strength: 'medium',
        }

    } else {
        span.style.color = "red";
        message = {

            strength: 'weak'
        }

    }

    return message;

    document.getElementById("message").innerHTML = strength;
    document.getElementById("message").innerHTML = Color;
}

input.addEventListener('keyup', e => {
    let password = e.target.value

    password != "" ? passTypeToggle.style.display = 'block' : passTypeToggle.style.display = 'none'

    if (password == '') {
        message.classList.remove('weak')
        message.classList.remove('medium')
        message.classList.remove('strong')

        formGroup.classList.remove('weak')
        formGroup.classList.remove('medium')
        formGroup.classList.remove('strong')

        message.innerHTML = ''
    } else {
        let result = checkPasswordStrength(password)

        if (result.strength == 'weak') {
            message.classList.remove('medium')
            message.classList.remove('strong')
            formGroup.classList.remove('medium')
            formGroup.classList.remove('strong')
            message.classList.add('weak')
            formGroup.classList.add('weak')
            message.innerHTML = 'Your Password is weak.'

        } else if (result.strength == 'medium') {
            formGroup.classList.remove('weak')
            formGroup.classList.remove('strong')
            message.classList.remove('weak')
            message.classList.remove('strong')
            message.classList.add('medium')
            formGroup.classList.add('medium')
            message.innerHTML = 'Your Password is medium.'
        } else {
            formGroup.classList.remove('weak')
            formGroup.classList.remove('medium')
            message.classList.remove('weak')
            message.classList.remove('medium')
            message.classList.add('strong')
            formGroup.classList.add('strong')
            message.innerHTML = 'Your Password is Strong.'
        }
    }

})

passTypeToggle.addEventListener('click', e => {
    input.getAttribute('type') == 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type',
        'password')
    input.getAttribute('type') == 'password' ? passTypeToggle.setAttribute('title', 'Show') : passTypeToggle
        .setAttribute('title', 'Hide')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye-slash')
})
</script>
<script type="text/javascript">
function readfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("propileimage").style.display = 'block';
            document.getElementById("propileimage").src = e.target.result;
            document.getElementById("propileimage").style.width = '100px';
            document.getElementById("propileimage").style.height = '200px';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function userfields(event) {
    // alert(event.target.value);
    document.getElementById('employeeID').style.display = 'flex';
    document.getElementById('CommencementEmployment').style.display = 'flex';
    document.getElementById('completionEmployment').style.display = 'flex';
    document.getElementById('studentregno').style.display = 'flex';
    document.getElementById('Articleship').style.display = 'flex';
    document.getElementById('completionArticleship').style.display = 'flex';
    document.getElementById('partner').style.display = 'flex';
    if (event.target.value == 3) {
        document.getElementById('employeeID').style.display = 'none';
        document.getElementById('CommencementEmployment').style.display = 'none';
        document.getElementById('completionEmployment').style.display = 'none';
    }
    if (event.target.value == 4) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
        document.getElementById('partner').style.display = 'none';
    }
    if (event.target.value == 2) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
    }

    //return event.target.value;

}
</script>

<script>
var emailAddress = document.getElementById("emailAddress");
var emailAddressValidation = function() {
    emailAddressValue = emailAddress.value.trim();
    validEmailAddress = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    emailAddressErr = document.getElementById('email-err');
    if (emailAddressValue == "") {
        emailAddressErr.innerHTML = "Email Address is required";
    } else if (!validEmailAddress.test(emailAddressValue)) {
        emailAddressErr.innerHTML = "Email Addre must be in valid formate with @ symbol";
    } else {
        emailAddressErr.innerHTML = "";
        return true;
    }
}
emailAddress.oninput = function() {
    emailAddressValidation();
}
</script>

<script>
$.validator.addMethod(
    "tendigits",
    function(value, element) {
        if (value == "")
            return false;
        return value.match(/^\d{10}$/);
    },
    "Please enter 10 digits Contact # (No spaces or dash)"
);

$('#frm_registration').validate({
    rules: {
        phone: "tendigits"
    },
    messages: {
        phone: "Please enter 10 digits Contact # (No spaces or dash)",

    }

});
</script>



<script type="text/javascript">
jQuery(document).ready(function($) {
    $('select').find('option[value=2]').attr('selected', 'selected');
});
</script>
<!-- Javascript -->
<script>
$(document).ready(function() {
    var startDate;
    var endDate;
    $("#date_picker1").datepicker({
        dateFormat: 'dd-mm-yy'
    })
    $("#date_picker2").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $("#date_picker3").datepicker({
        dateFormat: 'dd-mm-yy'
    })
    $("#date_picker4").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $('#date_picker1').change(function() {
        startDate = $(this).datepicker('getDate');
        $("#date_picker2").datepicker("option", "minDate", startDate);
    })
    $('#date_picker2').change(function() {
        endDate = $(this).datepicker('getDate');
        $("#date_picker1").datepicker("option", "maxDate", endDate);
    })
    $('#date_picker4').change(function() {
        startDate = $(this).datepicker('getDate');
        $("#date_picker3").datepicker("option", "minDate", startDate);
    })
    $('#date_picker3').change(function() {
        endDate = $(this).datepicker('getDate');
        $("#date_picker4").datepicker("option", "maxDate", endDate);
    })
})
</script>