<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="forgot-frm">
		<small><p>Please enter the phone number you used in registration</p></small>
		
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="contact" required class="form-control">
		</div>
		
		<button class="button btn btn-info btn-sm">Submit</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>
	$('#forgot-frm').submit(function(e){
		e.preventDefault()
		$('#forgot-frm button[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=forgot',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#forgot-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					$('#forgot-frm').prepend('<div class="alert alert-success">The system will notify you shortly for your user account.</div>')
					$('#forgot-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}else{
					$('#forgot-frm').prepend('<div class="alert alert-danger">Invalid Phone Number or Phone number not registered.</div>')
					$('#forgot-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>