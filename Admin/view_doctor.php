<?php 
include('db_connect.php'); session_start();
if(isset($_GET['id'])){
	
if($_SESSION['login_type'] == 4):
	
	$user_id = $conn->query("SELECT * FROM users where doctor_id =".$_GET['id']);
	$row = $user_id->fetch_array();
	
		$uid = $row['id'];
	
		$doctor = $conn->query("SELECT * FROM doctors_list where id =".$_GET['id']);
		foreach($doctor->fetch_array() as $k =>$v){
			$meta[$k] = $v;
		}
else:

	$user_id = $conn->query("SELECT * FROM users where id =".$_GET['id']);
	$row = $user_id->fetch_array();
	
endif;

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
	<form action="" id="manage-profile">
		<input type="hidden" name="logintype" value="<?php echo isset($_SESSION['login_type']) ? $_SESSION['login_type']: '' ?>">
		
		<?php if($_SESSION['login_type'] == 4): ?>
		<input type="hidden" name="doctorid" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<input type="hidden" name="id" value="<?php echo isset($uid) ? $uid: '' ?>">
		
			<div class="form-group">
					<center><img src="<?php echo isset($meta['img_path']) ? '../assets/img/'.$meta['img_path']: '' ?>" alt="" id="cimg"  style="height:200px; width:200px; border-radius:200px"></center>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Image</label>
				<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
			</div>
		<?php else: ?>
		<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id']: '' ?>">
		<?php endif; ?>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="usernames" disabled style="background:white" id="username" class="form-control" value="<?php echo isset($row['username']) ? $row['username']: '' ?>" required>
				<input type="hidden" name="username" id="username" class="form-control" value="<?php echo isset($row['username']) ? $row['username']: '' ?>" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" value="<?php echo isset($row['password']) ? $row['password']: '' ?>" required>
				<span id="opens" class="fa fa-eye field-icon"></span>
			</div>
	</form>
</div>
<script>

	$(document).ready(function(){

             $("#opens").click(function(){
				 
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
	
	
	$('#manage-profile').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_profile',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
	
	function displayImg(input,_this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
		
</script>