<?php include 'admin/db_connect.php'; 

	$special = $conn->query("SELECT * FROM medical_specialty");
	$ms_arr = array();
	while ($row=$special->fetch_assoc()) {
		$ms_arr[$row['id']] = $row['name'];
	}


?>
<style>
	h3.text-black {
	display: none !important;
	}
</style>
        <header class="masthead  h-25">
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	
						
						<?php if(isset($_GET['sid']) && $_GET['sid'] > 0): 
						$s = $conn->query("SELECT * from medical_specialty where id = ".$_GET['sid'])->fetch_array()['name'];
						?>
							<hr class="divider my-4" /><h3 class="text-black">Doctor/'s who are in titled as <?php echo $s ?></h3>
						<?php else: ?>
							<h3 class="text-black">Doctor's</h3>
						<?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="doctors" >
        <div class="container">
		<div class="row">
                    <div class="col-lg-12 text-center">
                    <h2 class="mb-4"><i style="text-transform:uppercase;">Medical Doctors</i></h2>
                    <hr class="divider">

                    </div>
                </div>
		<!---START--->
		<?php 
		$where = "";
		if(isset($_GET['sid']) && $_GET['sid'] > 0)
		$where = "where (REPLACE(REPLACE(REPLACE(specialty_ids,',','\",\"'),'[','[\"'),']','\"]')) LIKE '%\"".$_GET['sid']."\"%' ";
		$cats = $conn->query("SELECT * FROM doctors_list ".$where." order by id asc");
		while($row=$cats->fetch_assoc()):
		?>
		<div class="card">
        		<div class="card-body">
        			<div class="col-lg-12">
						
						<div class="row" >
							<div class="col-md-3">
								<center><img src="assets/img/<?php echo $row['img_path'] ?>" style="height:200px; width:200px; border-radius:200px" alt=""></center>
							</div>
							<div class="col-md-7">
								<div class="row" >
									<div class="col-md-12">
										 <p><b><?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?></b>
										 <?php if($row['status'] == 0): ?>
											<span class="badge badge-success">Available</span>
										 <?php else: ?>
										 <span class="badge badge-danger">Unavailable</span>
										 <?php endif; ?>
										 </p>
										 
										 <div>
											<?php if(!empty($row['specialty_ids'])): ?>
											<?php 
											foreach(explode(",", str_replace(array("[","]"),"",$row['specialty_ids'])) as $k => $val): 
											?>
											<span class="badge badge-light" style="padding: 10px"><large><b><?php echo $ms_arr[$val] ?></b></large></span>
											<?php endforeach; ?>
											<?php endif; ?>
										 </div>
									</div>
									
								</div>
								</br>
								<div class="row" >
									<div class="col-md-6">
										<p><b>Address:</b></br>&nbsp;&nbsp;<?php echo $row['clinic_roomno'] ?></p>
										<p><b>Contact #:</b></br>&nbsp;&nbsp;<?php echo $row['contact'] ?></p>
									</div>
									
									<div class="col-md-6 text-center">
									<p><b>Schedule</b></br>
										<?php 
										$did = $row['id'];
										$doc_sched = $conn->query("SELECT * FROM doctors_schedule WHERE doctor_id ='$did' group by day order by id asc");
										while($row_sched=$doc_sched->fetch_assoc()):
										?>
										 &nbsp;&nbsp;<?php echo $row_sched['day']; ?><font style="float:right"><?php echo date("h:i A",strtotime($row_sched['f_time_frame'])).' - '.date("h:i A",strtotime($row_sched['t_time_frame'])) ?></font><br>
										 
										<?php endwhile; ?> 
									</p>
									</div>
									
								</div >
								
							</div>
							<div class="col-md-2">
									<div class="col-md-3 text-center align-self-end-sm">
									</br>
									<div class="btn-group">
										<button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Appointment &nbsp;
										</button>
										<div class="dropdown-menu">
											<!--a class="dropdown-item" href="index.php?page=appointment&id=<?php echo $row['id'] ?>">My Appointment</a-->
											<a class="dropdown-item view_appointment" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" >My Appointment</a>
											<?php if($row['status'] == 0): ?>
												<div class="dropdown-divider"></div>
											<a class="dropdown-item set_appointment" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?>">Set Appointment</a>
											<?php else: ?>
												<div class="dropdown-divider"></div>
											<a style="pointer-events: none;" class="dropdown-item set_appointment" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?>">Set Appointment</a>
											<?php endif; ?>
										</div>
									</div>
									</div>
								</div>
						</div>
						
				</div>
				</div>
        	</div></br>
			<?php endwhile; ?>
		
		<!---END--->
        </div>
    </section>
    <style>
    	#doctors img{
    		max-height: 300px;
    		max-width: 200px; 
    	}
    </style>
    <script>
       $('.view_appointment').click(function(){
			
		if('<?php echo isset($_SESSION['login_id']) ?>' == 1)
			window.location.href = "index.php?page=appointment&id="+$(this).attr('data-id')
		else{
			uni_modal("Login First","login.php")
		}
			
			
		})
       $('.view_schedule').click(function(){
			uni_modal($(this).attr('data-name')+" - Schedule","view_doctor_schedule.php?id="+$(this).attr('data-id'))
		})
       $('.set_appointment').click(function(){
       	if('<?php echo isset($_SESSION['login_id']) ?>' == 1)
			uni_modal("Set Appointment with "+$(this).attr('data-name'),"set_appointment.php?id="+$(this).attr('data-id'))
		else{
			uni_modal("Login First","login.php")
		}
		})
    </script>
	
