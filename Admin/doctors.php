<?php include('db_connect.php');

if($_SESSION['login_type'] != 2){?>


<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
		<div class="col-lg-12">

			<button class="btn btn-primary float-right btn-sm" id="new_doctor"><i class="fa fa-plus"></i> New Doctor</button>
		</div>
		</div><br>
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
								$cats = $conn->query("SELECT 
															doctors_list.id,
															doctors_list.name,
															doctors_list.name_pref,
															doctors_list.clinic_roomno,
															doctors_list.contact as d_contact,
															doctors_list.specialty_ids,
															doctors_list.img_path,
															doctors_list.status,
															users.doctor_id,
															users.username,
															users.password
														 FROM doctors_list, users WHERE doctors_list.id = users.doctor_id ");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center">
										<img src="../assets/img/<?php echo $row['img_path'] ?>" alt="">
									</td>
									<td class="">
										 <p>Name: <b><?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?></b></p>
										 <p><small>Clinic Room #: <b><?php echo $row['clinic_roomno'] ?></b></small></p>
										 <p><small>Contact #: <b><?php echo $row['d_contact'] ?></b></small></p>
										 <p><small><a href="javascript:void(0)" class="view_schedule" data-id="<?php echo $row['id'] ?>" data-name="<?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?>"><i class='fa fa-calendar'></i> Schedule</a></b></small></p>
										 <p><small><i class='fa fa-address-card'></i>
										 <?php if($row['status'] == 0): ?>
											<span class="badge badge-success">Available</span>
										 <?php elseif($row['status'] == 1): ?>
										 <span class="badge badge-danger">Not Available</span>
										 <?php endif; ?>
										 </b></small></p>

									</td>
									<td class="text-center">
										<a class="edit_doctor" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'><button class="btn btn-sm btn-primary" type="button">Edit</button></a>
										<button class="btn btn-sm btn-danger delete_doctor" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
<?php }else{ ?>
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
								$cats = $conn->query("SELECT * FROM doctors_list ");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center">
										<img src="../assets/img/<?php echo $row['img_path'] ?>" alt="">
									</td>
									<td class="">
										 <p>Name: <b><?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?></b></p>
										 <p><small>
										 <?php if($row['status'] == 0): ?>
											<a href="javascript:void(0)" class="doc_status" data-id="<?php echo $row['id'] ?>"> <button class="btn btn-success btn-sm badge badge-success"  ><i class="fa fa-address-card"></i> Available</button></a>
											
										 <?php elseif($row['status'] == 1): ?>
											<a href="javascript:void(0)" class="doc_status" data-id="<?php echo $row['id'] ?>"> <button class="btn btn-danger btn-sm badge badge-danger"  ><i class="fa fa-address-card"></i> Not Available</button></a>
										 <?php endif; ?>
										 </b></small></p>
									</td>
									<td class="text-center">
										<a href="javascript:void(0)" class="view_schedule" data-id="<?php echo $row['id'] ?>" data-name="<?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?>"><button class="btn btn-sm btn-primary " type="button" >View Schedule</button></a>
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
		max-height: :150px;
	}
</style>
<script>
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:'100%'
	})
	
	function _reset(){
		$('[name="id"]').val('');
		$('#manage-doctor').get(0).reset();
		$("#cimg").attr("src","");
		$('[name="specialty_ids[]"]').val('');
	}
	$('table').dataTable()
	
	$('#new_doctor').click(function(){
		uni_modal('New Doctor','manage_doctor.php')
	})
	
	$('.edit_doctor').click(function(){
		uni_modal('Edit Doctor','manage_doctor.php?id='+$(this).attr('data-id'))
	})
	
	$('.edit-doctor').click(function(){
		start_load()
		var cat = $('#manage-doctor')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='name_pref']").val($(this).attr('data-name_pref'))
		cat.find("[name='email']").val($(this).attr('data-email'))
		cat.find("[name='clinic_roomno']").val($(this).attr('data-clinic_roomno'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("#cimg").attr("src","../assets/img/"+$(this).attr('data-img_path'))
		cat.find("[name='status']").val($(this).attr('data-status'))
		cat.find("[name='username']").val($(this).attr('data-username'))
		cat.find("[name='password']").val($(this).attr('data-password'))
		
		
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
	$('.update_status').click(function(){
		uni_modal($(this).attr('data-name')+" - Status","view_doctor_status.php?id="+$(this).attr('data-id'))
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
	
	$('.doc_status').click(function(){
		_conf("Are you sure to change the status of this doctor?","doc_status",[$(this).attr('data-id')])
	})
	function doc_status($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=doc_status',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Doctor status successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>