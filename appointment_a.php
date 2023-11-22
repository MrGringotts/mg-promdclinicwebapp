<?php include 'admin/db_connect.php'; 

	$special = $conn->query("SELECT * FROM medical_specialty");
	$ms_arr = array();
	while ($row=$special->fetch_assoc()) {
		$ms_arr[$row['id']] = $row['name'];
	}

	$doct_id = $_GET['id'];
	$doc = $conn->query("SELECT * FROM doctors_list WHERE id = '$doct_id' ");
	$row_doc=$doc->fetch_assoc();

?>
        <header class="masthead  h-25"> 
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<hr class="divider my-4" /><h3 class="text-white">My Appointments Schedule for <?php echo "Dr. ".$row_doc['name'].', '.$row_doc['name_pref'] ?></h3>
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="doctors" >
        <div class="container">
        	<div class="card">
        		<div class="card-body">
        			<!-- Table Panel -->
					
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Date & Time</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$i = 1;
										$id = $_SESSION['login_id'];
										$cats = $conn->query("SELECT * FROM appointment_list WHERE patient_id = '$id' order by id desc");
										while($row=$cats->fetch_assoc()):
										?>
										<tr>
											<td class="text-center"><?php echo $i++ ?></td>


											<td class="text-center">
												
											<?php 

                                            $date = date("F d, Y", strtotime($row['a_date']));
                                            $time = $row['a_time'];

                                            echo $date." (".$time.")";

                                            ?>

											
										
										
											</td>

											<td class="text-center">
											
											<?php if($row['status'] == 0): ?>
												<span class="badge badge-danger">For verification</span>
											<?php elseif($row['status'] == 1): ?>
												<span class="badge badge-success">Confirmed</span>
											<?php elseif($row['status'] == 2): ?>
												<span class="badge badge-warning">Reschedule</span>
											<?php elseif($row['status'] == 3): ?>
												<span class="badge badge-info">Done</span>
											<?php endif; ?>
											</td>
											<td class="text-center">
												<button class="btn btn-sm btn-info edit_appointment" <?php if($row['status'] != 0){ echo "disabled"; } ?> type="button" data-id="<?php echo $row['id'] ?>">Reschedule</button>
												<button class="btn btn-danger btn-sm delete_appointmen" <?php if($row['status'] != 0){ echo "disabled"; } ?> type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
											</td>
										</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							
					<!-- Table Panel -->
				</div>
        	</div>
        </div>
    </section>
    <style>
    	#doctors img{
    		max-height: 300px;
    		max-width: 200px; 
    	}
    </style>
    <script>
        

       $('.edit_appointment').click(function(){
       	if('<?php echo isset($_SESSION['login_id']) ?>' == 1)
			uni_modal("Edit Appointment","set_edit_appointment.php?id="+$(this).attr('data-id'),'')
		else{
			uni_modal("Login First","login.php")	
		}
		})

		$('.delete_appointmen').click(function(){
		_conf("Are you sure to delete this appointment?","delete_appointmen",[$(this).attr('data-id')])
		})
	
		function delete_appointmen($id	){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=delete_appointment',
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
	
