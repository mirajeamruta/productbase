<div id="bulk_workorder_container">
<form method="post" action="<?= base_url('Bulk_Workorder_Controller/index') ?>"
enctype='multipart/form-data'
>
       <h3 class="bulk_workorder_container__header">Upload In Bulk</h3>
       <p id="bulk_workder_selected_File_Name">No File Selected</p>
       <span id="close_bulk_workorder">&times;</span>

       <?php if ($this->session->flashdata('success')) { ?>
            <p  id="csv_upload_success" style="position: absolute;top:335px;left: 589px;; color:green">
                <?= $this->session->flashdata('success') ?>
            </p>
       <?php } ?>
        
       <span class="sunny">
       <?php if ($this->session->flashdata('error')) { ?>
            <p  >
                <?= $this->session->flashdata('error') ?>
            </p>
            <?php }
       ?>
     </span>
       <div class="bulk_workorder_container__choose_bulk_file">
         <label for="choose_bulk_workorder" class="bulk_workorder_label">Choose File</label>
         <input type="file" id="choose_bulk_workorder" name="choose_bulk_workorder"/>
       </div>
       <input type="submit" id="bulk_workorder_submit" value="Submit" name="submit"/>
</form>
</div>

<script>

let chooseFile=document.getElementById('choose_bulk_workorder');
chooseFile.addEventListener('change',(e)=>{
    if(e.target.files[0]){
       
        let path=chooseFile.value;
        // Allowed Types
        let allowType=/(\.xls|\.csv)/i;

        if(!allowType.exec(path)){
            alert('File Type not support');
            chooseFile.value="";
        }else{
           document.getElementById('bulk_workder_selected_File_Name').innerHTML=chooseFile.files[0].name;
           document.getElementById('bulk_workorder_submit').style.display="block";
           document.getElementById('close_bulk_workorder').style.display="flex";
           document.querySelector('.bulk_workorder_label').style.display="none";
          if(document.getElementById('csv_upload_success').style.display="block")
          {
            document.getElementById('csv_upload_success').style.display="none";
          }    
        }    
       
  }
})
 document.getElementById('close_bulk_workorder').addEventListener('click',()=>{           
        chooseFile.value="";
        document.getElementById('bulk_workder_selected_File_Name').innerHTML="No File Selected";
        document.querySelector('.bulk_workorder_label').style.display="flex"
        document.getElementById('bulk_workorder_submit').style.display="none";
        document.getElementById('close_bulk_workorder').style.display="none";
        
    })  

</script>
