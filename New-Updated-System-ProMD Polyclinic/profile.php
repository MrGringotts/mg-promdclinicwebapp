<?php
if(isset($_GET['pid'])){
	$pid = $_GET['pid'];
	
}else{
	$pid = null;

}


?>

<div class="container-fluid">
	<br>
	<br>
	<br>
	<br>
	<div class="row">
	<div class="col-lg-12">
		<br>
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Address</th>
					<th class="text-center">Contact</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'admin/db_connect.php';
 					$users = $conn->query("SELECT * FROM users WHERE id = '$pid' ");
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $row['name'] ?>
				 	</td>
				 	<td>
					 	<?php echo $row['address'] ?>
				 	</td>
				 	<td>
					 	<?php echo $row['contact'] ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    
								  </button>
								  <div class="dropdown-menu">
													
										<div class="dropdown-divider"></div>
										<a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $_SESSION['login_id'] ?>'>Edit</a>
										</div>
								  </div>
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
<html>
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
	


$('.edit_user').click(function(){
	uni_modal('Edit Patient','edit-profile.php?pid='+$(this).attr('data-id'))
})

	$('table').dataTable()
</script>






