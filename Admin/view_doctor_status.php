
<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM doctors_list where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-doctor">
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
			<label for="type">Doctor Status</label>
			<select name="status" id="status" class="custom-select">
				
				<option value="0" <?php echo isset($meta['status']) && $meta['status'] == 0 ? 'selected': '' ?>>Available</option>
				<option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected': '' ?>>Not Available</option>
			</select>
		</div>
	</form>
</div>
<script>
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:'100%'
	})
	$('#manage-doctor').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=status_doctor',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					
				}
			}
		})
	})
	
	
</script>