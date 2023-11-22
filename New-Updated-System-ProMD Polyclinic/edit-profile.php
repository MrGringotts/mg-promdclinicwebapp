<?php include 'admin/db_connect.php'; session_start() ?>
<div class="container-fluid">
	<form action="" id="update-frm">

		<?php 
		if(isset($_GET['pid'])):
			$pid = $_GET['pid'];

		$cats = $conn->query("SELECT * FROM users where id = '$pid' ");
          while($row=$cats->fetch_assoc()):
		?>
		<div class="form-group">
			<input type="hidden" name="id" class="form-control" value = "<?php echo $row['id'];?>">
		</div>

		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" class="form-control" value = "<?php echo $row['name'];?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control" ><?php echo $row['address'];?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="number" name="contact" required="" class="form-control" value = "<?php echo $row['contact'];?>">
		</div>
		<div class="form-group">
			<input type="hidden" name="username" required="" class="form-control" value = "<?php echo $row['username'];?>" >
		</div>
		<div class="form-group">

			<input type="hidden" name="password" required="" class="form-control" value = "<?php echo $row['password'];?>">
		</div>
		<button class="button btn btn-info btn-sm">Save</button>
		
		<?php endwhile; endif; ?>

	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>
	$('#update-frm').submit(function(e){
		e.preventDefault()
		$('#update-frm button[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=update',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#update-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					location.reload();
				}else if (resp == 2){
					$('#update-frm').prepend('<div class="alert alert-danger">Username already exist.</div>')
					$('#update-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}else if(resp == 3){
					$('#update-frm').prepend('<div class="alert alert-danger">Phone Number already exist.</div>')
					$('#update-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>