<?php
session_start();
include ('db_connect.php');

	$qry = $conn->query("SELECT 
							appointment_list.id, 
							appointment_list.doctor_id, 
							appointment_list.patient_id, 
							appointment_list.a_date, 
							appointment_list.a_time, 
							appointment_list.status, 
							users.name as u_name, 
							doctors_list.name as d_name
								FROM appointment_list, users, doctors_list where appointment_list.patient_id = users.id AND appointment_list.doctor_id = doctors_list.id AND appointment_list.id =".$_GET['id']);
	$row = $qry->fetch_array();
	
	$doctor_id = $row['doctor_id'];
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
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
			<input type="hidden" name="doctor_id" value="<?php echo isset($row['doctor_id']) ? $row['doctor_id'] : ''; ?>">
			<input type="hidden" name="patient_id" value="<?php echo isset($row['patient_id']) ? $row['patient_id'] : ''; ?>">
			
			<div class="form-group">
				<label for="" class="control-label">Doctor</label>
				<input type="text"  name="doctor_name" class="form-control" disabled style="background:white" value="<?php echo "DR. ".$row['d_name']." " ?>" required>
			</div>
			
			<div class="form-group">
				<label for="" class="control-label">Patient</label>
				<input type="text"  name="patient_name" class="form-control" disabled style="background:white" value="<?php echo $row['u_name'] ?>" required>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Date</label>
				<input type="text" id="datepicker"  name="date" class="form-control" value="<?php echo isset($row['a_date']) ? date("d-F-Y",strtotime($row['a_date'])) : '' ?>" required>
				
			</div>

			<!-- <div class="form-group" id="Monday" style="display: <?php //echo date("l", strtotime($row['a_date'])) = 'Monday' ? "block": "none";  ?>"> -->
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did =   $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Monday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			<!-- </div>
			 -->
			<!-- <div class="form-group" id="Tuesday" style="display: <?php //echo date("l", strtotime($row['a_date'])) = 'Tuesday' ? "block": "none";  ?>">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did =   $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Tuesday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			 -->
			<!-- <div class="form-group" id="Wednesday" style="display: <?php ////echo date("l", strtotime($row['a_date'])) = 'Wednesday' ? "block": "none";  ?>">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Wednesday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div> -->
			
			<!-- <div class="form-group" id="Thursday" style="display: <?php //echo date("l", strtotime($row['a_date'])) = 'Thursday' ? "block": "none";  ?>">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did =   $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Thursday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div> -->
			
			<!-- <div class="form-group" id="Friday" style="display: <?php //echo //date("l", strtotime($row['a_date'])) = 'Friday' ? "block": "none";  ?>">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did =   $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Friday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div> -->
			
			<!-- <div class="form-group" id="Saturday"  style="display: <?php //echo date("l", strtotime($row['a_date'])) = 'Saturday' ? "block": "none";  ?>">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did =   $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				// if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				// endif;
				endwhile;
			?> 
			</div> -->
			
			<!-- <div class="form-group" id="Sunday" style="display: <?php //echo date("l", strtotime($row['a_date'])) = 'Sunday' ? "block": "none";  ?>">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did =   $row['doctor_id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Sunday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				<input type="radio" id="time" name="time[]" <?php if((date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to']))) == $row['a_time']){ echo "checked"; } ?> value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div> -->
			
			<div class="form-group">
				<label for="" class="control-label">Status</label>
				<select class="browser-default custom-select" name="status">
					<option value="0" <?php echo isset($row['status']) && $row['status'] == 0 ? "selected" : '' ; ?>>Request</option>
					<option value="1" <?php echo isset($row['status']) && $row['status'] == 1 ? "selected" : '' ; ?>>Confirm</option>
					<option value="2" <?php echo isset($row['status']) && $row['status'] == 2 ? "selected" : '' ; ?>>Rescheduled</option>
					<option value="3" <?php echo isset($row['status']) && $row['status'] == 3 ? "selected" : '' ; ?>>Done</option>
				</select>
			</div>


			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4">Update</button>
				<button class="btn btn-secondary btn-sm col-md-4  " type="button" data-dismiss="modal" id="">Close</button>
			</div>
		</form>
	</div>
</div>

<script>
$('#datepicker').change(function(){
    var myID = $(this).val();
	
	var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	var d = new Date(myID);
	var dayName = days[d.getDay()];
	
	if(dayName == 'Monday'){
		document.getElementById('Monday').setAttribute('style','display:block;');
		document.getElementById('Tuesday').setAttribute('style','display:none;');
		document.getElementById('Wednesday').setAttribute('style','display:none;');
		document.getElementById('Thursday').setAttribute('style','display:none;');
		document.getElementById('Friday').setAttribute('style','display:none;');
		document.getElementById('Saturday').setAttribute('style','display:none;');
		document.getElementById('Sunday').setAttribute('style','display:none;');
	}else if(dayName == 'Tuesday'){
		document.getElementById('Monday').setAttribute('style','display:none;');
		document.getElementById('Tuesday').setAttribute('style','display:block;');
		document.getElementById('Wednesday').setAttribute('style','display:none;');
		document.getElementById('Thursday').setAttribute('style','display:none;');
		document.getElementById('Friday').setAttribute('style','display:none;');
		document.getElementById('Saturday').setAttribute('style','display:none;');
		document.getElementById('Sunday').setAttribute('style','display:none;');
	}else if(dayName == 'Wednesday'){
		document.getElementById('Monday').setAttribute('style','display:none;');
		document.getElementById('Tuesday').setAttribute('style','display:none;');
		document.getElementById('Wednesday').setAttribute('style','display:block;');
		document.getElementById('Thursday').setAttribute('style','display:none;');
		document.getElementById('Friday').setAttribute('style','display:none;');
		document.getElementById('Saturday').setAttribute('style','display:none;');
		document.getElementById('Sunday').setAttribute('style','display:none;');
	}else if(dayName == 'Thursday'){
		document.getElementById('Monday').setAttribute('style','display:none;');
		document.getElementById('Tuesday').setAttribute('style','display:none;');
		document.getElementById('Wednesday').setAttribute('style','display:none;');
		document.getElementById('Thursday').setAttribute('style','display:block;');
		document.getElementById('Friday').setAttribute('style','display:none;');
		document.getElementById('Saturday').setAttribute('style','display:none;');
		document.getElementById('Sunday').setAttribute('style','display:none;');
	}else if(dayName == 'Friday'){
		document.getElementById('Monday').setAttribute('style','display:none;');
		document.getElementById('Tuesday').setAttribute('style','display:none;');
		document.getElementById('Wednesday').setAttribute('style','display:none;');
		document.getElementById('Thursday').setAttribute('style','display:none;');
		document.getElementById('Friday').setAttribute('style','display:block;');
		document.getElementById('Saturday').setAttribute('style','display:none;');
		document.getElementById('Sunday').setAttribute('style','display:none;');
	}else if(dayName == 'Saturday'){
		document.getElementById('Monday').setAttribute('style','display:none;');
		document.getElementById('Tuesday').setAttribute('style','display:none;');
		document.getElementById('Wednesday').setAttribute('style','display:none;');
		document.getElementById('Thursday').setAttribute('style','display:none;');
		document.getElementById('Friday').setAttribute('style','display:none;');
		document.getElementById('Saturday').setAttribute('style','display:block;');
		document.getElementById('Sunday').setAttribute('style','display:none;');
	}else if(dayName == 'Sunday'){
		document.getElementById('Monday').setAttribute('style','display:none;');
		document.getElementById('Tuesday').setAttribute('style','display:none;');
		document.getElementById('Wednesday').setAttribute('style','display:none;');
		document.getElementById('Thursday').setAttribute('style','display:none;');
		document.getElementById('Friday').setAttribute('style','display:none;');
		document.getElementById('Saturday').setAttribute('style','display:none;');
		document.getElementById('Sunday').setAttribute('style','display:block;');
	}
	
});
	
var active_dates = [
<?php

 $did = $doctor_id;

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

 $did = $doctor_id;

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
	
	$("#manage-appointment").submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=set_appointment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				// resp = JSON.parse(resp)
				// if(resp.status == 1){
					alert_toast("Request submitted successfully");
					// end_load();
					$('.modal').modal("hide");
					setTimeout(function(){
						location.reload();
					},1000)
				// }else{
				// 	$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')
				// 	end_load();
				// }
			}
		})
	})
</script>

