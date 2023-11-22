<?php
include ('admin/db_connect.php'); session_start();
?>

<style>
	#uni_modal .modal-footer{
		display: none
	}

.activeClass{
   	background: #F00; 
	color: #FFF;
  }
  
 .activeClass1{
   	background: #c8f2c7; 
	color: #000;
  }
  .panel {display: none; display: block;}

</style>
<div class="container-fluid">
	<div class="col-lg-12">
		<div id="msg"></div>
		<form action="" id="manage-appointment">
			
			<input type="hidden" name="doctor_id" value="<?php echo $_GET['id'] ?>">
			<input type="hidden" name="patient_id" value="<?php echo  isset($_SESSION['login_id']) ? $_SESSION['login_id'] : '' ?>">
			<div class="form-group">
				<label for="" class="control-label">Date</label>
				<input type="text" id="datepicker" value="" name="date" class="form-control" autocomplete="off" required>
				<p><small>*<b>Note:</b> If the date is shaded with <font color="red">RED</font> means theres in no available slots.</small></p>
			</div>

			<!--div class="form-group">
				<label for="" class="control-label">Time</label>
				<input type="time" value="" name="time" class="form-control" required>
			</div-->
			<div class="form-group" id="Monday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Monday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			<div class="form-group" id="Tuesday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Tuesday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			<div class="form-group" id="Wednesday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Wednesday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			<div class="form-group" id="Thursday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Thursday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			<div class="form-group" id="Friday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Friday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			<div class="form-group" id="Saturday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Saturday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			<div class="form-group" id="Sunday" style="display: none;">
			<label for="" class="control-label">Time</label></br>
			<?php 
				$did = $_GET['id'];
				$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' AND day = 'Sunday' order by id asc");
				while($row_sched=$doc_sched->fetch_assoc()):
				
				if($row_sched['time_from'] != '12:00:00' && $row_sched['time_to'] != '13:00:00'):
			?>
				
				&nbsp;&nbsp;<input type="radio" id="time" name="time[]" value="<?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?>">
				<label for="time"><?php echo date("h:i A",strtotime($row_sched['time_from'])).' - '.date("h:i A",strtotime($row_sched['time_to'])) ?></label><br>						 
			<?php 
				endif;
				endwhile;
			?> 
			</div>
			
			
			
			
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm">Request</button>
				<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" id="">Close</button>
				
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

 $did = $_GET['id'];

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

 $did = $_GET['id'];

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

		if($.inArray(formattedDate, active_dates) != -1){
			
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
			url:'admin/ajax.php?action=set_appointment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp==false){
					alert_toast("ProMD Polyclinic is fully booked");
					end_load();
					$('.modal').modal("hide");
				}else{
					alert_toast("Request submitted successfully");
					end_load();
					$('.modal').modal("hide");
				}
			}
		})
	})
</script>

