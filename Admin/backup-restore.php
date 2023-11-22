<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- Restor Panel -->
			<div class="col-md-5">
			
				<div class="card">
					<div class="card-header">
						   Back-up Database
				  	</div>
					<div class="card-body">
							<div id="msg"></div>
							<div class="form-group">
							<p><small><b><font color="red">Important Note:</font></b> DO NOT rename the database name after download.</small></p>
								<a href="maintain-backup.php" target="_blank" ><button class="btn btn-sm btn-primary col-sm-4 offset-md-3"> Back-up Database</button></a></br></br>
							</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								</br>
							</div>
						</div>
					</div>
				</div>
		
			</div>
			<div class="col-md-5">
			<form action="maintain-restore.php" method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						   Restore Database
				  	</div>
					<div class="card-body">
							<?php if(!isset($_GET['type']) && !isset($_GET['status'])){ ?>
							<div id="msg"></div>
							<?php }elseif($_GET['type'] == "restore" && $_GET['status'] == "1"){ ?>
							<div class="alert alert-success">Database successfully restored.</div>
							<?php }elseif($_GET['type'] == "restore" && $_GET['status'] == "0"){ ?>
							<div class="alert alert-danger">Database unsuccessfully restored.</div>
							<?php }?>
							<div class="form-group">
								<p><small><b><font color="red">Important Note:</font></b> Before you to restore database. Kindly Back it up first the current database.</small></p>
								<label for="" class="control-label">Choose Database File</label>
								<input type="file" class="form-control" name="db_name">
								
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Restore</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- End Restore Panel -->
			
		</div>
	</div>	

</div>
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
