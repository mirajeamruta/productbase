<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css" />
    
  </head>


<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f6f8fa;
    font-family: 'Poppins', sans-serif;
}
.custom-select{
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
.container-client{
  max-width: 1245px;
    width: 100%;
    background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
                0px 5px 12px -2px rgba(0, 0, 0, 0.1),
                0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: -2px;
}
.main-container {
    display: flex;
    width: 100vw;
    position: relative;
    top: 4px;
    z-index: 1;
}

.client-container .title {
    padding: 25px;
    background: #f6f8fa;
}
.container-client .title p{
    font-size: 25px;
    font-weight: 500;
    /* position: relative; */
    margin-top: 22px;
    margin-left: 36px;
}

.container-client .title p::before{
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(to right, #F37A65, #D64141);
}

.client_details{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    padding: 19px;
}

.client_details .input_box{
    width: calc(100% / 2 - 20px);
    margin: 0 0 12px 0;
}

.input_box label{
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
}

.input_box label::after{
    content: " *";
    color: red;
}

.input_box input{
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
.textarea{
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



form .gender{
    padding: 0px 25px;
}

.gender .gender_title{
    font-size: 20px;
    font-weight: 500;
}

.gender .category{
    width: 80%;
    display: flex;
    justify-content: space-between;
    margin: 5px 0;
}

.gender .category label{
    display: flex;
    align-items: center;
    cursor: pointer;
}

.gender .category label .dot{
    height: 18px;
    width: 18px;
    background: #d9d9d9;
    border-radius: 50%;
    margin-right: 10px;
    border: 4px solid transparent;
    transition: all 0.3s ease;
}

#radio_1:checked ~ .category label .one,
#radio_2:checked ~ .category label .two,
#radio_3:checked ~ .category label .three{
    border-color: #d9d9d9;
    background: #D64141;
}

.gender input{
    display: none;
}

.reg_btn{
    padding: 25px;
    margin: 15px 0;
}

.reg_btn input{
    height: 45px;
    width: 100%;
    border: none;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    background: linear-gradient(to right, #F37A65, #D64141);
    border-radius: 5px;
    color: #ffffff;
    letter-spacing: 1px;
    text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
}

.reg_btn input:hover{
    background: linear-gradient(to right, #D64141, #F37A65);
}


/* Add this CSS for responsiveness */
@media screen and (max-width: 584px) {
    .client_details .input_box {
        width: 100%;
        margin-right: 0;
    }
    .client_details .input_box label {
        margin-bottom: 5px;
    }
    .input-group.date {
        display: block;
        margin-top: 10px;
    }
    .reg_btn {
        text-align: center;
        margin-top: 20px;
    }
}

/* Additional styles for very small screens (you can adjust these values as needed) */
@media screen and (max-width: 419px) {
    .client_details .input_box {
        padding-left: 0;
        padding-right: 0;
    }
}

/* Common styles for both big and small screens */
#sDev {
    text-align: center;
}

.clientUpload {
  height: 39vh;
    text-align: center;
}


/* Styles for the form */
/* .clientUpload form {
    background-color: #f7f7f7;
    padding: 4px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center; 
    max-width: 400px; 
} */

.clientUpload .or {
    font-size: x-large;
    font-weight: 600;
    margin-bottom: 20px;
}

.clientUpload .form-group {
    margin-bottom: 20px;
}

.clientUpload #chooseFile {
    display: none; /* Hide the default file input */
}

/* Style the "Choose File" button */
.clientUpload #showSubmitButton {
    background-color: #007bff;
    color: #fff;
    padding: 10px 82px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.clientUpload #showSubmitButton:hover {
    background-color: #0056b3;
}

/* Style the "Submit" button */
.clientUpload #clientCSVSubmit {
    display: none; /* Initially hidden */
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 258px;
    margin-left: 16px;
    transition: background-color 0.3s;
}

.clientUpload #clientCSVSubmit:hover {
    background-color: #0056b3;
}

/* Styles for small screens (e.g., mobile devices) */
@media (max-width: 768px) {
    .clientUpload form {
        padding: 10px;
    }
}




</style>

  <body>
 <div class="main">
    <div class='container-client' id="section_clientform">
    <div class="title">
        <p>Client Form</p>
    </div>
    <?php if ($this->session->flashdata('clienterror')) { ?>
        <p class="text-success text-center">
          <?= $this->session->flashdata('clienterror') ?>
        </p>
      <?php } ?>
    <form id="clientsubmit" method="post" autocomplete="off" action="<?= base_url( 'Client/createClient' ) ?>" onsubmit="handleFormSubmit()" enctype='multipart/form-data'>
        <div class="client_details">
            <div class="input_box">
                <label for="fullName">Legal Name :</label>
                <input type="text" name="clientname"  id="clientname_legal" placeholder="Legal Name" size="50" required>   
            </div>

            <div class="input_box">
                <label for="inputEmail3">Trade Name :</label>
                <input type="text" name="tradename" id="clientname_legal1" placeholder="Trade Name">
            </div>

            <div class="input_box">
                <label for="demo-date">Type of Clients</label>
                <select name="Type_of_Clients" id="type_of_clients" class="custom-select" aria-describedby="type_of_clients" required>
                    <option value="">Select</option>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
    
                  </select>
              
            </div>

            <div class="input_box">
                <label for="pan">Pan :</label>
                <input type="text" name="pancard" id="pancard" MaxLength="10" placeholder="Pan " style="text-transform: uppercase;" required onblur="ValidatePAN(this);">
            </div>

            <div class="input_box">
                <label for="gst">GST :</label>
                <input type="text" name="gst" id="txtGSTNumber"  id="" placeholder="GST" MaxLength="15" style="text-transform: uppercase;" onblur="ValidateGSTNumber();">
                <span id="lblError" ></span>
            </div>

            <div class="input_box">
                <label for="Tan">Tan :</label>
                <input type="text" name="tan" id="txtTANNumber"  id="" placeholder="TAN" MaxLength="10" style="text-transform: uppercase;" onclick="ValidateTANNumber()">
                <span id="lblError1"></span>
            </div>
          
            <div class="input_box">
                <label for="Aadhaar">Aadhaar Number :</label>
             
                <input type="text" name="aadhar" id="txtAadhaar"  id="gst" data-type="adhaarnumber" placeholder="Aadhaar Number" maxlength="14" required>
               </div>

          

               <div class="input_box">
                <label for="address">Address :</label>
                <input type="text" name="address" id="address"  id="gst" placeholder="Address" required>
                    </div>

                 <div class="input_box">
                    <label for="person_incharge">Person Incharge :</label>
                    <input type="text" name="person_incharge" id="person_incharge" size="50" id="gst" placeholder="Person Incharge" required>
                 </div>

                 <div class="input_box">
                    <label for="person_name">Person Name :</label>
                    <input type="text" name="person_name" id="person_name" placeholder="Name" size="50" required>


                 </div>
                 
                 <div class="input_box">
                    <label for="contact_no">Contact No :</label>
                    <input type="tel" name="person_to_be_contact" id="person_to_be_contact"  minlength="10" maxlength="10" placeholder="Person to be Contacted" required>
                 </div>
        </div>
  
        <div class="reg_btn">
            <input type="submit" name="insert" value="Submit" id="clientFormSubmit"  required />
    </form>

    <?php if ($this->session->flashdata('success')) { ?>
        <p class="text-success text-center" style="margin-top:10px;">
          <?= $this->session->flashdata('success') ?>
        </p>
      <?php } ?>
    </div>

    <hr></hr>

    <div class='col-md-3 offset-md-5' id="sDev">
    <p class="or" style="font-size: x-large; font-weight: 600;">OR</p>
    <div class="clientUpload">
        <form id="" method="post" action="<?= base_url('Client/uploadClient') ?>" enctype="multipart/form-data">
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="text-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
    
        <?php if ($this->session->flashdata('Fail')) : ?>
          <div class="text-danger"><?php echo $this->session->flashdata('Fail'); ?></div>
        <?php endif; ?>
            <div class="form-group">
                <input type="file" name="userfile" id="chooseFile" data-icon="false" required>
            </div>
            <button type="button" id="showSubmitButton" class="uploadClientCSV">Choose File</button>
            <input type="submit" name="submit" value="Submit" id="clientCSVSubmit" style="display: none;" />
            <label class="uploadClientCSV" for="chooseFile"> Upload Client CSV File </label>
            <!-- Selected File Name -->
            <p id='selectedFileName'><span id="fileName"></span></p>
            <p id="dis_Select_File" style="display: none;">&times</p>
        </form>
    </div>
</div>


<!--     
    <div class='col-md-3  offset-md-5' id="sDev" >
    
      <p class="or" style="font-size: x-large; font-weight: 600;">OR</p>
   
 
    
      <form class="clientUpload" id="" method="post" action="<?= base_url(
                                                                'Client/uploadClient'
                                                              ) ?>" enctype="multipart/form-data">
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="text-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
    
        <?php if ($this->session->flashdata('Fail')) : ?>
          <div class="text-danger"><?php echo $this->session->flashdata('Fail'); ?></div>
        <?php endif; ?>
    
    
     
        <div class="form-group">
    
          <input type="file" name="userfile" id="chooseFile" data-icon="false" required>
    
        </div>
  
    
   
        <input type="submit" name="submit" value="Submit"  id="clientCSVSubmit" />
        <label class="uploadClientCSV" for="chooseFile"> Upload Client CSV File </label>
   
        <p id='selectedFileName'><span id="fileName"></span>
        <p id="dis_Select_File">&times</p>
        </p>
    
   
      </form>
    </div> -->
    </div>
    </div>
    
</div> 
</div>
</body>
</html>




<script>
window.addEventListener('beforeunload',function(){
localStorage.removeItem('selectedte')
localStorage.setItem('refreshPage',true)
})
</script>



<script>
document.getElementById('chooseFile').addEventListener('change', function () {
    const fileName = this.value.split('\\').pop();
    document.getElementById('fileName').textContent = fileName;
    document.getElementById('showSubmitButton').style.display = 'none';
    document.getElementById('clientCSVSubmit').style.display = 'block';
});
</script>




<script>
const btn = document.getElementById("csvUpload");
const closeUploadClient = document.getElementById("closeUploadClient");
const clientUpload = document.querySelector(".clientUpload")

const fileUpload = document.getElementById('chooseFile');
const clientCSVSubmit = document.getElementById('clientCSVSubmit');
const clientFormSubmit = document.getElementById('clientFormSubmit');
const fileName = document.getElementById('fileName');
const selectedFileName = document.getElementById('selectedFileName');
const uploadCSVFileLabel = document.querySelector('.uploadClientCSV');
const successMessage = document.querySelector('.text-success');

// === Dis select File === //
const disSelect = document.getElementById('dis_Select_File');

disSelect.addEventListener('click', function() {
fileUpload.value = '';
selectedFileName.style.display = "none"
clientCSVSubmit.style.display = "none";
disSelect.style.display = "none";
clientFormSubmit.style.display = "block";
})


fileUpload.addEventListener('change', function(e) {
if (e.target.files[0]) {

  // file path
  var path = fileUpload.value;
  // allow file type
  let allowType = /(\.xls|\.csv)/i;

  if (!allowType.exec(path)) {
    alert('Please Upload only CSV files');
    fileName.innerHTML = "Please Upload only CSV files";
    successMessage.style.display = "none";
    fileUpload = '';
    return false;
  } else {
    fileName.innerHTML = fileUpload.files[0].name;
    disSelect.style.display = "block";
    clientCSVSubmit.style.display = "block";
    selectedFileName.style.display = "block";
    fileName.style.display = "block";
    clientFormSubmit.style.display = "none";
    //  uploadCSVFileLabel.style.display="none";
    //  === File Upload Success Message disable after file upload === //
    successMessage.style.display = "none";
  }
}
})
</script>


<!-- Pan Validation -->


<script>
function ValidatePAN(pancard) {


if (pancard.value != "") {
  ObjVal = pancard.value;
  ObjValLength = pancard.value.length;
  ObjVal = ObjVal.toUpperCase();

  var panPat = /[a-zA-Z]{3}[PCHFATBLJG]{1}[a-zA-Z]{1}[0-9]{4}[a-zA-Z]{1}$/;
  var pan = {
    C: "Company",
    P: "Personal",
    H: "Hindu Undivided Family (HUF)",
    F: "Firm",
    A: "Association of Persons (AOP)",
    T: "AOP (Trust)",
    B: "Body of Individuals (BOI)",
    L: "Local Authority",
    J: "Artificial Juridical Person",
    G: "Govt"
  };
  pan = pan[ObjVal[3]];


  if (ObjValLength != 10) {
    alert("PAN Number should be 10 digit !");
    // set the value to null - if input id name = pan & form name = myform
    //  document.forms['myform'].pan.value = "";
    return false;
  }

  if (ObjVal.search(panPat) == -1) {
    alert("Invalid Pan No.");
    // pancard.focus();
    return false;
  }
  if (pan != "undefined") {
    alert(pan + " - Pan No. detected");
  } else {
    alert("Unknown Pan card No.");
    return false;
  }
}
}
</script>



<!-- Aadhar validation  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('[data-type="adhaarnumber"]').keyup(function() {
var value = $(this).val();
value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join(" ");
$(this).val(value);
});

$('[data-type="adhaarnumber"]').on("change, blur", function() {
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

$('#clientname_legal').keydown(function(e) {

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




<script>
$(function() {

$('#clientname_legal1').keydown(function(e) {

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


<!-- gst validation -->

<script>
function ValidateGSTNumber() {
var Obj = document.getElementById("txtGSTNumber");
if (Obj.value != "") {
  ObjVal = Obj.value;
  var expr = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
  if (ObjVal.search(expr) == -1) {
    alert("Invalid GST No format should be(18AABCU9603R1ZM)");
    // Obj.focus();
    return false;
  } else {
    // alert("Valid GST No");
  }
}
}
</script>



<!-- TAN validation -->


<script>
function ValidateTANNumber() {
var Obj = document.getElementById("txtTANNumber");
if (Obj.value != "") {
  ObjVal = Obj.value;
  var expr = /^S4[0-9]{5}$^S1/;
  if (ObjVal.search(expr) == -1) {
    alert("Invalid TAN No format should be(AAAAA9999A9A)");
    // Obj.focus();
    return false;
  } else {
    // alert("Valid TAN No");
  }
}
}
</script>




<!-- validation for person incharge -->


<script>
$(function() {

$('#person_incharge').keydown(function(e) {

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




<!-- Validation for name -->

<script>
$(function() {

$('#person_name').keydown(function(e) {

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



