<?php 
include('db_connect.php');
if(isset($_SESSION['login_id'])){
$today_date = date("Y-m-d");	

	if($_SESSION['login_type'] == 4):
	

	$app = $conn->query("SELECT COUNT(*) as c FROM appointment_list WHERE a_date = '$today_date' AND doctor_id =".$_SESSION['login_doctor_id']);
	$row_app  = $app ->fetch_array();

	$user = $conn->query("SELECT COUNT(patient_id) as c_u FROM appointment_list WHERE doctor_id =".$_SESSION['login_doctor_id']." group by patient_id ");
	$row = $user->fetch_array();
	
	elseif($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 1):
	
	$app = $conn->query("SELECT COUNT(*) as `c` FROM appointment_list WHERE a_date = '$today_date' ");
	$row_app  = $app ->fetch_array();

	$user = $conn->query("SELECT COUNT(*) as `c_u` FROM users WHERE type='3' ");
	$row = $user->fetch_array();

	$doctor = $conn->query("SELECT COUNT(*) as `dcount` FROM doctors_list WHERE status='0' ");
	$row_doc = $doctor->fetch_array();


	$med = $conn->query("SELECT COUNT(*) as `medcount` FROM medical_specialty");
	$row_med = $med->fetch_array();


	$med = $conn->query("SELECT COUNT(*) as `medcount` FROM medical_specialty");
	$row_med = $med->fetch_array();

	$event = $conn->query("SELECT COUNT(*) as `eventcount` FROM events");
	$row_event = $event->fetch_array();
	
	endif;
}
?>

<div class="container m-2">
	<h3>		
		<?php echo ($_SESSION['login_type'] == 4 ? "Dr. ".$_SESSION['login_name'] : $_SESSION['login_name'])." Dashboard"  ?>
	</h3>
	<hr>
	<div class="row mb-4">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
				<strong>No. of Doctors</strong>
				</div>
				<div class="card-body text-center">
					<h3><?php echo isset($row_doc['dcount']) ? $row_doc['dcount'] : 0; ?></h3>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<strong>No. of Today's Appointment</strong>
				</div>
				<div class="card-body text-center">
					<h2><?php echo isset($row_app['c']) ? $row_app['c'] : 0; ?></h2>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<strong>No. of Patients</strong>
				</div>
				<div class="card-body text-center">
					<h3><?php echo isset($row['c_u']) ? $row['c_u'] : 0; ?></h3>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<strong>No. of Events/Activity</strong>
				</div>
				<div class="card-body text-center">
					<h3><?php echo isset($row_event['eventcount']) ?$row_event['eventcount'] : 0; ?></h3>
				</div>
			</div>
		</div>


		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
				<strong>No. of Medical Specialties</strong>
				</div>
				<div class="card-body text-center">
					<h3><?php echo isset($row_med['medcount']) ? $row_med['medcount'] : 0; ?></h3>
				</div>
			</div>
		</div>
	</div>
</div>