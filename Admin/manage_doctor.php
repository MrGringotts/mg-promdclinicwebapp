

<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$doctor = $conn->query("SELECT * FROM doctors_list where id =".$_GET['id']);
foreach($doctor->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}

$account = $conn->query("SELECT * FROM users where doctor_id =".$_GET['id']);
foreach($account->fetch_array() as $kk =>$vv){
	$metaa[$kk] = $vv;
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
	<form action="" id="manage-doctor">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="" class="control-label">Prefix</label>
			<input type="text" class="form-control" name="name_pref" value="<?php echo isset($meta['name_pref']) ? $meta['name_pref']: '' ?>" placeholder="(M.D.)" required="">
		</div>
		<div class="form-group">
			<label class="control-label">Name</label>
			<textarea name="name" id="" cols="30" rows="2" class="form-control" required=""><?php echo isset($meta['name']) ? $meta['name']: '' ?></textarea>
		</div>
		<div class="form-group">
			<label class="control-label">Medical Specialties</label>
			<select name="specialty_ids[]" id="leaveCode" multiple=""  class="custom-select browser-default select2">
				<option value=""></option>
					<?php 
						
						$idss = isset($meta['specialty_ids']) ? $meta['specialty_ids']: ''; echo preg_replace('/[^A-Za-z0-9\-]/', '', $idss);
						$array = str_split($idss);
					
						$qry = $conn->query("SELECT * FROM medical_specialty order by name asc");
						while($row=$qry->fetch_assoc()):
					?>
				<option value="<?php echo $row['id'] ?>" <?php if (in_array($row['id'], $array)){ echo 'selected'; } ?>  ><?php echo $row['name'] ?></option>
					<?php endwhile; ?>
			</select>
			</div>
			<div class="form-group">
				<label class="control-label">Clinic Room No.</label>
				<textarea name="clinic_roomno" id="" cols="30" rows="2" class="form-control" required=""><?php echo isset($meta['clinic_roomno']) ? $meta['clinic_roomno']: '' ?></textarea>
			</div>	
			<div class="form-group">
				<label for="" class="control-label">Contact</label>
				<input type="number" name="contact"  value="<?php echo isset($meta['contact']) ? $meta['contact']: '' ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Image</label>
				<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
			</div>
			<div class="form-group">
				<img src="<?php echo isset($meta['img_path']) ? '../assets/img/'.$meta['img_path']: '' ?>" alt="" id="cimg">
			</div>
			<div class="form-group">
				<label class="control-label">Status</label>
				<select name="status" id="" required class="custom-select">
					<option value=""> Please Select Here</option>
					<option value="0" <?php if(isset($meta['status'])){ if($meta['status'] == 0){ echo 'selected'; } }else{ echo ''; } ?>>Available</option>
					<option value="1" <?php if(isset($meta['status'])){ if($meta['status'] == 1){ echo 'selected'; } }else{ echo ''; } ?>>Unavailable</option>
				</select>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($metaa['username']) ? $metaa['username']: '' ?>" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" value="<?php echo isset($metaa['password']) ? $metaa['password']: '' ?>" required>
				<span id="open" class="fa fa-eye field-icon"></span>
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
	
	
	$('#manage-doctor').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_doctor',
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
				// if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				// }else if(resp==2){
				// 	$('#msg').html('<div class="alert alert-danger">Doctor already exist.</div>')
				// 	end_load()
				// }
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