<!-- <h3>Notification Page</h3> -->
<script>

   var myData="Hello from View";
 $.ajax({
                url: "<?php echo base_url('Notification_Controller/notification') ?>",
                type: 'post',
                data: {
                    'myData': myData
                },
                
                success: function(json) {
                  alert('Data Send SuccessFully');
                   
                },
                error: function() {
                    alert('Not Found ');
                    
                }
        });
</script>