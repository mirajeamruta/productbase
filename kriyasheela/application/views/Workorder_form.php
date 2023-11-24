<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
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

    .main-container {
        display: flex;
        width: 100vw;
        position: relative;
        top: 4px;
        z-index: 1;
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

    .workorder-container {
        max-width: 1228px;
        width: 100%;
        background: #ffffff;
        border-radius: 0.5rem;
        box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
            0px 5px 12px -2px rgba(0, 0, 0, 0.1),
            0px 18px 36px -6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 10px;
    }

    .container .title {
        padding: 25px;
        background: #f6f8fa;
    }

    .container .title p {
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }

    .container .title p::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 3px;
        background: linear-gradient(to right, #F37A65, #D64141);
    }

    .user_details {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        padding: 19px;
    }

    .user_details .input_box {
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



    form .gender {
        padding: 0px 25px;
    }

    .gender .gender_title {
        font-size: 20px;
        font-weight: 500;
    }

    .gender .category {
        width: 80%;
        display: flex;
        justify-content: space-between;
        margin: 5px 0;
    }

    .gender .category label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .gender .category label .dot {
        height: 18px;
        width: 18px;
        background: #d9d9d9;
        border-radius: 50%;
        margin-right: 10px;
        border: 4px solid transparent;
        transition: all 0.3s ease;
    }

    #radio_1:checked~.category label .one,
    #radio_2:checked~.category label .two,
    #radio_3:checked~.category label .three {
        border-color: #d9d9d9;
        background: #D64141;
    }

    .gender input {
        display: none;
    }

    .reg_btn {
        padding: 25px;
        margin: 15px 0;
    }

    .reg_btn input {
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

    .logosec1 {
        position: absolute;
        margin-top: 10px;
    }

    #workorder__form {
        margin-top: -8px;
        margin-left: 6px;
    }

    .reg_btn input:hover {
        background: linear-gradient(to right, #D64141, #F37A65);
    }



    @media screen and (max-width: 584px) {

        .user_details {

            overflow-y: scroll;
        }

        .user_details::-webkit-scrollbar {
            width: 0;
        }

        .user_details .input_box {
            width: 100%;
        }

        .gender .category {
            width: 100%;
        }

        #workorder__form {
            margin-top: -3px !important;
            width: 363px !important;
            margin-left: -28px !important;
        }

        .menuicn1 {
            margin-top: -34px !important;
            margin-left: 326px !important;
            display: block !important;
        }
    }

    @media screen and (max-width: 419px) {
        .gender .category {
            flex-direction: column;
        }
    }
</style>
<body>
    <div class="main">
        <div class="workorder-container" id="workorder__form">
            <div class="title">
                <p style="font-size: 1.75rem; margin-left: 23px; margin-top: 17px; font-weight: 600;">Workorder Form</p>
            </div>

            <form method="post" autocomplete="off" class="mt-md" action="<?= base_url('Workorder/registerNow') ?>">
                <div class="user_details">
                    <div class="input_box">

                        <label for="fullName">Type of Work</label>

                        <select placeholder="Type of Work" name="type_of_work" id="type_of_work" class="custom-select" style="background-color: #f6f8fa; height: 45px" aria-describedby="type_of_work" onchange="typeofwork();">
                            <option value="">Select</option>
                            <?php foreach ($typeofworkorder as $typeofworkorders) : ?>
                                <option value="<?= $typeofworkorders['type_of_work_id']; ?>">
                                    <?= $typeofworkorders['type_of_work']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="input_box">
                        <label for="workorder_no">Workorder No :</label>
                        <input type="text" placeholder="Workorder No" name="workorder_no" id="workorder_no" aria-describedby="workorder_no" readonly>
                    </div>

                    <div class="input_box">
                        <label for="demo-date">Created On :</label>
                        <input type="date" placeholder="Created On" name="created_on" id="date_picker" aria-describedby="created_on" readonly>
                        <!-- <input type="text" id="createdOn"  value="DD / MM / YYYY" readonly/> -->
                    </div>

                    <div class="input_box">
                        <label for="client_name">Legal Name / Trade Name :</label>
                        <select name="client_name" id='slct1' class="custom-select" aria-describedby="client_name" style="background-color: #f6f8fa; height: 45px" style="background-color: #f6f8fa; height: 45px">
                            <option value="">Select</option>
                            <?php foreach ($clientname as $clientnamerecord) : ?>
                                <option value="<?= $clientnamerecord['name']; ?>"><?= $clientnamerecord['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="input_box">
                        <label for="partner_in_charge">Partner in Charge :</label>
                        <select placeholder="Partner_in_charge" name="partner_in_charge" id="partner_in_charge" style="background-color: #f6f8fa; height: 45px" class="custom-select" aria-describedby="partner_in_charge">
                            <option value="">Select</option>
                            <option value="R.E. Balasubramanyam">R.E. Balasubramanyam</option>
                            <option value="A.V. Muralisharan">A.V. Muralisharan</option>
                            <option value="N.K.S. Bharath">N.K.S. Bharath</option>
                            <option value="Ashok S Navalgund">Ashok S Navalgund</option>
                        </select>
                    </div>

                    <div class="input_box">
                        <label for="demo-date">Start Date :</label>

                        <input type="date" placeholder="Start Date" name="start_date" id="date_picker1" size=9 aria-describedby="start_date">
                        <!-- <input type="text" id="startDateValue"  value="DD / MM / YYYY" readonly/> -->
                    </div>

                    <div class="input_box">
                        <label for="demo-date">Targetted End Date :</label>
                        <input type="date" placeholder="Targetted End Date" name="targetted_end_date" id="date_picker2" aria-describedby="targetted_end_date" size=9>
                        <!-- <input type="text" id="targettedDateValue"  value="DD / MM / YYYY" readonly/> -->
                    </div>

                    <div class="input_box">
                        <label for="demo-date">Deadline :</label>
                        <input type="date" placeholder="Deadline" id="date_picker3" name="deadline" aria-describedby="deadline" data-date-format="DD MMMM YYYY" size=9>
                        <!-- <input type="text" id="deadlineDateValue"  value="DD / MM / YYYY" readonly/> -->
                    </div>

                    <div class="input_box">
                        <label for="demo-date">Assign To :</label>
                        <select placeholder="Assign_To" name="" id="select" aria-describedby="assign_to[]" style="background-color: #f6f8fa; height: 45px;    width: 420px;" class="custom-select">
                            <option value="">Select</option>
                            <?php foreach ($assign_to2 as $worksheetrecord) : ?>
                                <option value="<?= $worksheetrecord['user_id']; ?>"><?= $worksheetrecord['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="col-sm-2">
                        <button class=' btn btn-success btnClick' id="btnAdd" style="position: relative; top: 29px;     left: -266px; height: 45px;">
                            Add
                        </button>
                        <i class='bx bxs-plus-square btnClick' style='color:#28a745; position: relative; top: 44px; left: -315px;'></i>
                    </div>


                    <div class="col-sm-1">
                        <button id="btnDel" class='btn btn-danger assignDeleteBtn' style="top: 29px; left: -504px;position: relative;height: 44px;">
                            Delete
                        </button>
                    </div>
                    <ul id='assignedName'>
                    </ul>
                    <select id="selected_Assigned_Name" name="assign_to[]" hidden>

                    </select>


                    <div class="input_box">
                        <label for="remarks">Remarks :</label>
                        <textarea type="text" placeholder="Remarks" class="textarea" name="remarks" id="remarks" col="50" row="50" required>
               </textarea>

                    </div>

                </div>

                <div class="reg_btn">
                    <input type="submit" value="Submit" required>
                    <?php
                    echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                    ?>
                </div>
                <?php
                if ($this->session->flashdata('success')) {    ?>
                    <p class="text-success text-center" style="margin-top: 10px;"> <?= $this->session->flashdata('success') ?>
                    </p>
                <?php } ?>
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

<script>
    function typeofwork() {

        // alert(dummy);
        var CurrentYear = new Date().getFullYear().toString().substr(-2);
        //  alert(CurrentYear);
        var workorder_no = document.getElementById("workorder_no").value;
        //  alert(workorder_no);
        var type_Of_Work = document.getElementById("type_of_work").value;

        if (type_Of_Work == 1) {
            var dummy = "<?php echo $work_order_last_number_ea ?>";
        } else if (type_Of_Work == 2) {
            var dummy = "<?php echo $work_order_last_number_ia ?>";
        } else if (type_Of_Work == 3) {
            var dummy = "<?php echo $work_order_last_number_ta ?>";
        } else if (type_Of_Work == 4) {
            var dummy = "<?php echo $work_order_last_number_rf ?>";
        } else {
            console.log("not a type")
        }

        $.ajax({
            url: "<?php echo base_url('Workorder/ajaxworkorder') ?>",
            type: 'post',
            data: {
                typeofworkid: type_Of_Work,
            },
            success: function(json) {

                var jsondata = JSON.parse(json);

                document.getElementById("workorder_no").value = CurrentYear + '' + jsondata[0].prefix +
                    dummy;

            },
            error: function() {
                alert('Not Found ');
            }
        });
        //alert(date);
    }
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css" rel="stylesheet">
<!-- this is for select tag search -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />




<script>
    $(document).ready(function() {
        var selectedData = [];

        $('.btnClick').click(function(e) { // add more btn start
            e.preventDefault();
            //Creating new li Element
            let li = document.createElement('li');
            //Getting data from dropdown
            let dropDown = document.getElementById('select');
            let dropDownData = dropDown.options[dropDown.selectedIndex].text;
            // Adding id to li
            var id_Number = 0;
            if (!li.id) {
                li.id = id_Number;
                id_Number++;
            }
            //creating textnode
            let textNode = document.createTextNode(dropDownData);
            li.appendChild(textNode);
            if (dropDownData != ' ' && dropDownData != 'Select') {
                // Adding selected data to list            
                document.getElementById('assignedName').appendChild(li);
                selectedData.push(dropDown.options[dropDown.selectedIndex].value);
                // Removing Value from dropdown
                dropDown.options[dropDown.selectedIndex].style.display = "none";
                // Adding value to selectedData array
                li.value = dropDown.options[dropDown.selectedIndex].value;
                // After value is pushed to array we making it empty
                dropDown.value = '';
                // Deleting added value from drop down
                //   if(selectedData.length()>1){
                //     alert("One data is there")
                //   }
                if (selectedData.length > 0) {
                    document.getElementById('btnAdd').innerHTML = "Add More"
                } else {
                    document.getElementById('btnAdd').innerHTML = "Add"

                }

            } else {
                alert('Please assign to someone');
            }
            // Creating span and cross icon to assign each item of li so that we can delete using that icon
            let span = document.createElement('span');
            let closeIcon = document.createTextNode("\u00D7");
            span.className = 'assign_Close';
            span.appendChild(closeIcon);
            li.appendChild(span);
            //Accessing all the item with className 'assign_Close'
            var closeItem = document.getElementsByClassName('assign_Close');
            var i;
            for (i = 0; i < closeItem.length; i++) {
                closeItem[i].onclick = function() {
                    let div = this.parentElement;
                    let id_To_Delete = div.id;


                    //Getting index value of deleted item
                    let deleted_Item_Index = selectedData.indexOf(div.value.toString());
                    console.log('Index is: ' + deleted_Item_Index);
                    selectedData.splice(deleted_Item_Index, 1);
                    //add more btn text changes when no data is selected
                    if (selectedData.length < 1) {
                        document.getElementById('btnAdd').innerHTML = "Add"
                    }

                    //Calling assignFun function here - we will pass array after delete item
                    assginFun(selectedData);
                    // removing item from selectedData array
                    div.remove();
                    //Adding removed item back to drop down list
                    let dropDown = document.getElementById('select');
                    dropDown.options[dropDown.options.value = `${div.value}`].style.display = "block";

                }
            }
            //We are calling assignFun here if no Item is deleted from array

            assginFun(selectedData);
            // Assign to function
            function assginFun(assignedNames) {
                let selected_Assigned_Name = document.getElementById('selected_Assigned_Name');
                let newOption = new Option(assignedNames);
                selected_Assigned_Name.add(newOption, undefined);
                for (let i = 0; i < selected_Assigned_Name.options.length; i++) {
                    selected_Assigned_Name.options[i].selected = true;
                }
            }
        }) // add more btn end       
    })
</script>




<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd
    fetch('https://worldtimeapi.org/api/timezone/Etc/UTC')
        .then(response => response.json())
        .then(data => {
            const currentDateTime = new Date(data.utc_datetime);
            const currentDate = currentDateTime.toISOString().split('T')[0];
            document.getElementById('createdOn').value = formatDate(currentDate)
        })
    let createDate = document.getElementById('date_picker').value = today


    document.getElementById('date_picker1').setAttribute("min", today) //start date
    document.getElementById('date_picker2').setAttribute("min", today) // targetted date
    document.getElementById('date_picker3').setAttribute("min", today) // deadline date


    let startDateValue = ''
    document.getElementById('date_picker1').addEventListener('change', () => {
        startDateValue = document.getElementById('date_picker1').value

        document.getElementById('date_picker3').setAttribute("min", startDateValue) // Deadline date
        document.getElementById('date_picker2').setAttribute("min", startDateValue)
    })




    // Targetted Date
    document.getElementById('date_picker2').addEventListener('change', () => {

        let targetted_date = document.getElementById('date_picker2').value;

        document.getElementById('date_picker3').setAttribute('min', targetted_date)
    })

    //Date Foramtting
    //Function to add zero for single number
    function addZero(num) {
        return num.toString().padStart(2, '0')
    }

    function formatDate(currentDate) {
        // Now we are formatting in DD/MM/YYYY
        let day = addZero(new Date(currentDate).getDate())
        let month = addZero(new Date(currentDate).getMonth() + 1)
        let year = new Date(currentDate).getFullYear()
        let todayDate = day + ' / ' + month + ' / ' + year;
        return todayDate;
    }
    //  Start Date
    document.getElementById('date_picker1').addEventListener('change', function() {
        // Getting selected Date
        let currentDate = document.getElementById('date_picker1').value;
        // Adding value to new input filed because default format is bit hard to change
        document.getElementById('startDateValue').value = formatDate(currentDate);

        currentDate.value = formatDate(currentDate);
    })

    //Targetted Date
    document.getElementById('date_picker2').addEventListener('change', function() {
        // Getting selected Date
        let currentDate = document.getElementById('date_picker2').value;
        // Adding value to new input filed because default format is bit hard to change
        document.getElementById('targettedDateValue').value = formatDate(currentDate);
        currentDate.value = formatDate(currentDate);
    })
    //Deadline Date
    document.getElementById('date_picker3').addEventListener('change', function() {
        // Getting selected Date
        let currentDate = document.getElementById('date_picker3').value;
        // Adding value to new input filed because default format is bit hard to change
        document.getElementById('deadlineDateValue').value = formatDate(currentDate)
        currentDate.value = formatDate(currentDate);
        document.getElementById('date_picker2').setAttribute('max', currentDate)
    })

    document.getElementById('date_picker1').addEventListener('change', function() {

        let start_date = document.getElementById('date_picker1').value;
        let targetted_date = document.getElementById('date_picker2').value;

        let deadline_date = document.getElementById('date_picker3').value;
        // alert(targetted_date)
        if (!targetted_date == '' && targetted_date < start_date || !deadline_date == '' && deadline_date < start_date) {

            alert("Targetted or Deadline Date cannot be Smaller then Start Date")
            //location.reload()

        }

    })
    document.getElementById('date_picker2').addEventListener('change', function() {
        let targetted_date = document.getElementById('date_picker2').value;

        let deadline_date = document.getElementById('date_picker3').value;
        if (!targetted_date == '' && !deadline_date == '' && targetted_date > deadline_date) {
            alert('Targetted Date cannot be grater then deadline')
            //location.reload()
            deadline_date = ""
        }
    })


    window.addEventListener('beforeunload', function(event) {

        localStorage.removeItem('selectedte');
    });
</script>