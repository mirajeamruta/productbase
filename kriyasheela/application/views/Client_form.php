
<style type="text/css">
    body { font-family: Arial; font-size: 10pt; }
    .error { color: Red; }
    .gst { text-transform: uppercase; }
</style>
<div class='container userform' id="section_clientform">
    <span>Client Form</span>
    <div class='row'>

        <div class='col-md-7'>

            <?php if ($this->session->flashdata('clienterror')) { ?>
            <p class="text-success text-center">
                <?= $this->session->flashdata('clienterror') ?>
            </p>
            <?php } ?>

            <form id="clientsubmit" method="post" autocomplete="off" action="<?= base_url(
                                                                                    'Client/createClient'
                                                                                ) ?>" enctype='multipart/form-data'>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 clientLabel">Legal Name :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="clientname" class="form-control clientLegalName" id="clientname_legal" placeholder="Legal Name" size="50" required >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 clientLabel">Trade Name :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="tradename" class="form-control clientLegalName" id="clientname_legal1" placeholder="Trade Name" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase clientLabel">Pan :</label>
                    <div class="col-sm-8 clientInput" >
                        <input type="text" name="pan" class="form-control" id="inputPassword3" placeholder="PAN" maxlength="10" onblur="ValidatePAN(this);" style="text-transform: uppercase;"  required>
                    </div>
                </div>
                <div class="row mb-3">  
                    <label for="inputPassword3" class="col-sm-4 text-uppercase clientLabel">GST :</label>
                    <div class="col-sm-8 clientInput" >
                   
                        <input type="text" name="gst" id="txtGSTNumber" class="form-control" id="" placeholder="GST" MaxLength="15" style="text-transform: uppercase;"  onblur="ValidateGSTNumber(this);">
                        <span id="lblError" class="error" style="font-size: 13px; font-family: Arial; color: Red; margin-top: 4px;margin-left: -320px;"></span>
                    </div>
                </div>
                <div class="row mb-3" style="margin-top: -26px;">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase clientLabel">Tan :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="tan" id="txtTANNumber" class="form-control" id="" placeholder="TAN" MaxLength="10" style="text-transform: uppercase;" onclick="ValidateTANNumber()">
                        <span id="lblError1" class="error1" style="font-size: 13px; font-family: Arial; color: Red; margin-top: 4px;margin-left: -320px;"></span>
                    </div>
                </div>
                <div class="row mb-3" style="margin-top: -26px;">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Aadhaar Number :</label>
                    <div class="col-sm-8 clientInput" >
                        <input type="text" name="aadhar" id="txtAadhaar" class="form-control" id="gst"  data-type="adhaarnumber" placeholder="Aadhaar Number" maxlength="14" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Address :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="address" id="address" class="form-control" id="gst" placeholder="Address"  required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Person Incharge :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="person_incharge" id="person_incharge" class="form-control" size="50" id="gst" placeholder="Person Incharge" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Person To Be Contacted :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="person_to_be_contact" id="person_to_be_contact" class="form-control"
                            id="gst" placeholder="Person to be Contacted" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <input type="submit" name="insert" value="Submit" id="clientFormSubmit"class="btn btn-primary" required />
                    </div>
                </div>
            </form>
            <?php if ($this->session->flashdata('success')) { ?>
            <p class="text-success text-center" style="margin-top:10px;">
                <?= $this->session->flashdata('success') ?>
            </p>
            <?php } ?>
        </div>
        <hr class='hr' />
        <hr class='hr1' />       
        
        <div class='col-md-4  offset-md-1' id="sDev"style="margin-left: 8.2%;">

        <p class="or">OR</p>
        <!--=== In Client Form - Upload excel sheet button  === -->
        <!-- <button id="csvUpload">Upload a CSV File</button> -->

            <form class="clientUpload" id="" method="post" action="<?= base_url(
                                                            'Client/uploadClient'
                                                        ) ?>" enctype="multipart/form-data">
                <!-- <div class="col-sm-10">
					<input type="file" name="userfile" class="form-control" id="inputEmail3">
					<p>Please Select CSV File</p>
					<input type="submit" name="submit" value="Submit" class="btn btn-info" />
				</div>
				<?php if ($this->session->flashdata('success') == true) : ?>
					<div class="text-danger"><?php echo $this->session->flashdata(
                                                    'success'
                                                ); ?></div>
				<?php endif; ?> -->
                <!-- Container which container upload button  -->
               <!-- <div class="uploadCSVContainer"> -->
                <div class="form-group">

                    <input type="file" name="userfile" id="chooseFile" class="filestyle" data-icon="false" required>

                </div>
                <!-- <div class="file-upload">
                    <div class="file-select">
                        <div class="file-select-button" id="fileName">Choose File</div>
                        <div class="file-select-name" id="noFile">No file chosen...</div>
                        <input type="file" name="userfile" id="chooseFile">
                    </div>
                </div> -->

                <!-- <p class="file-upload1">Please Upload Client CSV File</p> -->
                <input type="submit" name="submit" value="Submit" class="btn btn-info uploadBtn" id="clientCSVSubmit"  />
                <label class="uploadClientCSV" for="chooseFile" > Upload Client CSV File </label>
                <!-- Selected File Name  -->
               <p id='selectedFileName'><span id="fileName"></span>
              <p id="dis_Select_File">&times</p>
               </p>
               
                <!-- <button id="closeUploadClient">Cancel</button> -->
                 <!-- </div> -->
            </form>
        </div>
    </div>
</div>
<!-- <script>
$('#chooseFile').bind('change', function() {
    var filename = $("#chooseFile").val();
    alert(filename)
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
    } else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});
</script> -->

<script>

    const btn=document.getElementById("csvUpload");
    const closeUploadClient=document.getElementById("closeUploadClient");
    const clientUpload=document.querySelector(".clientUpload")

    const fileUpload=document.getElementById('chooseFile');
    const clientCSVSubmit= document.getElementById('clientCSVSubmit');
    const clientFormSubmit = document.getElementById('clientFormSubmit');
    const fileName= document.getElementById('fileName');
    const selectedFileName=document.getElementById('selectedFileName');
    const uploadCSVFileLabel=document.querySelector('.uploadClientCSV');
    const successMessage=document.querySelector('.text-success');

    // === Dis select File === //
    const disSelect=document.getElementById('dis_Select_File');

    disSelect.addEventListener('click', function(){
             fileUpload.value='';
             selectedFileName.style.display="none"
             clientCSVSubmit.style.display="none";
              disSelect.style.display="none";
             clientFormSubmit.style.display="block";
    })

   
    fileUpload.addEventListener('change',function(e){
      if(e.target.files[0]){
     
        // file path
        var path=fileUpload.value;
       // allow file type
       let allowType=/(\.xls|\.csv)/i;

       if(!allowType.exec(path)){
        alert('Please Upload only CSV files');
         fileName.innerHTML="Please Upload only CSV files";
        successMessage.style.display="none";
        fileUpload='';
        return false;
       }else{
         fileName.innerHTML=fileUpload.files[0].name; 
         disSelect.style.display="block";        
         clientCSVSubmit.style.display="block";
         selectedFileName.style.display="block";
         fileName.style.display="block";
         clientFormSubmit.style.display="none";
        //  uploadCSVFileLabel.style.display="none";
     //  === File Upload Success Message disable after file upload === //
        successMessage.style.display="none";
       }
      }
    })

</script>

 
<!-- Pan Validation -->
<script>

function ValidatePAN() { 
  var Obj = document.getElementById("inputPassword3");
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
              alert("Valid Pan No");
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

$('#clientname_legal').keydown(function (e) {

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

$('#clientname_legal1').keydown(function (e) {

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
  var Obj = document.getElementById("txtGSTNumber");
        if (Obj.value != "") {
            ObjVal = Obj.value;
            var expr = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
            if (ObjVal.search(expr) == -1) {
                alert("Invalid GST No format should be(99AAAAA9999A9A)");
                // Obj.focus();
                return false;
            }
          else
            {
              alert("Valid GST No");
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
            var expr = /(?:(?=(^[a-zA-Z]{5}\d{4}[a-zA-Z]{1}$))|(?=(^[a-zA-Z]{4}[0-9]{5}[a-zA-Z]{1}?$)))/;
            if (ObjVal.search(expr) == -1) {
                alert("Invalid TAN No format should be(AAAAA9999A9A)");
                // Obj.focus();
                return false;
            }
          else
            {
              alert("Valid TAN No");
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
