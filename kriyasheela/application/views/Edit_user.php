<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="style.css" /> -->
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
      width: 569px;
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

    .container-edituser {
      max-width: 1253px;
      width: 100%;
      background: #ffffff;
      border-radius: 0.5rem;
      box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
        0px 5px 12px -2px rgba(0, 0, 0, 0.1),
        0px 18px 36px -6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: -3px;
      height: 988px;
    }

    .container-edituser.title {
      padding: 25px;
      background: #f6f8fa;
    }

    .container-edituser .title p {
      font-size: 25px;
      font-weight: 500;
      margin-top: 22px;
      margin-left: 36px;
    }

    .container-edituser.title p::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 30px;
      height: 3px;
      background: linear-gradient(to right, #F37A65, #D64141);
    }

    .edituser_details {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 19px;
    }

    .input_box {
      width: calc(50% - 19px);
      margin: 0 -11px 27px 0;
      display: inline-block;
    }

    .input_box label {
      font-weight: 500;
      margin-bottom: 5px;
      /* display: block; */
      margin-left: 20px;
    }

    .input_box label::after {
      content: " *";
      color: red;
    }

    .input_box input {
      width: 93%;
      height: 45px;
      border: none;
      outline: none;
      border-radius: 5px;
      font-size: 16px;
      padding-left: 13px;
      box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
      background-color: #f6f8fa;
      font-family: 'Poppins', sans-serif;
      transition: all 120ms ease-out 0s;
      margin-left: 20px;
    }

    .textarea {
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

    .main-container {
      display: flex;
      width: 100vw;
      position: relative;
      top: 4px;
      z-index: 1;
    }

    .input-box-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 12px;
    }

    .input-box-container .input_box {
      width: calc(50% - 10px);
      /* Adjust width as needed */
      margin: 0;
    }

    /* Add this CSS to style the button */
    #edit_user_btn {
      padding: 10px 20px;
      background: #27ae60;
      color: #ffffff;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      font-weight: 600;
      font-size: 16px;
      position: relative;
      top: -26px;
      right: -1138px;
    }

    input#userupdate {
      background: brown;
      color: white;
      border: none;
      border-radius: 4px;
      width: 66px;
      height: 42px;
      position: relative;
      top: -811px;
      right: -1142px;
      display: none;
    }


    /* Media Query for small screens */
    @media screen and (max-width: 768px) {
      .input_box {
        width: 100%;
      }

      .textarea {
        width: 100%;
      }

      #edit_userdata {
        margin-left: -23px !important;
        width: 355px;
        height: 1571px;
      }

      #typeOfUser__select {
        width: 330px !important;
      }
      #edit_user_btn {
        padding: 14px 16px;
    background: #27ae60;
    color: #ffffff;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
    font-size: 16px;
    position: sticky;
   
    margin-left: 276px !important;
    margin-top: -182px !important;
    }

    input#userupdate {
      background: brown;
    color: white;
    border: none;
    border-radius: 4px;
    width: 66px;
    height: 42px;
    position: sticky;
    margin-top: -1453px !important;
    margin-left: 268px !important;
    }

    }
  </style>

</head>

<body>
  <div class="main">
    <div class='container-edituser' id="edit_userdata">
      <div class="title">
        <p>Edit User Details</p>
      </div>

      <button id="edit_user_btn">Edit</button>

      <form class="edit__user" method="post" autocomplete="off" action="<?= base_url('User/EditUser') ?>">
        <?php

        if (count($userdetailsdata) > 0) {
          foreach ($userdetailsdata as $row) {
        ?>
            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
            <input type="hidden" name="user_type_id" value="<?php echo $row['user_type_id'] ?>">

            <?php
            if ($row['user_type_id'] == 1) {
            ?>
              <div class="input_box" id="typeOfUser">
                <div class="input_box">
                  <select name="usertype" disabled="true" id="typeOfUser__select" style="">
                    <option selected>Admin</option>
                  </select>
                </div>
              </div>
            <?php
            }
            ?>
            <!-- For Other User Types Except Admin -->
            <?php
            if ($row['user_type_id'] != 1) {
            ?>
              <div class="input_box" id="typeOfUser">
                <label class="input_box">Type of user :</label>
                <div class="edituser_details">
                  <div class="input_box">
                    <select name="usertype" disabled="true" id="typeOfUser__select" class="custom-select" style="    width: 569px; height: 45px;border: none;outline: none;border-radius: 5px;font-size: 16px;padding-left: 15px;box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);background-color: #f6f8fa;font-family: 'Poppins', sans-serif;transition: all 120ms ease-out 0s;">
                      <?php if ($row['user_type_id'] == 2) { ?>
                        <option selected>Employee</option>
                        <option>Article Trainee</option>
                        <option>External Consultant</option>
                      <?php
                      } else if ($row['user_type_id'] == 3) {
                      ?>
                        <option>Employee</option>
                        <option selected>Article Trainee</option>
                        <option>External Consultant</option>
                      <?php
                      } else if ($row['user_type_id'] == 4) {
                      ?>
                        <option>Employee</option>
                        <option>Article Trainee</option>
                        <option selected>External Consultant</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>

            <div class="input_box">
              <label for="name">Name :</label>
              <input type="text" name="name" id="name" class="user_name" value="<?php echo $row['name'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box" id="displayimage">
              <label for="photo">Profile photo</label>
              <img id="propileimage" src="<?php echo ('http://localhost/kriyasheela-p2/kriyasheela/photos/' . $row['image']) ?>" width="100px" height="100px" alt="your image" style="margin-left: 20px;" />
            </div>

            <?php
            if ($row['user_type_id'] == 3) {
            ?>
              <div class="input_box">
                <label for="SRO">SRO Number:</label>
                <input type="text" name="ID" id="ID" class="user_icai user_icai_edit" value="<?php echo $row['ID'] ?>" aria-describedby="created_on" readonly />
              </div>
            <?php
            } else {
            ?>
              <div class="input_box">
                <label for="ICAI">ICAI Number:</label>
                <input type="text" name="ID" id="ID" class="user_icai user_icai_edit" value="<?php echo $row['ID'] ?>" aria-describedby="created_on" readonly />
              </div>
            <?php
            }
            ?>

            <div class="input_box">
              <label for="start_date">Start Date :</label>
              <input type="text" name="startdate" id="startdate" class="start_date start_date_edit" value="<?php echo $row['startdate'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="End_date">End Date :</label>
              <input type="text" name="enddate" id="enddate" class="end_date end_date_edit" value="<?php echo $row['enddate'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="Partner">Partner Under Whom Registered :</label>
              <input type="text" name="partner_under_whom_registered" class="partner partner_edit" id="partner_under_whom_registered" value="<?php echo $row['partner_under_whom_registered'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="Id_No">Balunand Id Number:</label>
              <input type="text" name="balunand_id_no" class="balunand_id  balunand_id_edit" id="balunand_id_no" value="<?php echo $row['balunand_id_no'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="personal_email">Personal Email Address:</label>
              <input type="text" name="personal_email" class="personal_email personal_email_edit" id="personal_email" value="<?php echo $row['personal_email'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="Official_email">Official Email Address :</label>
              <input type="text" name="official_email" class="official_email official_email_edit" id="official_email" value="<?php echo $row['official_email'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="mobile_No">Mobile Number:</label>
              <input type="tel" name="mobile_no" id="mobile_no" class="mobile_number mobile_number_edit" minlength="10" maxlength="10" value="<?php echo $row['mobile_no'] ?>" aria-describedby="created_on" readonly />
            </div>

            <div class="input_box">
              <label for="blood_group">Blood Group:</label>
              <input type="text" name="bloodgroup" id="bloodgroup" class="blood_group blood_group_edit" value="<?php echo $row['bloodgroup'] ?>" aria-describedby="created_on" readonly />
              <select name="bloodgroup" type="text" id="blood1" class="custom-select user__bloodgroup" style=" display: none;">

                <option value="" <?php if (empty($row['bloodgroup'])) echo "selected"; ?>>Select</option>
                <option value="A +ve" <?php if ($row['bloodgroup'] == "A +ve") echo "selected"; ?>>A+</option>
                <option value="O +ve" <?php if ($row['bloodgroup'] == "O +ve") echo "selected"; ?>>O+</option>
                <option value="O -ve" <?php if ($row['bloodgroup'] == "O -ve") echo "selected"; ?>>O-</option>
                <option value="A -ve" <?php if ($row['bloodgroup'] == "A -ve") echo "selected"; ?>>A-</option>
                <option value="B +ve" <?php if ($row['bloodgroup'] == "B +ve") echo "selected"; ?>>B+</option>
                <option value="B -ve" <?php if ($row['bloodgroup'] == "B -ve") echo "selected"; ?>>B-</option>
                <option value="AB +ve" <?php if ($row['bloodgroup'] == "AB +ve") echo "selected"; ?>>AB+</option>
                <option value="AB -ve" <?php if ($row['bloodgroup'] == "AB -ve") echo "selected"; ?>>AB-</option>
              </select>
            </div>

            <div class="input_box">
              <label for="status">Status :</label>
              <input type="text" name="status" id="status" class="status status_edit status___data" value="<?php echo $row['status'] ?>" aria-describedby="created_on" readonly />
              <select name="status" type="text" class="user___statusdata" id="userstatus" style="display: none; width: 569px;height: 45px; border: none; outline: none; border-radius: 5px;font-size: 16px;padding-left: 15px;box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);background-color: #f6f8fa; font-family: 'Poppins', sans-serif; transition: all 120ms ease-out 0s; margin-left: 19px;">
                <option value="">Select</option>
                <option value="Active" <?php echo ($row['status'] === "Active") ? 'selected' : '' ?>>
                  Active</option>
                <option value="Inactive" <?php echo ($row['status'] === "Inactive") ? 'selected' : '' ?>>
                  Inactive</option>
              </select>
            </div>

            <div class="reg_btn" id="btnsubmit">
              <input type="submit" name="edit" value="Update" id="userupdate" onclick="submituser()" />
            </div>

        <?php
          }
        }
        ?>

      </form>
    </div>
  </div>


</body>

</html>



<script>
  window.addEventListener('beforeunload', function() {
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage', true)
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
        document.getElementById("propileimage").style.height = '150px';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>



<script type="text/javascript">
  function userfields(event) {
    alert(event.target.value);
    document.getElementById('employeeID').style.display = 'block';
    document.getElementById('CommencementEmployment').style.display = 'block';
    document.getElementById('completionEmployment').style.display = 'block';
    document.getElementById('studentregno').style.display = 'block';
    document.getElementById('Articleship').style.display = 'block';
    document.getElementById('completionArticleship').style.display = 'block';
    document.getElementById('partner').style.display = 'block';
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
      document.getElementById('partner').style.display = 'none';
    }
  }

  document.getElementById("save_user_btn").addEventListener('click', () => {
    alert("Data Updated successfully");
  })
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




<script>
  // Edit user Form
  document.querySelector('#edit_user_btn ').addEventListener('click', function() {

    //Making editable by removing readonly attribute
    document.querySelector('.user_name').removeAttribute('readonly')
    document.querySelector('.user_icai').removeAttribute('readonly')
    document.querySelector('.start_date').removeAttribute('readonly')
    document.querySelector('.end_date').removeAttribute('readonly')
    document.querySelector('.partner').removeAttribute('readonly')
    document.querySelector('.balunand_id').removeAttribute('readonly')
    document.querySelector('.personal_email').removeAttribute('readonly')
    document.querySelector('.official_email').removeAttribute('readonly')
    document.querySelector('.mobile_number').removeAttribute('readonly')
    document.querySelector('.blood_group').removeAttribute('readonly')
    document.querySelector('.status').removeAttribute('readonly')
    document.querySelector('#typeOfUser__select').removeAttribute('disabled')
    document.querySelector('#typeOfUser__select').setAttribute('class', 'typeOfUser_OnEditable')

    // Setting Border
    document.querySelector('#name').style.border = "1px solid gray"
    document.querySelector('.user_icai_edit').style.border = "1px solid gray"
    document.querySelector('.start_date_edit').style.border = "1px solid gray"
    document.querySelector('.end_date_edit').style.border = "1px solid gray"
    document.querySelector('.partner_edit').style.border = "1px solid gray"
    document.querySelector('.balunand_id_edit').style.border = "1px solid gray"
    document.querySelector('.personal_email_edit').style.border = "1px solid gray"
    document.querySelector('.official_email_edit').style.border = "1px solid gray"
    document.querySelector('.mobile_number_edit').style.border = "1px solid gray"
    document.querySelector('.blood_group_edit').style.border = "1px solid gray"
    document.querySelector('.status_edit').style.border = "1px solid gray"

    document.querySelector('.start_date_edit').type = "date";
    document.querySelector('.end_date_edit').type = "date";

    // Enabling Save Button

    document.getElementById('userupdate').style.display = "block";
    document.getElementById('edit_user_btn').style.display = "none";

    document.getElementById("bloodgroup").style.display = "none";
    document.getElementById("blood1").style.display = "block";

    document.getElementById('status').style.display = "none";
    document.getElementById('userstatus').style.display = "block";


    document.getElementById('edit_user_pic_btn').style.display = "block";
  })
  document.getElementById('userupdate').addEventListener('click', function() {
    alert('Data Updated Successfully')
    location.reload()
  })
</script>




<!-- name validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
  $(function() {

    $('#name').keydown(function(e) {

      if (e.ctrlKey || e.altKey) {

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