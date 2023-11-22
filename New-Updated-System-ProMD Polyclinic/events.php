<?php include 'admin/db_connect.php'; 

	$special = $conn->query("SELECT * FROM medical_specialty");
	$ms_arr = array();
	while ($row=$special->fetch_assoc()) {
		$ms_arr[$row['id']] = $row['name'];
	}

$month = $_GET['month'];
?>

<style>
table, th, td {
  font-family: Arial !important;
}

#doctors img{
    		max-height: 300px;
    		max-width: 200px; 
    	}
</style>
        <header class="masthead  h-25">
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Events / Activities</h3>
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="doctors" >
        <div class="container">
		<div class="form-group">
    
			
				<div class="form-inline">
				  <label for="Name" >Select Month</label>
				  <div class="col-md-8">
					<select name="month" onchange="getval(this);" class="form-control col-md-4">
						<option value="">...</option>
						<option value="January" <?php if($month == 'January'){ echo 'selected'; } ?> >January</option>
						<option value="February" <?php if($month == 'February'){ echo 'selected'; } ?>>February</option>
						<option value="March" <?php if($month == 'March'){ echo 'selected'; } ?>>March</option>
						<option value="April" <?php if($month == 'April'){ echo 'selected'; } ?>>April</option>
						<option value="May" <?php if($month == 'May'){ echo 'selected'; } ?>>May</option>
						<option value="June" <?php if($month == 'June'){ echo 'selected'; } ?>>June</option>
						<option value="July" <?php if($month == 'July'){ echo 'selected'; } ?>>July</option>
						<option value="August" <?php if($month == 'August'){ echo 'selected'; } ?>>August</option>
						<option value="September" <?php if($month == 'September'){ echo 'selected'; } ?>>September</option>
						<option value="October" <?php if($month == 'October'){ echo 'selected'; } ?>>October</option>
						<option value="November" <?php if($month == 'November'){ echo 'selected'; } ?>>November</option>
						<option value="December" <?php if($month == 'December'){ echo 'selected'; } ?>>December</option>
					
					</select>
				  </div>
				</div>
		
			</br>
			<div class="card">
			
        		<div class="card-body">
        			<div class="col-lg-12">
						
				<?php 
				$month = $_GET['month'];
				$events = $conn->query("SELECT * FROM events WHERE monthname(event_date) = '$month' ");
				$num_event = $events->num_rows;
                
                if($num_event <= 0){ ?>

                    	<div class="col-md-12" >No event/Activities for this month.</div>

               <?php }else{

                
				while($row=$events->fetch_assoc()):
				?>
				<div class="col-md-12" >
					
					<table style="width:100%;">
						<tr>
							<td width="20%" align="center">
								<b>
									<p><?php echo date("d - F - Y", strtotime($row['event_date'])) ?></p>
								</b>
							</td>
							<td>
								<p><b><?php echo $row['title'] ?></b></br>
								<?php 
								$raw = html_entity_decode(''.$row['content'].'');
								
							
								$str = substr($raw,0,380);
								echo $str."... <a href='index.php?page=events_view&id=".$row['id']."'>Read more</a>";
								?>
								</p>
							</td>
						</tr>
					</table> 
				
					
				</div>
				<hr class="divider" style="max-width: 60vw">
				<?php endwhile; 
                
                } ?>
				</div>
				</div>
        	</div>
        </div>
    </section>
<script>
function getval(sel)
{
    window.location.href="index.php?page=events&month=" + sel.value;
}
</script>

 