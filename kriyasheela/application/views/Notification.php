<section>
  <div>


    <input type="text" id="myInput1" onkeyup="myFunction()" placeholder="Search for names.." title="" />
    <input type="reset" class="btn12" id="cancelbtn" value="X" alt="" />
  </div>
  <div class='container' id="fristhead">
    <table class="notificationtable" style="width:88%" id="notificationdata1">



      <tr class="header">

        <th> View Notification Details</th>
      </tr>
      <tr>

        <td>workorder er1223 targeted end date has been revised</td>
      </tr>
      <tr>

        <td> number er1223 targeted end date has been revised</td>
      </tr>
      <tr>

        <td>workorder number er1223 targeted end date has been revised</td>
      </tr>
      <tr>

        <td>workorder1 number er1223 targeted end date has been revised</td>
      </tr>
      <tr>

        <td>workorder number er12 targeted targeted end date has been revised</td>
      </tr>
      <tr>

        <td> workorder number er12 targeted end date has been revised</td>
      </tr>
      <tr>

        <td>workorder number er12 targeted end date has been revised</td>
      </tr>
      <tr>

        <td> number er123 targeted end date has been revised</td>
      </tr>
      <tr>
        <td>workorder number er1234 targeted end date has been revised</td>
      </tr>
      <tr>

        <td>workorder number er123456 targeted end date has been revised</td>
      </tr>
      <tr>

        <td>workorder number erA12 targeted end date has been revised</td>
      </tr>

    </table>

  </div>


  <div class="notifycalender">
    <input id="date" type="date">
   
    <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
  </div>


</section>

<!-- notification function -->

<script>
  document.getElementById("date").valueAsDate = new Date("2017-06-21");
</script>

<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("notificationdata1");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
    if (filter) {
      document.getElementById('cancelbtn').style.display = "block";
    }
  }

  document.getElementById('cancelbtn').addEventListener('click', function() {
    let input = document.getElementById("myInput1");
    input.value = "";
  })
</script>
