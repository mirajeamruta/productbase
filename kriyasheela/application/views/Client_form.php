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
                    <label for="inputEmail3" class="col-sm-4 clientLabel">Legal Name / Trade Name</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="clientname" class="form-control clientLegalName" id="clientname_legal" placeholder="Legal Name / Trade Name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase clientLabel">Pan :</label>
                    <div class="col-sm-8 clientInput" >
                        <input type="text" name="pan" class="form-control" id="inputPassword3" placeholder="PAN">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase clientLabel">GST :</label>
                    <div class="col-sm-8 clientInput" >
                        <input type="text" name="gst" id="gst" class="form-control" id="gst" placeholder="GST">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase clientLabel">Tan :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="tan" id="tan" class="form-control" id="gst" placeholder="TAN">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Aadhaar Number :</label>
                    <div class="col-sm-8 clientInput" >
                        <input type="text" name="aadhar" id="aadhar" class="form-control" id="gst" placeholder="Aadhaar Number">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Address :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="address" id="address" class="form-control" id="gst" placeholder="Address">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Person Incharge :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="person_incharge" id="person_incharge" class="form-control" id="gst" placeholder="Person Incharge">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 clientLabel">Person To Be Contacted :</label>
                    <div class="col-sm-8 clientInput">
                        <input type="text" name="person_to_be_contact" id="person_to_be_contact" class="form-control"
                            id="gst" placeholder="Person to be Contacted">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <input type="submit" name="insert" value="Submit" id="clientFormSubmit"class="btn btn-primary" />
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

                    <input type="file" name="userfile" id="chooseFile" class="filestyle" data-icon="false">

                </div>
                <!-- <div class="file-upload">
                    <div class="file-select">
                        <div class="file-select-button" id="fileName">Choose File</div>
                        <div class="file-select-name" id="noFile">No file chosen...</div>
                        <input type="file" name="userfile" id="chooseFile">
                    </div>
                </div> -->

                <!-- <p class="file-upload1">Please Upload Client CSV File</p> -->
                <input type="submit" name="submit" value="Submit" class="btn btn-info uploadBtn" id="clientCSVSubmit" />
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