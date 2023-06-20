<div class='container clientform'>
    <div id="section_clientform" style="background: #eaeae8a9; min-height: 637px !important;">
        <span style="position: relative;top: 20px;left:-69px;font-size: 20px;"> VIEW CLIENT DETAIL</span>
        <form class="form col-md-8 offset-md-1" method="post" autocomplete="off"
            action="<?= base_url('Client/EditClient')?>" style="margin-top: 45px;">
            <?php
			/*
                  <td><a href="<?=base_url("User/editUserData")?><?php echo 'user_id='.$row['user_id'];?>">view
            details</a>
            </td>
            */
            if (count($clientdetailsdata) > 0) {
            foreach ($clientdetailsdata as $row) {
            ?>
            <input type="hidden" name="client_id" value="<?php echo $row['client_id'] ?>">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Legal Name :</label>
                <div class="col-sm-9">
                    <input type="text" name="clientname" class="form-control edit_clientname" id="clientname"
                        value="<?php echo $row['name'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Trade Name :</label>
                <div class="col-sm-9">
                    <input type="text" name="tradename" class="form-control" id="tradename"
                        value="<?php echo $row['Trade_Name'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">PAN :</label>
                <div class="col-sm-9">
                    <input type="text" name="pan" class="form-control" id="pan" maxlength="10" onblur="ValidatePAN(this);" style="text-transform: uppercase;"  required value="<?php echo $row['PAN'] ?>"
                        aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">GST :</label>
                <div class="col-sm-9">
                    <input type="text" name="gst" class="form-control" id="gst" MaxLength="15" style="text-transform: uppercase;"  onblur="ValidateGSTNumber(this);" value="<?php echo $row['GST'] ?>"
                        aria-describedby="created_on" readonly />
                        
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">TAN :</label>
                <div class="col-sm-9">
                    <input type="text" name="tan" class="form-control" id="tan" MaxLength="10" style="text-transform: uppercase;" onclick="ValidateTANNumber()" value="<?php echo $row['tan'] ?>"
                        aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Aadhaar :</label>
                <div class="col-sm-9">
                    <input type="text" name="aadhar" class="form-control" id="aadhar" data-type="adhaarnumber1" placeholder="Aadhaar Number" maxlength="14"
                        value="<?php echo $row['aadhar'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Address :</label>
                <div class="col-sm-9">
                    <input type="text" name="address" class="form-control" id="address"
                        value="<?php echo $row['address'] ?>" aria-describedby="created_on" readonly  />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Person Incharge :</label>
                <div class="col-sm-9">
                    <input type="text" name="person_incharge" class="form-control" id="person_incharge"
                        value="<?php echo $row['person_incharge'] ?>" aria-describedby="created_on" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Person To Be Contacted :</label>
                <div class="col-sm-9">
                    <input type="text" name="person_to_be_contact" class="form-control" id="person_to_be_contact"
                        value="<?php echo $row['person_to_be_contact'] ?>" aria-describedby="created_on" readonly/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8" id="btnsubmit" style="margin-left: 891px;
    position: absolute;
    top: -58px;">
                    <input type="submit" name="edit" id="UPdatebtn" value="Update" class="btn btn-info" onclick="submituser()" />
                </div>
            </div>
            <?php
				}
			}
			?>

           
        </form>
        <button id="edit_client_form" style="width: 110px;
    height: 34px;
    position: absolute;
    right: 224px;
    top: 102px;
    background: blue;
    border: none;
    color: white;" >Edit</button>

    </div>
</div>

<script type="text/javascript">

</script>



<!-- Pan Validation -->
 <script>

function ValidatePAN() { 
  var Obj = document.getElementById("pan");
        if (Obj.value != "") {
            ObjVal = Obj.value;
            var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
            if (ObjVal.search(panPat) == -1) {
                alert("Invalid Pan No format should be(AAAAA2345A)");
                // Obj.focus();
                return false;
            }
          else
            {
              // alert("Valid Pan No");
              }
        }
  } 

</script>


<!-- Aadhar validation  -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

$('[data-type="adhaarnumber1"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join(" ");
  $(this).val(value);
});

$('[data-type="adhaarnumber1"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});

</script>



<!-- name validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$(function() {

$('#clientname').keydown(function (e) {

  if (e.shiftKey || e.ctrlKey || e.altKey) {
  
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


 <script>

$(function() {

$('#tradename').keydown(function (e) {

  if (e.shiftKey || e.ctrlKey || e.altKey) {
  
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


<!-- gst validation -->

<script>
function ValidateGSTNumber() { 
  var Obj = document.getElementById("gst");
        if (Obj.value != "") {
            ObjVal = Obj.value;
            var expr = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
            if (ObjVal.search(expr) == -1) {
                alert("Invalid GST No format should be(18AABCU9603R1ZM)");
                // Obj.focus();
                return false;
            }
          else
            {
              // alert("Valid GST No");
              }
        }
  }
</script>

<!-- TAN validation -->


<script>
function ValidateTANNumber() { 
  var Obj = document.getElementById("tan");
        if (Obj.value != "") {
            ObjVal = Obj.value;
            var expr = /(?:(?=(^[a-zA-Z]{5}\d{4}[a-zA-Z]{1}$))|(?=(^[a-zA-Z]{4}[0-9]{5}[a-zA-Z]{1}?$)))/;
            if (ObjVal.search(expr) == -1) {
                alert("Invalid TAN No format should be(AAAAA9999A9A)");
                // Obj.focus();
                return false;
            }
          else
            {
              // alert("Valid TAN No");
              }
        }
  }
</script>


<!-- validation for person incharge -->


<script>

$(function() {

$('#person_incharge').keydown(function (e) {

  if (e.shiftKey || e.ctrlKey || e.altKey) {
  
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


<script>

    document.getElementById("edit_client_form").addEventListener('click',()=>{
      document.getElementById("UPdatebtn").style.display="block";
      document.getElementById("edit_client_form").style.display="none";
        document.getElementById("clientname").removeAttribute('readonly');
        document.getElementById("tradename").removeAttribute('readonly');
        document.getElementById("pan").removeAttribute('readonly');
        document.getElementById("gst").removeAttribute('readonly');
        document.getElementById("tan").removeAttribute('readonly');
        document.getElementById("aadhar").removeAttribute('readonly');
        document.getElementById("address").removeAttribute('readonly');
        document.getElementById("person_incharge").removeAttribute('readonly');
        document.getElementById("person_to_be_contact").removeAttribute('readonly');


    })
    document.getElementById("UPdatebtn").addEventListener('click',()=>{
     alert("Data Updated successfully");
    })
</script>