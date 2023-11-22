<?php 
include('db_connect.php');
if(isset($_SESSION['login_id'])){

	if($_SESSION['login_type'] == 4):
		$user = $conn->query("SELECT users.id as uid, users.name as name, users.username as username, users.password as password, doctors_list.img_path as img_path  FROM users, doctors_list where users.doctor_id = doctors_list.id AND users.id =".$_SESSION['login_id']);
	else:
		$user = $conn->query("SELECT * FROM users where id = ".$_SESSION['login_id']);
	endif;

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
<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div id="msg"></div>
					
							<!--
							<input type="hidden" name="logintype" value="<?php echo isset($_SESSION['login_type']) ? $_SESSION['login_type']: '' ?>">
							<?php if($_SESSION['login_type'] == 4): ?>
							<input type="hidden" name="id" value="<?php echo isset($meta['uid']) ? $meta['uid']: '' ?>">
							<input type="hidden" name="doctorid" value="<?php echo isset($_SESSION['login_doctor_id']) ? $_SESSION['login_doctor_id']: '' ?>">
							<div class="form-group">
								<center><img src="<?php echo isset($meta['img_path']) ? '../assets/img/'.$meta['img_path']: '' ?>" alt="" id="cimg" style="height:200px; width:200px; border-radius:200px"></center>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
							</div>
							<?php else: ?>
							<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
							<?php endif; ?>
							-->
							<?php if($_SESSION['login_type'] == 4): ?>
							<input type="hidden" name="id" value="<?php echo isset($meta['uid']) ? $meta['uid']: '' ?>">
							<input type="hidden" name="doctorid" value="<?php echo isset($_SESSION['login_doctor_id']) ? $_SESSION['login_doctor_id']: '' ?>">
							<div class="form-group">
								<center><img src="<?php echo isset($meta['img_path']) ? '../assets/img/'.$meta['img_path']: '' ?>" alt="" id="" style="height:200px; width:200px; border-radius:200px"></center>
							</div>
							<?php else: ?>
							<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
							<?php endif; ?>
							
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name_hidden" id="name" class="form-control" disabled style="background:white" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
								<input type="hidden" name="name" id="name" class="form-control" style="background:white" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="usernames" id="username" class="form-control" disabled style="background:white" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
								<input type="hidden" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" disabled style="background:white" id="passwords" class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>" required>
								<span id="open" class="fa fa-eye field-icon"></span>
							
							</div>

						<hr>
						<div class="col-md-12 text-center">
						<?php if($_SESSION['login_type'] == 4): ?>

							<a class="edit_profile" href="javascript:void(0)" data-name='<?php echo $meta['name']; ?>' data-id='<?php echo $_SESSION['login_doctor_id']; ?>'><button class="btn-primary btn btn-sm col-md-4">Edit Profile</button>
							
						<?php else: ?>

							<a class="edit_profile" href="javascript:void(0)" data-name='<?php echo $meta['name']; ?>' data-id='<?php echo $_SESSION['login_id']; ?>'><button class="btn-primary btn btn-sm col-md-4">Edit Profile</button>

						<?php endif; ?>
							
						</div> 
								
				</div>
			</div>
			
		</div>
		</div>
</div>

</div>
<script>
	$(document).ready(function(){

             $("#open").click(function(){
				 
				 var value = document.getElementById("passwords").getAttribute("type"); 
				
				 if( value == "text"){
					 
					 document.getElementById("passwords").type = "password";
					 
				 }else if( value == "password"){
					
					  document.getElementById("passwords").type = "text";
				 }
                
             });

             

         });
		 
	function displayImg(input,_this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

<?php if($_SESSION['login_type'] == 4): ?>

	$('.edit_profile').click(function(){
		uni_modal("Dr. "+$(this).attr('data-name')+" - Information","view_doctor.php?id="+$(this).attr('data-id'))
	})
	
<?php else: ?>

	$('.edit_profile').click(function(){
		uni_modal($(this).attr('data-name')+" - Information","view_doctor.php?id="+$(this).attr('data-id'))
	})

<?php endif; ?>
	
</script>