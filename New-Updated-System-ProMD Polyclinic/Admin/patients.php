<?php
if(isset($_GET['did'])){
	$doctorid = $_GET['did'];
	
}else{
	$doctorid = null;

}

if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2){

if(!isset($doctorid)){ ?>
	
	<div class="container-fluid">
		
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
											<a href="index.php?page=patients&did=<?php echo $row['id'] ?>"><button class="btn btn-sm btn-primary view_appointment" type="button">View Patients</button></a>
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
			

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
			<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
									<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
									<th class="text-center">Username</th>
									<?php endif ?>
									<th class="text-center">Action</th>
									
								</tr>
							</thead>
							
							<tbody>
							<?php 
							if($_SESSION['login_type'] == 4):
							$did = $_SESSION['login_doctor_id'];
								$users = $conn->query("SELECT * FROM appointment_list, users WHERE users.id = appointment_list.patient_id AND appointment_list.doctor_id = '$did' AND users.type = 3 group by appointment_list.patient_id order by users.name asc");
							elseif($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2):
								$users = $conn->query("SELECT * FROM appointment_list, users WHERE users.id = appointment_list.patient_id AND appointment_list.doctor_id = '$doctorid' AND users.type = 3 group by appointment_list.patient_id order by users.name asc");
							else:
								$users = $conn->query("SELECT * FROM users WHERE type = 3 order by name asc");
							endif;
							$i = 1;
							while($row= $users->fetch_assoc()):
							?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $row['name'] ?></td>
									<?php if($_SESSION['login_type'] == 1 OR $_SESSION['login_type'] == 2): ?>
									<td><?php echo $row['username'] ?></td>
									<?php endif ?>
									<td>
										<center>
												<?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 4 ): ?>
												<a class="view_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'><button class="btn btn-sm btn-primary view_appointment" type="button">View Profile</button></a>
												<?php endif ?>
												<?php if($_SESSION['login_type'] == 1 ): ?>
												<div class="btn-group">
												  <button type="button" class="btn btn-primary">Action</button>
												  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="sr-only">Toggle Dropdown</span>
												  </button>
												  <div class="dropdown-menu">
												  	
												  	<a class="dropdown-item view_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>View Profile</a>
													
													
													<div class="dropdown-divider"></div>
													<a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
													
												  </div>
												</div>
												<?php endif ?>
										</center>
									</td>
									
								 </tr>
								<?php endwhile; ?>
							</tbody>
						</table>

			</div>
		</div>
	</div>

</div>
</div>
</div>
<?php } ?>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: 150px;
	}
</style>
<script>
	
$('table').dataTable()

$('.edit_user').click(function(){
	uni_modal('Edit Patient','manage_patient.php?id='+$(this).attr('data-id'))
})

$('.view_user').click(function(){
	view_modal('Patient Information','view_patient.php?id='+$(this).attr('data-id'))
})

$('.delete_user').click(function(){
		_conf("Are you sure to delete this patient?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
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