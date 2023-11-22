<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<style>
.field-icon {
  float: right;
  margin-right: 10px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>" required>
			<span id="open" class="fa fa-eye field-icon"></span>
		</div>
		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Secretary</option>
			</select>
		</div>
		
	</form>
</div>
<script>

	$(document).ready(function(){

             $("#open").click(function(){
				 
				 var value = document.getElementById("password").getAttribute("type"); 
				
				 if( value == "text"){
					 
					 document.getElementById("password").type = "password";
					 
				 }else if( value == "password"){
					
					  document.getElementById("password").type = "text";
				 }
                
             });

             

         });
		 
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:'100%'
	})
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else if(resp==2){
					$('#msg').html('<div class="alert alert-danger">User already exist.</div>')
					end_load()
				}else if(resp==3){
					$('#msg').html('<div class="alert alert-danger">Username already exist.</div>')
					end_load()
				}
			}
		})
	})
	
	
</script>