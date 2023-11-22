<?php
include ('db_connect.php');
$doctor= $conn->query("SELECT * FROM doctors_list WHERE id ='".$_GET['did']."' ");
$row = $doctor->fetch_assoc();
?>

<style>
	#uni_modal .modal-footer{
		display: none
	}

.datepicker-dropdown {
  padding: 1px !important;
  margin-top:50px !important;
 
}

.activeClass{
   	background: #F00; 
	color: #FFF;
  }
  
  .activeClass1{
   	background: #c8f2c7; 
	color: #000;
  }
  
</style>
<div class="container-fluid">
	<div class="col-lg-12">
		<div id="msg"></div>
		<form action="" id="manage-appointment">
			<input type="hidden" id="doctorid" value="<?php echo $_GET['did']; ?>" name="doctor_id" class="form-control" autocomplete="off" required>
			<div class="form-group">
				<h4>For Dr. <?php echo $row['name'].", ".$row['name_pref'] ?></h4>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Date From</label>
				<input type="text" id="datepicker" value="" name="datefrom" class="form-control" autocomplete="off" required>
				<p><small>*<b>Note:</b> If the date is shaded with <font color="red">RED</font> means theres in no available slots.</small></p>
			</div>
			
			<div class="form-group">
				<label for="" class="control-label">Date To</label>
				<input type="text" id="datepicker_2" value="" name="dateto" class="form-control" autocomplete="off" required>
				<p><small>*<b>Note:</b> If the date is shaded with <font color="red">RED</font> means theres in no available slots.</small></p>
			</div>

			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm">Re-schedule</button>
				<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" id="">Close</button>
				
			</div>
		</form>
	</div>
</div>


<script>
	
var active_dates = [
<?php

 $did = $_GET['did'];

$sql = mysqli_query($conn, "SELECT count(*) as c, a_date, doctor_id FROM appointment_list WHERE doctor_id =  '$did' GROUP BY a_date");

while($row = mysqli_fetch_array($sql)){
	
	
	if($row['c'] >= 2){
		 echo $temp = "'".date('j/n/Y', strtotime($row['a_date']))."', ";
	}
}


?>

];

var weekday = [
<?php

 $did = $_GET['did'];

$sql_day = mysqli_query($conn, "SELECT day FROM doctors_schedule WHERE doctor_id =  '$did' ");

while($row_day = mysqli_fetch_array($sql_day )){

		 echo $day = "'".$row_day['day']."', ";

} ?>
];



$("#datepicker").datepicker({
     format: "dd-MM-yyyy",
     autoclose: true,
     todayHighlight: false,
	 startDate: '-0m',
     beforeShowDay: function(date){
         var d = date;
         var curr_date = d.getDate();
         var curr_month = d.getMonth() + 1; //Months are zero based
         var curr_year = d.getFullYear();
         var formattedDate = curr_date + "/" + curr_month + "/" + curr_year;
		 var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		 var dayname = days[d.getDay()];

		
           if ($.inArray(formattedDate, active_dates) != -1){
               return {
                  classes: 'activeClass'
               };
           }
		   
		   if($.inArray(dayname, weekday) != -1){
				
				return {
					  classes: 'activeClass1'
				   };
			}
		
          return;
      }
  });
  
  $("#datepicker_2").datepicker({
     format: "dd-MM-yyyy",
     autoclose: true,
     todayHighlight: false,
	startDate: '-0m',
     beforeShowDay: function(date){
         var d = date;
         var curr_date = d.getDate();
         var curr_month = d.getMonth() + 1; //Months are zero based
         var curr_year = d.getFullYear();
         var formattedDate = curr_date + "/" + curr_month + "/" + curr_year;
		 var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		 var dayname = days[d.getDay()];

		
           if ($.inArray(formattedDate, active_dates) != -1){
               return {
                  classes: 'activeClass'
               };
           }
		   
		   if($.inArray(dayname, weekday) != -1){
				
				return {
					  classes: 'activeClass1'
				   };
			}
          return;
      }
  });
  
  $("#manage-appointment").submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=edit_multiple_appointment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				resp = JSON.parse(resp)
				if(resp.status == 1){
					alert_toast("Request submitted successfully");
					location.reload()
					$('.modal').modal("hide");
				}else{
					$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')
					end_load();
				}
			}
		})
	})
</script>
