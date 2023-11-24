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

.container-editclient {
  max-width: 1386px;
  width: 100%;
  background: #ffffff;
  border-radius: 0.5rem;
  box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1), 0px 5px 12px -2px rgba(0, 0, 0, 0.1), 0px 18px 36px -6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  margin: -4px;
}

.container-editclient .title {
  padding: 25px;
  background: #f6f8fa;
}

.container-editclient .title p {
  font-size: 25px;
  font-weight: 500;
}

.main-container {
  display: flex;
  width: 100vw;
  position: relative;
  top: 4px;
  z-index: 1;
}

.container-editclient .title p::before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 30px;
  height: 3px;
  background: linear-gradient(to right, #F37A65, #D64141);
}

.editclient_details {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 20px;
  padding: 19px;
}

.editclient_details .input_box {
  width: calc(100% / 2 - 20px);
  margin: 0 0 12px 0;
}

.input_box label {
  font-weight: 500;
  margin-bottom: 5px;
  display: block;
}

.input_box label::after {
  content: " *";
  color: red;
}

.input_box input {
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

#edit_client_form {
  padding: 10px 20px;
  background: #27ae60;
  color: #ffffff;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  font-weight: 600;
  font-size: 16px;
  position: relative;
  top: -722px;
  right: -1148px;
}

#UPdatebtn {
  background: brown;
  color: white;
  border: none;
  border-radius: 4px;
  width: 66px;
  height: 42px;
  position: relative;
  top: -616px;
  right: 24px;
  display: none;
}

/* Update Button for Small Screens */
@media (max-width: 768px) {
  .custom-select {
    font-size: 14px;
    height: 40px;
    padding-left: 10px;
  }
  .container-editclient {
    border-radius: 4px;
  }
  .container-editclient .title p {
    font-size: 20px;
  }

  .editclient_details {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }

  .editclient_details .input_box {
    width: 100%;
  }
}
/* Button Styles for Small Screens */
@media (max-width: 768px) {
  .reg_btn {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  #UPdatebtn{
    width: 22%;
    margin: -1145px 0px 0px 257px;
    position: static !important;
  }
  .edit__btn{
    width: 22%;
    margin: -1167px 0px 0px 224px;
    position: static !important;
  }

  #UPdatebtn {
    display: none; /* Initially hide the "Update" button */
  }
  #edit_clientdata{
  width: 355px;
    margin-left: -23px !important;
}
}


</style>



<body>
  <div class="main">
    <div class='container-editclient' id="edit_clientdata">
      <div class="title">
        <p>Edit Client Details</p>
      </div>

      <form id="editclients__data" method="post" autocomplete="off" action="<?= base_url('Client/EditClient') ?>">
        <?php

        if (count($clientdetailsdata) > 0) {
          foreach ($clientdetailsdata as $row) {
        ?>
            <input type="hidden" name="client_id" value="<?php echo $row['client_id'] ?>">
            <div class="editclient_details">
              <div class="input_box">
                <label for="clientname__name">Legal Name :</label>
                <input type="text" name="clientname" id="clientname" value="<?php echo $row['name'] ?>" aria-describedby="created_on" readonly />
              </div>

              <div class="input_box">
                <label for="inputEmail3">Trade Name :</label>
                <input type="text" name="tradename" id="tradename" value="<?php echo $row['Trade_Name'] ?>" aria-describedby="created_on" readonly />
              </div>
              <div class="input_box">
                <label for="name">Type of Clients :</label>
                <input type="text" name="Type_of_Clients" id="Type_of_Clients" style="" value="<?php echo $row['Type_of_Clients'] ?>" aria-describedby="created_on" readonly />
                <select type="text" name="Type_of_Clients" id="type_of_clients1" class="custom-select" onclick="myfun()" value="<?php echo $row['Type_of_Clients'] ?>" aria-describedby="created_on" style=" display: none;" readonly>
                  <option value="">Select</option>
                  <?php
                  if ($row['Type_of_Clients'] == "P-Individual") {

                  ?>
                    <option value="P-Individual" selected>P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php
                  } else if ($row['Type_of_Clients'] == "C-Company") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company" selected>C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php

                  } else if ($row['Type_of_Clients'] == "T-Trust") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust" selected>T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>

                  <?php } else if ($row['Type_of_Clients'] == "Association of Persons") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons" selected>Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php
                  } else if ($row['Type_of_Clients'] == "Firm") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm" selected>Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php
                  } else if ($row['Type_of_Clients'] == "HUF") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF" selected>HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php
                  } else if ($row['Type_of_Clients'] == "Body of Individual") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual" selected>Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php } else if ($row['Type_of_Clients'] == "Goverment") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment" selected>Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php
                  } else if ($row['Type_of_Clients'] == "Local Authority") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority" selected>Local Authority</option>
                    <option value="Artifical Judicial Person">Artifical Judicial Person</option>
                  <?php
                  } else if ($row['Type_of_Clients'] == "Artifical Judicial Person") {
                  ?>
                    <option value="P-Individual">P-Individual</option>
                    <option value="C-Company">C-Company</option>
                    <option value="T-Trust">T-Trust</option>
                    <option value="Association of Persons">Association of Persons</option>
                    <option value="Firm">Firm</option>
                    <option value="HUF">HUF</option>
                    <option value="Body of Individual">Body of Individual</option>
                    <option value="Goverment">Goverment</option>
                    <option value="Local Authority">Local Authority</option>
                    <option value="Artifical Judicial Person" selected>Artifical Judicial Person</option>
                  <?php
                  }
                  ?>
                </select>

              </div>

              <div class="input_box">
                <label for="pan">Pan :</label>
                <input type="text" name="pancard" id="pancard1" MaxLength="10" placeholder="Pan Number" style="text-transform: uppercase;" value="<?php echo $row['PAN'] ?>" aria-describedby="created_on" readonly onblur="ValidatePAN(this);">
              </div>

              <div class="input_box">
                <label for="gst">GST :</label>
                <input type="text" name="gst" id="gst1" MaxLength="15" style="text-transform: uppercase;" onblur="Validamber(this);" value="<?php echo $row['GST'] ?>" aria-describedby="created_on" readonly />
              </div>

              <div class="input_box">
                <label for="tan">TAN :</label>
                <input type="text" name="tan" id="tan1" MaxLength="10teGSTNu" style="text-transform: uppercase;" onclick="ValidateTANNumber()" value="<?php echo $row['tan'] ?>" aria-describedby="created_on" readonly />
              </div>

              <div class="input_box">
                <label for="aadhar">Aadhaar :</label>
                <input type="text" name="aadhar" id="aadhar1" data-type="adhaarnumber1" placeholder="Aadhaar Number" maxlength="14" value="<?php echo $row['aadhar'] ?>" aria-describedby="created_on" readonly />
              </div>

              <div class="input_box">
                <label for="address">Address :</label>
                <input type="text" name="address" id="address1" value="<?php echo $row['address'] ?>" aria-describedby="created_on" readonly />
              </div>

              <div class="input_box">
                <label for="incharge">Person Incharge :</label>
                <input type="text" name="person_incharge" id="person_incharge1" value="<?php echo $row['person_incharge'] ?>" aria-describedby="created_on" readonly />
              </div>

              <div class="input_box">
                <label for="person name">Person Name :</label>
                <input type="text" name="person_name" value="<?php echo $row['person_name'] ?>" id="person_name1" placeholder="Name" aria-describedby="created_on" readonly>
              </div>

              <div class="input_box">
                <label for="contact">Contact No:</label>
                <input type="tel" name="person_to_be_contact" id="person_to_be_contact1" minlength="10" maxlength="10" value="<?php echo $row['person_to_be_contact'] ?>" aria-describedby="created_on" readonly />
              </div>



              <div class="reg_btn" id="update_btn" >
                <input type="submit" name="edit" id="UPdatebtn" value="Update" onclick="submituser()" />

              </div>
          <?php
          }
        }
          ?>
        
            </div>

      </form>
      <div class="reg_btn">
            <button id="edit_client_form" class="edit__btn">Edit</button>
          </div>
    </div>
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


<!-- Pan Validation -->
<script>
  function ValidatePAN(pancard1) {


    if (pancard1.value != "") {
      ObjVal = pancard1.value;
      ObjValLength = pancard1.value.length;
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
        alert(pan + " - Pan No. detected - OK");
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

    $('#clientname').keydown(function(e) {

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

    $('#tradename').keydown(function(e) {

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
    var Obj = document.getElementById("gst1");
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
    var Obj = document.getElementById("tan1");
    if (Obj.value != "") {
      ObjVal = Obj.value;
      var expr = /(?:(?=(^[a-zA-Z]{5}\d{4}[a-zA-Z]{1}$))|(?=(^[a-zA-Z]{4}[0-9]{5}[a-zA-Z]{1}?$)))/;
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

    $('#person_incharge1').keydown(function(e) {

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
  document.getElementById("edit_client_form").addEventListener('click', () => {
    document.getElementById("UPdatebtn").style.display = "block";
    document.getElementById("edit_client_form").style.display = "none";
    document.getElementById("clientname").removeAttribute('readonly');
    document.getElementById("tradename").removeAttribute('readonly');
    document.getElementById("Type_of_Clients").removeAttribute('readonly');
    document.getElementById("type_of_clients1").removeAttribute('readonly');
    document.getElementById("pancard1").removeAttribute('readonly');
    document.getElementById("gst1").removeAttribute('readonly');
    document.getElementById("tan1").removeAttribute('readonly');
    document.getElementById("aadhar1").removeAttribute('readonly');
    document.getElementById("address1").removeAttribute('readonly');
    document.getElementById("person_incharge1").removeAttribute('readonly');
    document.getElementById("person_name1").removeAttribute('readonly');
    document.getElementById("person_to_be_contact1").removeAttribute('readonly');

    document.getElementById("Type_of_Clients").style.display = "none";
    document.getElementById("type_of_clients1").style.display = "block";
  })
  document.getElementById("UPdatebtn").addEventListener('click', () => {
    alert("Data Updated successfully");
  })
</script>

<!-- Validation for name -->

<script>
  $(function() {

    $('#person_name1').keydown(function(e) {

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