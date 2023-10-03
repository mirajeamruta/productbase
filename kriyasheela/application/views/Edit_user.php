<div class='container userform'>

    <div id="section_userform">
        <span class="hearline_userdetail" id="mainheader__userform"> VIEW USER DETAIL</span>
        <button id="edit_user_btn">Edit</button>
        <!-- <button id="save_user_btn"  class="btn btn-info"  onclick="submituser()">Save</button> -->

        <form class="form col-md-8 offset-md-1" method="post" autocomplete="off"
            action="<?= base_url('User/EditUser')?>" style="margin-top: 45px;">
            <?php
			/*
                  <td><a href="<?=base_url("User/editUserData")?><?php echo 'user_id='.$row['user_id'];?>">view
            details</a>
            </td>
            */
            if (count($userdetailsdata) > 0) {
            foreach ($userdetailsdata as $row) {

            // $this->load->library('session');
            // $this->session->set_userdata(array('edited_image' => $row['image']));

            ?>
            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
            <input type="hidden" name="user_type_id" value="<?php echo $row['user_type_id'] ?>">
            <?php
                       if($row['user_type_id']==1){
                     ?> 
                    <div class="row mb-3" id="typeOfUser">
                       <div class="col-sm-9">
                          <select name="usertype" disabled="true" id="typeOfUser__select" hidden>      
                            <option selected>Admin</option>
                          </select>
                        </div>
                    </div>
                 <?php
                     }
                ?>
                   <!-- For Othe User Except Admin -->
                <?php
                      if($row['user_type_id']!=1){
                  ?>
              <div class="row mb-3" id="typeOfUser">
                 <label  class="col-sm-3">Type of user :</label>
                 <div class="col-sm-9">
                       <select name="usertype" disabled="true" id="typeOfUser__select">
                         <?php if($row['user_type_id']==2){ ?>
                             <option selected>Employee</option>
                             <option >Article Trainee</option>
                             <option >External Consultant</option>
                         <?php
                          }else if($row['user_type_id']==3){
                         ?>
                             <option>Employee</option>
                             <option selected>Article Trainee</option>
                             <option >External Consultant</option>
                         <?php
                          }else if($row['user_type_id']==4){
                         ?>
                             <option>Employee</option>
                             <option >Article Trainee</option>
                             <option selected >External Consultant</option>
                          <?php
                          }
                         ?>
                       </select>
                 </div>
             </div>
             <?php
               }
             ?>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Name :</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control user_name" id="name"
                        value="<?php echo $row['name'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3" id="displayimage">
                <label for="demo-date" class="col-sm-3">Profile photo</label>
                <div class="col-sm-9">
                    <!-- <p><?php echo ('https://balunand.com/kriyasheela/photos/http://localhost/kriyasheela-p2/kriyasheela/photos/' . $row['image']) ?></p> -->
                    <img id="propileimage"
                        src="<?php echo ('http://localhost/balunand/kriyasheela/photos/' . $row['image']) ?>"
                        width="100px" height="100px" alt="your image" />

                </div>
                <!--<input type="file" name="user_image" id="edit_user_pic_btn" />-->

            </div>
            <?php
               if($row['user_type_id']==3){
             ?>

           <div class="row mb-3">
                 <label for="demo-date" class="col-sm-3">SRO Number
:</label>
                 <div class="col-sm-9">
                     <input type="text" name="ID" class="form-control
user_icai user_icai_edit" id="ID" value="<?php echo $row['ID'] ?>"
                         aria-describedby="created_on"  readonly/>
                 </div>
             </div>

             <?php

               }else{
               ?>
           <div class="row mb-3">
                 <label for="demo-date" class="col-sm-3">ICAI Number
:</label>
                 <div class="col-sm-9">
                     <input type="text" name="ID" class="form-control
user_icai user_icai_edit" id="ID" value="<?php echo $row['ID'] ?>"
                         aria-describedby="created_on"  readonly/>
                 </div>
             </div>
             <?php
               }
             ?>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Start Date :</label>
                <div class="col-sm-9">
                    <input type="text" name="startdate" class="form-control start_date start_date_edit" id="startdate"
                        value="<?php echo $row['startdate'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">End Date :</label>
                <div class="col-sm-9">
                    <input type="text" name="enddate" class="form-control end_date end_date_edit" id="enddate"
                        value="<?php echo $row['enddate'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Partner Under Whom Registered :</label>
                <div class="col-sm-9">
                    <input type="text" name="partner_under_whom_registered" class="form-control partner partner_edit"
                        id="partner_under_whom_registered" value="<?php echo $row['partner_under_whom_registered'] ?>"
                        aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Balunand Id Number:</label>
                <div class="col-sm-9">
                    <input type="text" name="balunand_id_no" class="form-control balunand_id  balunand_id_edit"
                        id="balunand_id_no" value="<?php echo $row['balunand_id_no'] ?>" aria-describedby="created_on"
                        readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Personal Email Address:</label>
                <div class="col-sm-9">
                    <input type="text" name="personal_email" class="form-control personal_email personal_email_edit"
                        id="personal_email" value="<?php echo $row['personal_email'] ?>" aria-describedby="created_on"
                        readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Official Email Address :</label>
                <div class="col-sm-9">
                    <input type="text" name="official_email" class="form-control official_email official_email_edit"
                        id="official_email" value="<?php echo $row['official_email'] ?>" aria-describedby="created_on"
                        readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Mobile Number:</label>
                <div class="col-sm-9">
                    <input type="tel" name="mobile_no" class="form-control mobile_number mobile_number_edit"
                        id="mobile_no" minlength="10" maxlength="10" value="<?php echo $row['mobile_no'] ?>"
                        aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Blood Group:</label>
                <div class="col-sm-9 edituser__blood1">
                    <input type="text" name="bloodgroup" class="form-control  blood_group blood_group_edit" id="bloodgroup"
                        value="<?php echo $row['bloodgroup'] ?>" aria-describedby="created_on"   readonly/>
                        <select name="bloodgroup" type="text" id="blood1" class="classic user__bloodgroup" style=" display: none;">

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
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Status :</label>
                <div class="col-sm-9">
                    <input type="text" name="status" class="form-control  status status_edit status___data" id="status"
                        value="<?php echo $row['status'] ?>" aria-describedby="created_on" readonly />
                        <select name="status" type="text" class="classic user___statusdata" id="userstatus" style="display: none;">
                           <option value="">Select</option>
                            <option value="Active"
                                <?php echo ($row['status'] === "Active") ? 'selected' : '' ?>>
                                Active</option>
                              <option value="Inactive"
                                <?php echo ($row['status'] === "Inactive") ? 'selected' : '' ?>>
                                Inactive</option>
                        </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8 editdata__userbtn" id="btnsubmit">
                    <input type="submit" name="edit"  value="Update" id="userupdate" class="btn btn-info edituser__updatebtn"
                        onclick="submituser()" />
                </div>
            </div>
            <?php
				}
			}
			?>
        </form>
    </div>
</div>

<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
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
        document.querySelector('#typeOfUser__select').setAttribute('class','typeOfUser_OnEditable')

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

$('#name').keydown(function (e) {

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