<?php include('db_connect.php');

	include 'db_connect.php';
	if($_SESSION['login_type'] == 4){
	$doctor_user= $conn->query("SELECT * FROM doctors_list WHERE name = '".$_SESSION['login_name']."' ");
	$row_user = $doctor_user->fetch_assoc();
	$did = $row_user['id'];
	}
	
	$doctor= $conn->query("SELECT * FROM doctors_list ");
	while($row = $doctor->fetch_assoc()){
		$doc_arr[$row['id']] = $row;
	}
	
	$patient= $conn->query("SELECT * FROM users where type = 3 ");
	while($row = $patient->fetch_assoc()){
		$p_arr[$row['id']] = $row;
	}

if(isset($_GET['did'])){
	$doctorid = $_GET['did'];
	
}else{
	$doctorid = null;

}


if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2){

if(!isset($doctorid)){ ?>
	
	<div class="container">
		
		<div class="col-lg-12">
			<div class="row">
				
				<!-- Table Panel -->
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Image</th>
										<th class="text-center">Info</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									$cats = $conn->query("SELECT * FROM doctors_list order by id asc");
									while($row=$cats->fetch_assoc()):
									?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>
										<td class="text-center">
											<img src="../assets/img/<?php echo $row['img_path'] ?>" alt="">
										</td>
										<td class="">
											 <p>Name: <b><?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?></b></p>
											 <p><small><i class='fa fa-address-card'></i>
											 <?php if($row['status'] == 0): ?>
												<span class="badge badge-success">Available</span>
											 <?php elseif($row['status'] == 1): ?>
											 <span class="badge badge-danger">Not Available</span>
											 <?php endif; ?>
											 </b></small></p>

										</td>
										<td class="text-center">
											<a href="index.php?page=appointments&did=<?php echo $row['id'] ?>"><button class="btn btn-sm btn-primary view_appointment" type="button">View Appoinments</button></a>
										</td>
									</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Table Panel -->
			</div>
		</div>	

	</div>

<?php } }

if(isset($doctorid)){ ?>

	<div class="container-fluid">
		
		<div class="col-lg-12">
			<div class="row">
				
				<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
				<div class="col-lg-12">
						<button class="btn btn-success float-right btn-sm" id="manage_schedule" data-id="<?php echo $doctorid; ?>"> <i class="fa fa-calendar"></i> Reschedule Multiple Appointment</button>
				</div></br></br>
				<?php endif ?>
				<!-- Table Panel -->
				<div class="col-md-12">
					<div class="card">
						
						<div class="card-body">
						<div style="width:100%; background:#5dde63; border-radius:3px;"><center><h3>Today's Appointment</h3></center></div>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Schedule</th>
										<th>Doctor</th>
										<th>Pateint</th>
										<th>Status</th>
										<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
										<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								
								<tbody>
								<?php 
								
								$date_now = date('Y-m-d');
								
								if($_SESSION['login_type'] == 4){
									$qry = $conn->query("SELECT * FROM appointment_list WHERE doctor_id = '".$did."' AND a_date LIKE '%".$date_now."%' order by id desc ");
								}else{
									$qry = $conn->query("SELECT * FROM appointment_list WHERE doctor_id = '".$doctorid."' AND a_date LIKE '%".$date_now."%' ORDER BY id DESC ");
								
								}
								while($row = $qry->fetch_assoc()):
								?>
									<tr>
										<td><?php echo date("l M d, Y",strtotime($row['a_date'])) ?></td>
										<td><?php echo "DR. ".$doc_arr[$row['doctor_id']]['name'] ?></td>
										<td><?php echo $p_arr[$row['patient_id']]['name'] ?></td>
										<td>
											<?php if($row['status'] == 0): ?>
												<span class="badge badge-danger">Pending Request</span>
											<?php endif ?>
											<?php if($row['status'] == 1): ?>
												<span class="badge badge-success">Confirmed</span>
											<?php endif ?>
											<?php if($row['status'] == 2): ?>
												<span class="badge badge-warning">Rescheduled</span>
											<?php endif ?>
											<?php if($row['status'] == 3): ?>
												<span class="badge badge-info">Done</span>
											<?php endif ?>
										</td>
										<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
										<td class="text-center">
											<button  class="btn btn-primary btn-sm update_app" type="button" data-id="<?php echo $row['id'] ?>">Update</button>
											<button  class="btn btn-danger btn-sm delete_app" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										</td>
										<?php endif; ?>
									</tr>
								<?php endwhile; ?>
								</tbody>
							</table>
						</div>
					</div>
					
					</br></br>
					<div class="card">
						<div class="card-body">
							<div style="width:100%; background:#5dde63; border-radius:3px;"><center><h3>All Appoinments</h3></center></div>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Schedule</th>
										<th>Doctor</th>
										<th>Pateint</th>
										<th>Status</th>
										<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
										<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								
								<tbody>
								<?php 
								if($_SESSION['login_type'] == 4){
									$qry = $conn->query("SELECT * FROM appointment_list WHERE doctor_id = '".$did."' order by id desc ");
								}else{
									$qry = $conn->query("SELECT * FROM appointment_list WHERE doctor_id = '".$doctorid."' order by id desc ");
								}
								while($row = $qry->fetch_assoc()):
								?>
									<tr>
										<td><?php echo date("l M d, Y",strtotime($row['a_date'])) ?></td>
										<td><?php echo "DR. ".$doc_arr[$row['doctor_id']]['name'] ?></td>
										<td><?php echo $p_arr[$row['patient_id']]['name'] ?></td>
										<td>
											<?php if($row['status'] == 0): ?>
												<span class="badge badge-danger">Pending Request</span>
											<?php endif ?>
											<?php if($row['status'] == 1): ?>
												<span class="badge badge-success">Confirmed</span>
											<?php endif ?>
											<?php if($row['status'] == 2): ?>
												<span class="badge badge-warning">Rescheduled</span>
											<?php endif ?>
											<?php if($row['status'] == 3): ?>
												<span class="badge badge-info">Done</span>
											<?php endif ?>
										</td>
										<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
										<td class="text-center">
											<button  class="btn btn-primary btn-sm update_app" type="button" data-id="<?php echo $row['id'] ?>">Update</button>
											<button  class="btn btn-danger btn-sm delete_app" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										</td>
										<?php endif; ?>
									</tr>
								<?php endwhile; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Table Panel -->
			</div>
		</div>	

	</div>
<?php
}
?>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	
	$('#manage_schedule').click(function(){
	uni_modal('Reschedule Multiple Appointment','set_edit_appointment.php?did='+$(this).attr('data-id'))
	})
	$('.update_app').click(function(){
		uni_modal("Edit Appointment","set_appointment.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$('.delete_app').click(function(){
		_conf("Are you sure to delete this appointment?","delete_app",[$(this).attr('data-id')])
	})
	function delete_app($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_appointment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	$('.select2').select2({
		placeholder:"Please Select Here",
		width:'100%'
	})
	function _reset(){
		$('[name="id"]').val('');
		$('#manage-doctor').get(0).reset();
	}
	$('table').dataTable()
	$('#manage-doctor').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_doctor',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					$('#msg').html('<div class="alert alert-danger">Email already exist.</div>')
					end_load()
				}
			}
		})
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('.edit-doctor').click(function(){
		start_load()
		var cat = $('#manage-doctor')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='name_pref']").val($(this).attr('data-name_pref'))
		cat.find("[name='email']").val($(this).attr('data-email'))
		cat.find("[name='clinic_address']").val($(this).attr('data-clinic_address'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("#cimg").attr("src","../assets/img/"+$(this).attr('data-img_path'))
		
		if($(this).attr('data-specialty_ids')!= ''){
			var ids = $(this).attr('data-specialty_ids')
			ids = ids.replace('[','')
			ids = ids.replace(']','')
			ids=ids.split(',')
			var nids = [];
			ids.map(function(e){
				nids.push(e)
			})
					$('[name="specialty_ids[]"]').val(nids)
		}else{
			$('[name="specialty_ids[]"]').val('')

		}
			$('[name="specialty_ids[]"]').trigger('change')
		// $('[name="specialty_ids[]"]').select2({
		// 	placeholder:"Please Select Here",
		// 	width:'100%'
		// })
		end_load()
	})

	$('.view_schedule').click(function(){
		uni_modal($(this).attr('data-name')+" - Schedule","view_doctor_schedule.php?id="+$(this).attr('data-id'))
	})
	$('.delete_doctor').click(function(){
		_conf("Are you sure to delete this doctor?","delete_doctor",[$(this).attr('data-id')])
	})
	
	function delete_doctor($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_doctor',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}	
		})
	}
</script>