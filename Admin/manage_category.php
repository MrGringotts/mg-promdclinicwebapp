<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$cat = $conn->query("SELECT * FROM medical_specialty where id =".$_GET['id']);
foreach($cat->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>

<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage-cat">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label class="control-label">Specialty</label>
			<textarea name="name" id="" cols="30" rows="2" class="form-control"><?php echo isset($meta['name']) ? $meta['name']: '' ?></textarea>
		</div>
		<div class="form-group">
			<label class="control-label">Description</label>
			<textarea name="desc" id="" cols="30" rows="2" class="form-control"><?php echo isset($meta['description']) ? $meta['description']: '' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Image</label>
			<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
		</div>
		<div class="form-group">
			<img src="<?php echo isset($meta['img_path']) ? '../assets/img/'.$meta['img_path']: '' ?>" alt="" id="cimg">
		</div>	
	</form>
</div>
<script>
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:'100%'
	})
	
	$('#manage-cat').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_category',
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