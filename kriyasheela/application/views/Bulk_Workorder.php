<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />

</head>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');


  /* Reset CSS */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  /* Body Styles */
  body {
    font-family: 'Poppins', sans-serif;
    background: #f6f8fa;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  /* Container Styles */
  .bulk-container {
    max-width: 1386px;
    width: 100%;
    background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1), 0px 5px 12px -2px rgba(0, 0, 0, 0.1), 0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: -4px;
    height: 566px;
  }

  /* Title Styles */
  .title {
    padding: 25px;
    background: #f6f8fa;
  }

  .title p {
    font-size: 1.75rem;
    margin-left: 23px;
    margin-top: 17px;
    font-weight: 600;
  }

  .title p::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(to right, #F37A65, #D64141);
  }

  /* Main Container Styles */
  .main {
    display: flex;
  }

  /* File Upload Styles */
  #uplaodFileDetails {
    text-align: center;
    margin-top: 20px;
    position: relative;
  }

  #bulk_workder_selected_File_Name {
    font-weight: bold;
    font-size: 18px;
  }

  #close_bulk_workorder {
    position: absolute;
    top: -7px;
    right: 461px;
    font-size: 28px;
    cursor: pointer;
    display: none;
  }

  /* Success and Error Message Styles */
  .upload___successmessage {
    color: #00a71e;
    font-weight: 600;
    position: relative;
    left: 276px;
  }

  #bulk_workorder_error {
    color: #ff0000;
  }

  .main-container {
    display: flex;
    width: 100vw;
    position: relative;
    top: 5px;
    z-index: 1;
}

  /* File Input Styles */
  .bulk_workorder_label {
    display: inline-block;
    padding: 11px 90px;
    background: #3498db;
    color: #ffffff;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
    font-size: 16px;
    position: relative;
    left: 477px;
    top: 51px;
  }

  #choose_bulk_workorder {
    display: none;
  }

  #bulk_workorder_submit {
    display: none;
    padding: 10px 20px;
    background: #3498db;
    color: #ffffff;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
    font-size: 16px;
    left: 573px;
    top: 95px;
    position: relative;
  }

  #bulk_workorder_submit:hover {
    background: #2770e9;
  }


  /* Media Query for Small Screens (max-width: 768px) */
  @media (max-width: 768px) {
    #bulk_workder_selected_File_Name {
      font-size: 16px;
    }

    #close_bulk_workorder {
      right: 50px;
    font-size: 24px;
    top: -4px;
    display: none;
    }

    .upload___successmessage {
      font-size: 10px;
    left: 23px;
    top: 53px;
    }

    .bulk_workorder_label {
      padding: 10px 61px;
      left: 45px;
      top: 95px;
      width: 222px;
    }

    #bulk_workorder_submit {
      padding: 10px 20px;
      left: 105px;
      top: 94px;
      display: none;
    }

    #bulk-details {
      height: 546px;
    width: 369px;
    margin-left: -7px !important;
    }
  }
</style>


<body>
  <div class="main">
    <div class="bulk-container" id="bulk-details">
      <div class="title">
        <p style="font-size: 1.75rem; margin-left: 23px; margin-top: 17px; font-weight: 600;">Upload In Bulk</p>
      </div>

      <form method="post" action="<?= base_url('Bulk_Workorder_Controller/index') ?>" enctype='multipart/form-data'>

        <div id="uplaodFileDetails">
          <p id="bulk_workder_selected_File_Name">No File Selected</p>
          <span id="close_bulk_workorder">&times;</span>
        </div>


        <?php if ($this->session->flashdata('success')) { ?>
          <p id="csv_upload_success" class="upload___successmessage">
            <?= $this->session->flashdata('success') ?>
          </p>
        <?php } ?>

        <span class="sunny">
          <?php if ($this->session->flashdata('error')) { ?>
            <p id="bulk_workorder_error">
              <?= $this->session->flashdata('error') ?>
            </p>
          <?php }
          ?>
        </span>
        <div id="uploadButtons">
          <div class="bulk_workorder_container__choose_bulk_file">
            <label for="choose_bulk_workorder" id="choosefile" class="bulk_workorder_label bulkworkorder_detail">Choose File</label>
            <input type="file" id="choose_bulk_workorder" name="choose_bulk_workorder" />
          </div>
          <input type="submit" id="bulk_workorder_submit" value="Submit" name="submit" />
        </div>

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

  let chooseFile = document.getElementById('choose_bulk_workorder');
  chooseFile.addEventListener('change', (e) => {
    if (e.target.files[0]) {

      let path = chooseFile.value;
      // Allowed Types
      let allowType = /(\.xls|\.csv)/i;

      if (!allowType.exec(path)) {
        alert('File Type not support');
        chooseFile.value = "";
      } else {
        document.getElementById('bulk_workder_selected_File_Name').innerHTML = chooseFile.files[0].name;
        document.getElementById('bulk_workorder_submit').style.display = "block";
        document.getElementById('close_bulk_workorder').style.display = "flex";
        document.querySelector('.bulk_workorder_label').style.display = "none";
        if (document.getElementById('csv_upload_success').style.display = "block") {
          document.getElementById('csv_upload_success').style.display = "none";
        }
      }

    }
  })
  document.getElementById('close_bulk_workorder').addEventListener('click', () => {
    chooseFile.value = "";
    document.getElementById('bulk_workder_selected_File_Name').innerHTML = "No File Selected";
    document.querySelector('.bulk_workorder_label').style.display = "flex"
    document.getElementById('bulk_workorder_submit').style.display = "none";
    document.getElementById('close_bulk_workorder').style.display = "none";

  })
</script>