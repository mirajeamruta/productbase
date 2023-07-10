<!-- Form style presnt in htdocs\kriyasheela-p2\kriyasheela\stylesheets\style.css -->

<div class='container userform'>
    <div id="section_userform" class="col-md-9 offset-md-1">
        <span class="span">Workorder Form</span>
        </legend><br>
        <form method="post" autocomplete="off" action="<?= base_url('Workorder/registerNow') ?>">
            <div class="row mb-3">
                <label for="type_of_work" class="col-sm-4">Type of Work :</label>
                <div class="col-sm-8">                    
                    <select placeholder="Type of Work" name="type_of_work" id="type_of_work"  class="classic"
                        aria-describedby="type_of_work" onchange="typeofwork();">
                        <option value="">Select</option>
                        <?php foreach ($typeofworkorder as $typeofworkorders) : ?>
                        <option value="<?= $typeofworkorders['type_of_work_id'];?>">
                            <?= $typeofworkorders['type_of_work']; ?></option>
                        <?php endforeach; ?>
                    </select>                      
            
                </div>
            </div>

            

            <div class="row mb-3">
                <label for="workorder_no" class="col-sm-4">Workorder No :</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Workorder No" name="workorder_no" class=" form-control"
                        id="workorder_no" aria-describedby="workorder_no" readonly >
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Created On :</label>
                <div class="col-sm-8">
                    <input type="date" placeholder="Created On" name="created_on" class="form-control" id="date_picker"
                        aria-describedby="created_on" readonly>
                        <input type="text" id="createdOn"  value="DD / MM / YYYY" readonly/>
                </div>
            </div>

            <div class="row mb-3">
                <label for="client_name" class="col-sm-4">Legal Name / Trade Name :</label>
                <div class="col-sm-6">
                <select name="client_name" id='slct1' class="classic" aria-describedby="client_name" >
                        <option value="">Select</option>
                        <?php foreach ($clientname as $clientnamerecord) : ?>
                        <option value="<?= $clientnamerecord['name']; ?>"><?= $clientnamerecord['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="row mb-3">
                <label for="partner_in_charge" class="col-sm-4">Partner in Charge :</label>
                <div class="col-sm-8">
                    <select placeholder="Partner_in_charge" name="partner_in_charge" id="partner_in_charge"
                        class="classic" aria-describedby="partner_in_charge">
                        <option value="">Select</option>
                        <option value="R.E. Balasubramanyam">R.E. Balasubramanyam</option>
                        <option value="A.V. Muralisharan">A.V. Muralisharan</option>
                        <option value="N.K.S. Bharath">N.K.S. Bharath</option>
                        <option value="Ashok S Navalgund">Ashok S Navalgund</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Start Date :</label>
                <div class="col-sm-8">

                    <input type="date" placeholder="Start Date" name="start_date"  id="date_picker1" size=9
                        class="form-control" aria-describedby="start_date">
                        <input type="text" id="startDateValue"  value="DD / MM / YYYY" readonly/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Targetted End Date :</label>
                <div class="col-sm-8">
                    <input type="date" placeholder="Targetted End Date" name="targetted_end_date"  id="date_picker2"
                        class="form-control" aria-describedby="targetted_end_date" size=9>
                        <input type="text" id="targettedDateValue"  value="DD / MM / YYYY" readonly/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Deadline :</label>
                <div class="col-sm-8">
                    <input type="date" placeholder="Deadline" id="date_picker3" name="deadline" class="form-control"
                        aria-describedby="deadline" data-date-format="DD MMMM YYYY"size=9>
                         <input type="text" id="deadlineDateValue"  value="DD / MM / YYYY" readonly/>
                </div>
            </div>

            <!-- <div class="row mb-3 details">
				<label for="assign_to" class="col-sm-4">Assign To::</label>
				<div class="col-sm-4">
					<select name="assign_to[]" class="custom-select">
						<option value="">Select </option>
						<?php foreach ($assign_to as $worksheetrecord) : ?>
							<option value="<?= $worksheetrecord['user_id']; ?>"><?= $worksheetrecord['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-4">

					<input type="button" class="btn btn-primary add" value="+"> Add More
				</div>
			</div> -->
           
          
    
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Assign To :</label>
                <div class="col-sm-5" style="max-width: 37.666667%;">
                    <div id="testingDiv1" class="mb-3 clonedInput">
                        <select class="form-control classic" id="select"
                            aria-describedby="assign_to[]">
                            <option value="">Select</option>
                            <?php foreach ($assign_to2 as $worksheetrecord) : ?>
                            <option value="<?= $worksheetrecord['user_id']; ?>"><?= $worksheetrecord['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
         
                <div class="col-sm-2">
                    <button class=' btn btn-success btnClick' id="btnAdd" >
                        Add
                    </button>
                    <i class='bx bxs-plus-square btnClick' style='color:#28a745'></i>
                </div>

                <!-- Assigned Person Delete Button -->
                <div class="col-sm-1">
                    <button id="btnDel" class='btn btn-danger assignDeleteBtn'>
                        Delete
                    </button>
                </div>

               <!-- Assigned Person Name Display here(New Feature Added on 26-04-23) -->
               <ul id='assignedName'>
        

               </ul>
            </div>

       <!-- Testing start -->             
           <select id="selected_Assigned_Name"  name="assign_to[]">
                  <!-- <option>select</option> -->
            </select>
       <!-- Testing End -->

            <div style="display: flex;">

            </div>
            <div class="row mb-3">
                <label for="remarks" class="col-sm-4" id="required-field1" >Remarks :</label>
                <div class="col-sm-8">
                    <textarea type="text" placeholder="Remarks" class="form-control" name="remarks" id="remarks"
                        col="50" row="50" required></textarea>
                </div>
            </div>
            <!-- <div class="row">
			<div class="col-10 save">
				 <input type="submit" value="Submit" onclick="SaveStudentDetails()">
			</div>
		</div> -->
            <!-- <div class="text-center">
                <button type="submit" class="btn btn-primary">Sumbit</button>
            </div> -->
            <!-- CB Megallaa -->
            <div class="row mb-3">
                <div class="col-10 onlineform textcolor">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" />
                    <?php
                    echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                    ?>
                </div>
            </div>
            <?php
            if ($this->session->flashdata('success')) {    ?>
            <p class="text-success text-center" style="margin-top: 10px;"> <?= $this->session->flashdata('success') ?>
            </p>
            <?php } ?>
        </form>
        </section>
        <!-- Begin Footer -->
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
        // $(document).ready(function(){

        //     //alert('yes');

        //     var startDate;
        //     var endDate;
        //     var DeadLine;
        //     $("#date_picker1").datepicker({
        //         dateFormat: 'dd-mm-yy'
        //     })
          

        //     $("#date_picker2").datepicker({
        //         dateFormat: 'dd-mm-yy'
        //     });
        //     $("#date_picker3").datepicker({
        //         dateFormat: 'dd-mm-yy'
        //     });

//     $('#date_picker1').change(function() {
//     var startDate = $(this).datepicker('getDate');
//     if (startDate) {
//         $("#date_picker2").datepicker("option", "minDate", startDate);
//         $("#date_picker2").datepicker("refresh");
//     }
// });

// $("#date_picker2").datepicker({
//     beforeShowDay: function(date) {
//         var startDate = $("#date_picker1").datepicker('getDate');
//         return [date >= startDate];
//     }
// });


//             $('#date_picker2').change(function() {
//                 endDate = $(this).datepicker('getDate');
//                 $("#date_picker1").datepicker("option", "maxDate", endDate);
//             })
//             $('#date_picker3').change(function() {
//                 endDate2 = $(this).datepicker('getDate');
//                 $("#date_picker2").datepicker("option", "maxDate", endDate2);
//             })

//         })
        </script>


        <script>   
            
        // document.getElementById('select').addEventListener('change',()=>{
        //     alert('Hi from select')
        // })
        $(document).ready(function() {
            var selectedData=[];
           
            $('.btnClick').click(function(e) { // add more btn start
                e.preventDefault();                
                //Creating new li Element
                let li=document.createElement('li');
                //Getting data from dropdown
                let dropDown=document.getElementById('select');
                let dropDownData=dropDown.options[dropDown.selectedIndex].text;
                // Adding id to li
                var id_Number=0;
                if(!li.id)
                 { 
                    li.id=id_Number;
                    id_Number++;               
                 }
               //creating textnode
               let textNode=document.createTextNode(dropDownData);           
               li.appendChild(textNode);
               if(dropDownData!=' '&&dropDownData!='Select'){
                  // Adding selected data to list            
                  document.getElementById('assignedName').appendChild(li);
                  selectedData.push(dropDown.options[dropDown.selectedIndex].value);
                   // Removing Value from dropdown
                  dropDown.options[dropDown.selectedIndex].style.display="none";
                  // Adding value to selectedData array
                  li.value=dropDown.options[dropDown.selectedIndex].value;
                  // After value is pushed to array we making it empty
                  dropDown.value='';
                  // Deleting added value from drop down
                //   if(selectedData.length()>1){
                //     alert("One data is there")
                //   }
               if(selectedData.length>0){
               document.getElementById('btnAdd').innerHTML="Add More"
               }else{    
               document.getElementById('btnAdd').innerHTML="Add"
 
               }
                 
               }else{
                  alert('Please assign to someone');
               }
               // Creating span and cross icon to assign each item of li so that we can delete using that icon
               let span=document.createElement('span');
               let closeIcon=document.createTextNode("\u00D7");
               span.className='assign_Close';
               span.appendChild(closeIcon);
               li.appendChild(span);
               //Accessing all the item with className 'assign_Close'
               var closeItem=document.getElementsByClassName('assign_Close');
               var i;
               for(i=0; i<closeItem.length; i++)
                {                
                   closeItem[i].onclick=function(){
                   let div=this.parentElement;                 
                   let id_To_Delete=div.id;

                  
                   //Getting index value of deleted item
                   let deleted_Item_Index=selectedData.indexOf(div.value.toString());
                   console.log('Index is: '+ deleted_Item_Index);
                   selectedData.splice(deleted_Item_Index,1);
                   //add more btn text changes when no data is selected
                    if(selectedData.length<1){
                      document.getElementById('btnAdd').innerHTML="Add"               
                   }    
                 
                   //Calling assignFun function here - we will pass array after delete item
                   assginFun(selectedData);
                   // removing item from selectedData array
                   div.remove();  
                    //Adding removed item back to drop down list
                   let dropDown=document.getElementById('select');
                   dropDown.options[dropDown.options.value=`${div.value}`].style.display="block";
                  
                }               
                }
               //We are calling assignFun here if no Item is deleted from array

               assginFun(selectedData) ;       
               // Assign to function
               function assginFun(assignedNames)
                {
                  let selected_Assigned_Name=document.getElementById('selected_Assigned_Name');
                  let newOption=new Option(assignedNames);
                  selected_Assigned_Name.add(newOption,undefined);       
                  for(let i=0; i<selected_Assigned_Name.options.length;i++)
                  {
                     selected_Assigned_Name.options[i].selected=true;
                  } 
                }        
            })  // add more btn end       
        })
       
         /*  Orginal Code-Previous Feature(dont delete this)
                var num = $('.clonedInput').length,
                    newNum = new Number(num + 1),
                    newElem = $('#testingDiv' + num)
                    .clone()
                    .attr('id', 'testingDiv' + newNum)
                    .fadeIn('normal')
                // alert(num)
                // Store the block in a variable
                var $block = $('.clonedInput:last')
                // Grab the selected value
                var theValue = $block.find(':selected').val()
                // Clone the block
                var clone = $block.clone()
                // Find the selected value in the clone, and remove
                if (theValue != 'PleaseSelectOne')
                    clone.find('option[value=' + theValue + ']').remove()
                // Grab the select in the clone
                var $select = clone.find('select')
                var newId = 'testingDiv' + newNum
                // console.log(newId)
                // Update its ID by concatenating theValue to the current ID
                $select.parent().attr('id', newId)
                $('#testingDiv' + num).after(clone)
                $('#btnDel').attr('disabled', false)
                if (newNum == 5)
                    $('#btnAdd')
                    .attr('disabled', true)
                    .prop('value', "You've reached the limit")
            })
            $('#btnDel').click(function(e) {
                e.preventDefault()
                var num = $('.clonedInput').length
                $('#testingDiv' + num).slideUp('slow', function() {
                    $(this).remove()
                    if (num - 1 === 1) $('#btnDel').attr('disabled', true)
                    $('#btnAdd').attr('disabled', false).prop('value', 'ADD MORE')
                })
                // return false
                $('#btnAdd').attr('disabled', false)
            })
            $('#btnDel').attr('disabled', true)
        })
       
        */
   
       </script>




       <script>
        var today=new Date();
        var dd= today.getDate();
        var mm = today.getMonth()+1;
        var yyyy=today.getFullYear();

        if(dd<10)
        {
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }
        today=yyyy+'-'+mm+'-'+dd
     
         let createDate=document.getElementById('date_picker').value=today
         document.getElementById('createdOn').value=formatDate(createDate)
         

          document.getElementById('date_picker1').setAttribute("min",today) //start date
          document.getElementById('date_picker2').setAttribute("min",today) // targetted date
          document.getElementById('date_picker3').setAttribute("min",today) // deadline date
          

          let startDateValue=''
         document.getElementById('date_picker1').addEventListener('change',()=>{
            startDateValue= document.getElementById('date_picker1').value
        
            document.getElementById('date_picker3').setAttribute("min",startDateValue) // Deadline date
        document.getElementById('date_picker2').setAttribute("min",startDateValue)
         })

          
      
            
          // Targetted Date
          document.getElementById('date_picker2').addEventListener('change',()=>{
            
          let targetted_date=document.getElementById('date_picker2').value;
   
          document.getElementById('date_picker3').setAttribute('min',targetted_date)
        })

         //Date Foramtting
         //Function to add zero for single number
        function addZero(num)
         {
           return num.toString().padStart(2,'0')
         }
         function formatDate(currentDate){
              // Now we are formatting in DD/MM/YYYY
            let day=addZero(new Date(currentDate).getDate())
            let month=addZero(new Date(currentDate).getMonth()+1)
            let year=new Date(currentDate).getFullYear()
            let todayDate=day+' / '+month+' / '+year;
            return todayDate;   
         }
        //  Start Date
       document.getElementById('date_picker1').addEventListener('change',function(){            
            // Getting selected Date
            let currentDate= document.getElementById('date_picker1').value;
            // Adding value to new input filed because default format is bit hard to change
            document.getElementById('startDateValue').value=formatDate(currentDate);
           
             currentDate.value=formatDate(currentDate);
         })
         
         //Targetted Date
          document.getElementById('date_picker2').addEventListener('change',function()
         {            
            // Getting selected Date
            let currentDate= document.getElementById('date_picker2').value;
            // Adding value to new input filed because default format is bit hard to change
            document.getElementById('targettedDateValue').value=formatDate(currentDate);
           currentDate.value=formatDate(currentDate);
         })
         //Deadline Date
          document.getElementById('date_picker3').addEventListener('change',function()
         {            
            // Getting selected Date
            let currentDate= document.getElementById('date_picker3').value;
            // Adding value to new input filed because default format is bit hard to change
            document.getElementById('deadlineDateValue').value=formatDate(currentDate)
            currentDate.value=formatDate(currentDate);
            document.getElementById('date_picker2').setAttribute('max',currentDate)
         })

       document.getElementById('date_picker1').addEventListener('change',function(){
       
         let start_date=document.getElementById('date_picker1').value;
         let targetted_date=document.getElementById('date_picker2').value;
         
         let deadline_date=document.getElementById('date_picker3').value;
    // alert(targetted_date)
         if(!targetted_date==''&&targetted_date<start_date || !deadline_date==''&& deadline_date<start_date ){

            alert("Targetted or Deadline Date cannot be Smaller then Start Date")
            //location.reload()
    
         }   

       })
       document.getElementById('date_picker2').addEventListener('change',function(){
         let targetted_date=document.getElementById('date_picker2').value;
         
         let deadline_date=document.getElementById('date_picker3').value;
         if(!targetted_date==''&&!deadline_date==''&&targetted_date>deadline_date){
            alert('Targetted Date cannot be grater then deadline')
             //location.reload()
            deadline_date=""
         }
       })
       </script>
