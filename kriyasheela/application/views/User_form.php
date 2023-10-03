<div class='container userform' id="user_Form">
    <div id="section_userform" class="col-md-9 offset-md-1">
<span class="mainheadline">User Form </span>
        <form class="" id="usersubmit" method="post" autocomplete="off" action="<?= base_url('User/createUser') ?>"
            enctype='multipart/form-data'>
            <div class="row mb-3">

                <label for="inputEmail3" class="col-sm-4">Type of User</label>
                <div class="col-sm-8" id="user">

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
                        onchange="readfile(this)"/>

                    <!--
                            <input type="file" name="chooseFile" id="chooseFile">
                    -->

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-8" id="displayimage">
                    <img id="propileimage" src="#" alt="your image" name="img" style="display:none"  />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4" id="required-field12">Name</label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username1" class="form-control" id="inputPassword3"
                        placeholder="Name"  >
                </div>
            </div>
            <div class="row mb-3" id="studentregno" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Student Reg Number</label>
                <div class="col-sm-8">
                    <input type="text" name="reg_no" id="srono" class="form-control" MaxLength="10" style="text-transform: uppercase;" onclick="ValidatestudentregNumber()" >
                </div>
            </div>
            <div class="row mb-3" id="employeeID">
                <label for="inputPassword3" class="col-sm-4">ICAI Number</label>
                <div class="col-sm-8">
                    <input type="text" name="icai_number" id="employeeid" class="form-control"
                        placeholder="ICAI Number" >
                </div>
            </div>


            <div class="row mb-3" id="Articleship" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Date of Commencement of Articleship</label>
                <div class="col-sm-8">
                    <input type="date" name="commencementofarticleship" id="commencement_of_articleship"
                        placeholder="Select Date of Commencement of Articleship" class="form-control" >
                        <input type="text" value="DD / MM / YYYY" id="commencement_of_articleship_value"/>
                </div>
            </div>

            <div class="row mb-3" id="CommencementEmployment">

                <label for="inputPassword3" class="col-sm-4"  id="CommencementEmployment_label">Date of Commencement of Employment</label>
                <div class="col-sm-8">
                    <h6 for="inputPassword3" class="col-sm-2" id="emplyomenterror"></h6>
                    <input type="date" placeholder="Select Date of Commencement of Employment"
                        name="commencementofemployment" id="date_Of_Employement" class="form-control">
                        <input type="text" value="DD / MM / YYYY" id="date_Of_Employement_Value" readonly/>
                </div>
            </div>

            <div class="row mb-3" id="completionArticleship" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Date of Completion of Articleship</label>
                <div class="col-sm-8">
                    <input type="date" name="completionofarticleship"
                        placeholder="Select Date of Completion of Articleship"  class="form-control" id="completion_Of_Articleship">
                        <input type="text" value="DD / MM YYYY" id="completion_Of_Articleship_Value"/>
                </div>
            </div>
            <div class="row mb-3" id="completionEmployment">
                <label for="inputPassword3" class="col-sm-4" id="completionEmployment_label">Date of Completion of Employment</label>
                <div class="col-sm-8">
                    <input type="date" placeholder="Select Date of Completion of Employment"
                        name="completionofemployment" class="form-control" id="dateOfCompletionOfEmployement" >
                        <input type="text" id="dateOfCompletionOfEmployementValue" value="DD / MM / YYYY" readonly/>
                </div>
            </div>


            
            <div class="row mb-3" id="partner">
                <label for="inputPassword3" class="col-sm-4">Partner Under Whom Registered </label>
                <div class="col-sm-8">
                      <!-- <input type="text" name="partner_registered" id="type_of_work" class="form-control" aria-describedby="type_of_work"> -->
                    <select name="partner_registered" id="type_of_work" class="classic" aria-describedby="type_of_work">
                        <option value="">Select</option>
                        <option value="R.E. Balasubramanyam">R.E. Balasubramanyam</option>
                        <option value="A.V. Muralisharan">A.V. Muralisharan</option>
                        <option value="N.K.S. Bharath">N.K.S. Bharath</option>
                        <option value="Ashok S Navalgund">Ashok S Navalgund</option>

                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4" id="required-field13">Balu & Anand ID Number</label>
                <div class="col-sm-8">
                    <input type="text" name="balunandno" id="balunandno" placeholder="Balu & Anand ID Number"
                        class="form-control" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Personal Email Address </label>
                <div class="col-sm-8">
                    <input type="email" name="personalemail" id="personalmail" placeholder="Personal Email Address"
                        class="form-control" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4" id="required-field14"> Official Email Address </label>
                <div class="col-sm-8">
                    <input type="email" name="officialemail" id="officialemail" placeholder="Official Email Address"
                        class="form-control" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Mobile Number </label>
                <div class="col-sm-8">
                    <input type="tel" name="mobile" id="mobile" class="form-control" minlength="10" maxlength="10"
                        placeholder="Mobile Number" title="10 digits Mobile Number" >
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4" id="required-field15"> Password </label>
                <div class="col-sm-8" data-placeholder="Password">
                    <input type="password" id="password4" name="password" placeholder="Password" onkeyup='checkPasswordLength(this.value)'>
                    <span class='passTypeToggle' title="Show">
                        <i class="fa-solid fa-eye" id="fa-passicon"
                            style="margin-left: -50px; position: relative; right:-540px; top:-32px; cursor: pointer; color: black;  vertical-align: text-bottom;line-height: 1.7; "></i></span>
                </div>
                <span class="message" id="message" style="margin: -21px 295px;"></span>
            </div>
      

            <div class="row mb-3" style="margin-top: -8px;">
                <label for="inputPassword3" class="col-sm-4"> Blood Group </label>
                <div class="col-sm-8" id="userbloodgroup__form">
                <select name="bloodgroup" type="text" id="blood" class="classic" style="width: 32.7rem">
                        <option value="">Select</option>
                        <option value="O +ve">O+</option>
                        <option value="O -ve">O-</option>
                        <option value="A +ve">A+</option>
                        <option value="A -ve">A-</option>
                        <option value="B +ve">B+</option>
                        <option value="B -ve">B-</option>
                        <option value="AB +ve">AB+</option>
                        <option value="AB -ve">AB-</option>
                    </select>
                    <!-- <input type="text" name="bloodgroup" id="blood" class="form-control" placeholder="Blood Group"> -->
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-8" id="btnsubmit">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" onclick="submituser()" />
                </div>
            </div>
        </form>
    </div>
</div>

<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})
</script>

<script>
let input = document.querySelector('#password4')
let formGroup = document.querySelector('.col-sm-8')
let message = document.querySelector('.message')
let passTypeToggle = document.querySelector('.passTypeToggle i')
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


<script type="text/javascript">
function submituser() {
    var submitdetails = document.getElementById('usersubmit');
    //alert('vvvviiii');
    submitdetails.addEventListener('submit', (event) => {
        //alert('form submitted');

        const empID = document.getElementById("usertypeid").value;

        // alert(empID);

        if (empID == 2) {
            var username = document.getElementById("username").value;

            if (username == '') {

                document.getElementById('username').style.border = '3px solid red';
                event.preventDefault();
            }

            var employementcommencement = document.getElementById("date_picker1").value;

            if (employementcommencement == '') {

                document.getElementById('date_picker1').style.border = '3px solid red';

                // document.getElementById('emplyomenterror').textContent =
                //     'Please Select Date Of Commencement Of Employment';
                event.preventDefault();
            }

        }


        if (empID == 3) {

            // alert(true);
            var articlecommencement = document.getElementById("date_picker4").value;


            if (articlecommencement == '') {


                document.getElementById('date_picker4').style.border = '3px solid red';
                event.preventDefault();
            }

        }

        if (document.getElementById("msg").style.color == "red") {

            //alert("yes cant");
            event.preventDefault();

        }

        if (document.getElementById("password").value == '') {

            //alert("yes cant");
            event.preventDefault();

        }



    })
}
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

    document.getElementById('CommencementEmployment_label').innerHTML="Date of Commencement of Employment";
    document.getElementById('completionEmployment_label').innerHTML="Date of Completion of Employment";

    if (event.target.value == 3) {

        document.getElementById('CommencementEmployment').style.display = 'none';
        document.getElementById('completionEmployment').style.display = 'none';
        document.getElementById('employeeID').style.display = 'none';
    }
    if (event.target.value == 4) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
        document.getElementById('CommencementEmployment_label').innerHTML="Date of Commencement";
        document.getElementById('completionEmployment_label').innerHTML="Date of Completion";
        //document.getElementById('partner').style.display = 'none';
    }
    if (event.target.value == 2) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
        document.getElementById('CommencementEmployment_label').innerHTML="Date of Commencement of Employment";
        document.getElementById('completionEmployment_label').innerHTML="Date of Completion of Employment";
    }
    if (event.target.value == 1) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
        document.getElementById('CommencementEmployment_label').innerHTML="Date of Commencement of Employment";
        document.getElementById('completionEmployment_label').innerHTML="Date of Completion of Employment";
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
        return value.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/);
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
    $('select').find('option[value=0]').attr('selected', 'selected');
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

 document.getElementById('usertypeid').addEventListener('change',function(){
    console.log(document.getElementById('usertypeid').value);
 })

</script>



<!-- name validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$(function() {

$('#username1').keydown(function (e) {

  if ( e.ctrlKey || e.altKey) {
  
    e.preventDefault();
    
  } else {
  
    var key = e.keyCode;
    
    if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
    
      e.preventDefault();
      
    }

  }
  
});

});
</script>




<!-- student number validation -->
<script>
function ValidatestudentregNumber() { 
  var Obj = document.getElementById("srono");
        if (Obj.value != "") {
            ObjVal = Obj.value;
            // var expr=/[A-Z][0-9]{8}/;
            var expr = /(?:(?=(^[a-zA-Z]{3}\d{4}[a-zA-Z]{1}$))|(?=(^[a-zA-Z]{4}[0-9]{5}[a-zA-Z]{1}?$)))/;
            if (ObjVal.search(expr) == -1) {
                alert("Invalid student Number format should be(AAA0000000)");
                // Obj.focus();
                return false;
            }
          else
            {
              alert("Valid student Number");
              }
        }
  }
</script>


<script>
    function addZero(num) {
        return num.toString().padStart(2, '0')
    }

    function formatDate(date) {
        return [
            addZero(date.getDate()),
            addZero(date.getMonth() + 1),
            date.getFullYear()
        ].join('/')
    }

    let today = new Date()
    let dd = addZero(today.getDate())
    let mm = addZero(today.getMonth() + 1)
    let yyyy = today.getFullYear();



    //Commencement Date
    let commence_dd = addZero(today.getDate())
    today = yyyy + '-' + mm + '-' + dd

    newMonth = mm - 1;

    if (newMonth < 9) {
        newMonth = `0${newMonth}`
    }


    //Commencement Date for all
    let commencement_date = yyyy + '-' + newMonth + '-' + commence_dd
    // alert(commencement_date)
    // Setting  minimum date
    document.getElementById('date_Of_Employement').setAttribute("min", commencement_date)
    document.getElementById('date_Of_Employement').setAttribute("max", today)
    document.getElementById('commencement_of_articleship').setAttribute("min", commencement_date)




    // Adding value to date_Of_Employement
    document.getElementById('date_Of_Employement').addEventListener('change', function() {
        let currentDate = document.getElementById('date_Of_Employement').value;
        //alert(currentDate)
        document.getElementById('date_Of_Employement_Value').value = formatDate(new Date(currentDate));
    })
    // Setting dateOfCompletionOfEmployement minimum date
    document.getElementById('date_Of_Employement').addEventListener('change', function() {
        let date_Of_Employement = document.getElementById('date_Of_Employement').value
        document.getElementById('dateOfCompletionOfEmployement').setAttribute('min', date_Of_Employement)
    })
    // Adding value to date_Of_Employement
    document.getElementById('dateOfCompletionOfEmployement').addEventListener('change', function() {
        let currentDate = document.getElementById('dateOfCompletionOfEmployement').value
        document.getElementById('dateOfCompletionOfEmployementValue').value = formatDate(new Date(currentDate))
    })

    // Articleship
    document.getElementById('commencement_of_articleship').addEventListener('change', function() {
        let currentDate = document.getElementById('commencement_of_articleship').value
        document.getElementById('completion_Of_Articleship').setAttribute("min", currentDate)
        document.getElementById('commencement_of_articleship_value').value = formatDate(new Date(currentDate))
    })
    document.getElementById('completion_Of_Articleship').addEventListener('change', function() {
        let currentDate = document.getElementById('completion_Of_Articleship').value
        document.getElementById('completion_Of_Articleship_Value').value = formatDate(new Date(currentDate))
    })
</script>

