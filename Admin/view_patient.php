<?php 
include('db_connect.php'); session_start();
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
	
	<form action="" id="manage-patient">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" class="form-control" disabled style="background-color: #fff" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" disabled style="background-color: #fff" class="form-control"><?php echo isset($meta['address']) ? $meta['address']: '' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="contact" disabled style="background-color: #fff" class="form-control" value="<?php echo isset($meta['contact']) ? $meta['contact']: '' ?>">
		</div>
		
		<?php if($_SESSION['login_type'] == 1 ): ?>
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username" required class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" id="password" required class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>">
			<span id="open" class="fa fa-eye field-icon"></span>
		</div>
		
		
		
		<?php else: ?>
		<input type="hidden" name="username" required class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>">
		<input type="hidden" name="password" required class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>">
		<?php endif ?>
		
		
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
	$('#manage-patient').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_patient',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
	
	
</script>