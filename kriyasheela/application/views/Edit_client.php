<div class='container clientform'>
  <div id="section_clientform" class="clientfrom___editingdata" style="background: #eaeae8a9;margin-left: -19px !important; ">
    <span style="position: relative;top: 20px;left:-69px;font-size: 20px;"> VIEW CLIENT DETAIL</span>
    <form class="form col-md-8 offset-md-1"  id="editclients__data" method="post" autocomplete="off" action="<?= base_url('Client/EditClient') ?>" style="margin-top: 45px;">
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
            <div class="col-sm-9 clientname__name">
              <input type="text" name="clientname" class="form-control edit_clientname" id="clientname" value="<?php echo $row['name'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3">Trade Name :</label>
            <div class="col-sm-9">
              <input type="text" name="tradename" class="form-control trade_name" id="tradename" value="<?php echo $row['Trade_Name'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>

          <div class="row mb-3" id="Entity" style="">
            <label for="demo-date" class="col-sm-3">Type of Clients :</label>
            <div class="col-sm-9">
              <input type="text" name="Type_of_Clients" class="form-control type_client" id="Type_of_Clients" style="" value="<?php echo $row['Type_of_Clients'] ?>" aria-describedby="created_on" readonly />
              <select type="text" name="Type_of_Clients" id="type_of_clients1" class="form-control  clientform___Typeofclients" onclick="myfun()" value="<?php echo $row['Type_of_Clients'] ?>" aria-describedby="created_on" style=" display: none;" readonly>
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
                  <option value="HUF" selected >HUF</option>
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
          </div>
          <div class="row mb-3" style="">
            <label for="demo-date" class="col-sm-3 ">Pan :</label>
            <div class="col-sm-9">

              <input type="text" name="pancard" class="form-control clientForm__pan" id="pancard1" MaxLength="10" placeholder="Pan Number" style="text-transform: uppercase;" value="<?php echo $row['PAN'] ?>" aria-describedby="created_on" readonly onblur="ValidatePAN(this);">

            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="demo-date" class="col-sm-3 clientForm__label_gst">GST :</label>
            <div class="col-sm-9">
              <input type="text" name="gst" class="form-control clientForm__gst " id="gst1" MaxLength="15" style="text-transform: uppercase;" onblur="Validamber(this);" value="<?php echo $row['GST'] ?>" aria-describedby="created_on" readonly />

            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="demo-date" class="col-sm-3 clientForm__label_tan">TAN :</label>
            <div class="col-sm-9">
              <input type="text" name="tan" class="form-control clientForm__tan" id="tan1" MaxLength="10teGSTNu" style="text-transform: uppercase;" onclick="ValidateTANNumber()" value="<?php echo $row['tan'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="demo-date" class="col-sm-3 clientForm__label_aadhar">Aadhaar :</label>
            <div class="col-sm-9">
              <input type="text" name="aadhar" class="form-control clientForm__aadhar" id="aadhar1" data-type="adhaarnumber1" placeholder="Aadhaar Number" maxlength="14" value="<?php echo $row['aadhar'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="demo-date" class="col-sm-3 clientForm__label_adress ">Address :</label>
            <div class="col-sm-9">
              <input type="text" name="address" class="form-control clientForm__address" id="address1" value="<?php echo $row['address'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="demo-date" class="col-sm-3 clientForm__label_personincharge">Person Incharge :</label>
            <div class="col-sm-9">
              <input type="text" name="person_incharge" class="form-control clientForm__personIncharge " id="person_incharge1" value="<?php echo $row['person_incharge'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>

          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="inputPassword3" class="col-sm-3 clientLabel__personname">Person Name :</label>
            <div class="col-sm-9 clientInput">
              <input type="text" name="person_name" class="form-control clientForm__personName" value="<?php echo $row['person_name'] ?>" id="person_name1" placeholder="Name" aria-describedby="created_on" readonly>
            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <label for="demo-date" class="col-sm-3 clientForm__label_contactno">Contact No:</label>
            <div class="col-sm-9">
              <input type="tel" name="person_to_be_contact" class="form-control clientForm__personto_becontact" id="person_to_be_contact1" minlength="10" maxlength="10" value="<?php echo $row['person_to_be_contact'] ?>" aria-describedby="created_on" readonly />
            </div>
          </div>
          <div class="row mb-3" style=" margin-left: 96px;">
            <div class="col-sm-8 clientUpdate___Btn" id="btnsubmit">
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
    color: white;">Edit</button>

  </div>
</div>

<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
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