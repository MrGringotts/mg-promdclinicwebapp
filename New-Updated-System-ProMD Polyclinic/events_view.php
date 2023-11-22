<?php include 'admin/db_connect.php'; 

	$events = $conn->query("SELECT * FROM events WHERE id = ".$_GET['id']." ");
	
	$row=$events ->fetch_assoc();
		$title         = $row['title'];
		$content       = $row['content'];
		$img_path      = $row['img_path'];
		$dateAtimeTime = date("d - F - Y", strtotime($row['event_date']));
		$title         = $row['title'];
	


?>

<style>
table, th, td {
  font-family: Arial !important;
}
</style>
        <header class="masthead  h-25">
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<hr class="divider my-4" /><h3 class="text-white"><?php echo $title ?></h3>
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="doctors" >
        <div class="container">
        	<div class="card">
        		<div class="card-body">
        			<div class="col-lg-12">
					<p><?php echo $dateAtimeTime; ?></p>
					<hr>

					<h2><?php echo $title;?></h2>

                     <?php
                     if ($img_path != ""){ ?>
                        <img src="assets/img/<?php echo $img_path ?>" style="padding-right:10px" align="left" />
                    <?php } ?>   
					
					<div class="col-md-12" style="text-align: justify; text-justify: inter-word;">
						
						<?php echo html_entity_decode($content); ?>
							
					</div>
				
				</div>
				</div>
        	</div>
        </div>
    </section>
    <style>
    	#doctors img{
    		max-height: 300px;
    		max-width: 50%; 
    	}
    </style>
    <script>
        
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
	
