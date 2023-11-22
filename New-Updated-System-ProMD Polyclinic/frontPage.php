<?php 
include 'admin/db_connect.php'; 
?>
<script src="admin/assets/DataTables/datatables.min.js"></script>
<link href="admin/assets/DataTables/datatables.min.css" rel="stylesheet">
<style>
#portfolio .img-fluid{
    width:100%
}
h3.text-black {
display: none !important;
}
</style>
        <header class="masthead">
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-black"><?php echo $_SESSION['setting_name']; ?></h3>
                     
                       
						</br></br>
                    </div>
                    
                </div>
            </div>
        </header>
	
    <div id="portfolio" class="container">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 text-center"><br>
                    <h2 class="mb-4"><i style="text-transform:uppercase;">Medical Specialties</i></h2>
					
                    <hr class="divider">

                    </div>
                </div>
				<!-- Table Panel -->
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<table class="table table-bordered table-hover">
							
								<thead>
									<tr>
										<th class="text-center" style="width:15%">Image</th>
										<th class="text-center" width="20%">Specialties</th>
										<th class="text-center" width="20%">Description</th>
										<th class="text-center" style="width:15%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									$cats = $conn->query("SELECT * FROM medical_specialty order by id asc");
									while($row=$cats->fetch_assoc()):
									?>
									<tr>
										<td class="text-center">
											<img src="assets/img/<?php echo $row['img_path'] ?>" alt="" style="width:64px; height:64px" />
										</td>
										<td class="text-center" style="font-weight: bold; text-transform:capitalize;"><?php echo $row['name'] ?></td>
										<td class="text-center">
											<?php echo html_entity_decode($row['description']) ?>
									</td>
										<td class="text-center">
											<a href="index.php?page=doctors&sid=<?php echo $row['id'] ?>"><button class="btn btn-outline-primary  view_appointment " type="button">Find Doctor</button></a>
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
    <script>
        $('table').dataTable()
       
    </script>
	
